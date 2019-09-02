<?php use uziiuzair\crm;
header('Content-Type: application/json; charset=utf-8;', true);

/**
 * Getting the server request
 */
$page = crm\Routes::getServerRequest('/action/');

# print_r($page);

# TODO: Create a proper function to check this in Sessions.php
# $ClientNotSignedIn = false;
# if ($ClientNotSignedIn) {
# 	$page = 'login';
# }

# Initiate Response
$response = array();

switch ($page) {


	/**
	 * Log the user in! (if they're worthy)
	 */
	case 'login':
		
		# Check if Empty fields
		if (empty($_POST['username']) || empty($_POST['password'])) {
		

			$response['success'] = false;
			$response['request']['message'] = 'Username or Password not provided';


		} else {

			/**
			 *	STEP ONE: Encrypt the Password
			 */

			# Encrypt the Password using SHA256
			$pass = hash('sha256', filter_var($_POST['password'], FILTER_SANITIZE_STRING));

			# Username to lower
			$user = strtolower(filter_var($_POST['username'], FILTER_SANITIZE_STRING));



			/**
			 *	STEP TWO: Check Login Attempts 
			 */

			# TODO: Check Login Attempts



			/**
			 *	STEP THREE 
			 */

			# TODO: Check if a third step is necessary 



			/**
			 *	FINAL STEP: Attempt Login
			 */
			if (crm\Users::login($user, $pass)) {



				# Reset Failed Login Count
				crm\Users::loginFailed($user, 'reset');


				$response['success'] = true;
				$response['request']['message'] = 'Login Successful';



			} else {


				# Increment Failed Login Count 
				crm\Users::loginFailed($user, 'failed');


				$response['success'] = false;
				$response['request']['message'] = 'Username or Password incorrect';


			}

		}

		break;




	/**
	 * Log the user out! (because they're no longer worthy)
	 */
	case 'logout' :

		if (crm\Sessions::destroy()) {

			$response['success'] = true;
			$response['request']['message'] = 'Logout Successful';

		}

	break;



	/**
	 * Create a new lead
	 */
	case 'lead/create':

		if (!empty($_POST['leadFirstName'])) {
	
			# I dont know why
			$leadName = $_POST['leadFirstName'] . ' ' . $_POST['leadLastName'];
	
			/**
			 * Create an Array for all possible Values.
			 * @var array
			 */
			$leadsArray = array(
				'staff_id' 			=> $_POST['leadStaff'],
				'honorific' 		=> $_POST['leadTitle'],
				'name' 				=> $leadName,
				'email' 			=> $_POST['leadEmail'],
				'phone' 			=> $_POST['leadPhone'],
				'company' 			=> $_POST['leadCompany'],
				'title' 			=> $_POST['leadCompanyTitle'],
				'website' 			=> $_POST['leadWebsite'],
				'addressStreet' 	=> $_POST['leadCompanyStreet'],
				'addressCity' 		=> $_POST['leadCompanyCity'],
				'addressState' 		=> $_POST['leadCompanyState'],
				'addressZip' 		=> $_POST['leadCompanyZip'],
				'addressCountry' 	=> $_POST['leadCompanyCountry'],
				'source' 			=> $_POST['leadSource'],
				'status' 			=> $_POST['leadStatus'],
			);

			/**
			 * Make an attempt to create new lead
			 */
			if (crm\Services\Leads::create($leadName, $leadsArray)) {
				
				$response['success'] = true;
				$response['request']['message'] = 'Lead created!';

			} else {

				$response['success'] = false;
				$response['request']['message'] = 'Unkown error occurred.';

			}



		} else {
			$response['success'] = false;
			$response['request']['message'] = 'Lead name not provided.';
		}

		

	break;







	/**
	 * Lead: Delete
	 */
	case 'lead/delete':

		$response['success'] = false;
		$response['request']['message'] = 'Lead Function not complete';

		break;








	/**
	 * Lead: Lost
	 */
	case 'lead/lost':

		$response['success'] = false;
		$response['request']['message'] = 'Lead Function not complete';

		break;






	/**
	 * Lead: Junk
	 */
	case 'lead/junk':

		$response['success'] = false;
		$response['request']['message'] = 'Lead Function not complete';

		break;






	/**
	 * Task: Create
	 */
	case 'task/create':

		if (!empty($_POST['tasktype'])) {
	
			/**
			 * Create an Array for all possible Values.
			 * @var array
			 */
			$tasksArray = array(
				'staff_id' 		=> $_POST['staff_id'],
				'name' 			=> $_POST['newTask'],
				'description' 	=> $_POST['newTask'],
				'priority' 		=> $_POST['newTaskPriority'],
				'start' 		=> 0,
				'end' 			=> strtotime($_POST['newTaskDeadline']),
				'status' 		=> 0,
				'billable' 		=> 0,
				'price' 		=> 0,
				'discount' 		=> 0,
				'visible' 		=> 0,
			);

			if ($_POST['tasktype'] == 'lead') {
				$tasksArray['lead_id'] = $_POST['lead_id'];
			
			} else if ($_POST['tasktype'] == 'project') {
				$tasksArray['project_id'] = $_POST['project_id'];
				$tasksArray['milestone_id'] = $_POST['newTaskMilestone'];

			} else if ($_POST['tasktype'] == 'client') {
				$tasksArray['client_id'] = $_POST['client_id'];

			} else {

				$response['success'] = false;
				$response['request']['message'] = 'Invalid task type.';

				break;

			}

			/**
			 * Make an attempt to create new lead
			 */
			if (crm\Services\Tasks::create($tasksArray)) {
				
				$response['success'] = true;
				$response['request']['message'] = 'Task created!';

			} else {

				$response['success'] = false;
				$response['request']['message'] = $tasksArray;

			}



		} else {
			$response['success'] = false;
			$response['request']['message'] = 'Task type not provided.';
		}

		

	break;




	/**
	 * Update Client's Profile
	 */
	case 'client/profileUpdate':

		$response['success'] = true;
		$response['request']['type']	 = 'Client Profile Update';
		$response['request']['message'] = 'Client Update';

		break;




	/**
	 * Create a new Staff
	 */
	case 'staff/create':

		if (!empty($_POST['staffFirstName'])) {
	

			/**
			 * Create new Password
			 */

			$newPassword = crm\Watchdog::generateRandomString(45);
			$pass = hash('sha256', filter_var($newPassword, FILTER_SANITIZE_STRING));	
			
			/**
			 * Create an Array for all possible Values.
			 * @var array
			 */
			$staffArray = array(
				'firstname' 		=> $_POST['staffFirstName'],
				'lastname' 			=> $_POST['staffLastName'],
				'username' 			=> $_POST['staffUsername'],
				'email' 			=> $_POST['staffEmail'],
				'phone' 			=> $_POST['staffPhone'],
				'password'			=> $pass,
				'department_id' 	=> $_POST['staffDepartment'],
				'is_admin' 			=> $_POST['staffAdmin']
			);

			/**
			 * Make an attempt to create new lead
			 */
			if (crm\Users::create($staffArray)) {
				
				$response['success'] = true;
				$response['request']['message'] = 'Staff created!';

			} else {

				$response['success'] = false;
				$response['request']['message'] = 'Unkown error occurred.';

			}

			// echo crm\Users::create($staffArray);
			// print_r($staffArray);


		} else {
			$response['success'] = false;
			$response['request']['message'] = 'Staff name not provided.';
		}

		

	break;






	/**
	 * Create a new Staff
	 */
	case 'department/create':

		if (!empty($_POST['departmentName'])) {
			
			/**
			 * Create an Array for all possible Values.
			 * @var array
			 */
			$departmentName = $_POST['departmentName'];

			/**
			 * Make an attempt to create new lead
			 */
			if (crm\Users::departmentCreate($departmentName)) {
				
				$response['success'] = true;
				$response['request']['message'] = 'Department created!';

			} else {

				$response['success'] = false;
				$response['request']['message'] = 'Unkown error occurred.';

			}


		} else {
			$response['success'] = false;
			$response['request']['message'] = 'Department name not provided.';
		}

		

	break;






	
	default:
		
		$response['success'] = false;
		$response['request']['message'] = 'Unknown Response';

		break;
}

echo json_encode($response, JSON_PRETTY_PRINT);
// print_r($response);