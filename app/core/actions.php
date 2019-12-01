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
				$response['request']['message'] = 'Unknown error occurred.';

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




	case 'client/create':


		if (!empty($_POST['clientFirstName'])) {
		
		
			/**
			 * Create an Array for all possible Values.
			 * @var array
			 */
			$clientArray = array(
				'staff_id' 		=> $_POST['staff_id'],
				'firstname' 	=> $_POST['clientFirstName'],
				'lastname' 		=> $_POST['clientLastName'],
				'email' 		=> $_POST['clientEmailAddress'],
				'phone' 		=> $_POST['clientPhoneNumber'],
				'company' 		=> $_POST['clientCompanyName'],
				'address' 		=> $_POST['clientAddress'],
				'city' 			=> $_POST['clientCity'],
				'state' 		=> $_POST['clientState'],
				'zip' 			=> $_POST['clientZip'],
				'country_id' 		=> $_POST['clientCountry']
			);

			/**
			 * Make an attempt to create new client
			 */
			if (crm\Services\Clients::create($clientArray)) {
				
				$response['success'] = true;
				$response['request']['message'] = 'Client created!';

			} else {

				$response['success'] = false;
				$response['request']['message'] = 'Unknown error occurred.';

			}



		} else {
			$response['success'] = false;
			$response['request']['message'] = 'Client name not provided.';
		}



	break;



	case 'client/update':


		if (!empty($_POST['form-name']) && $_POST['form-name'] == 'client_update') {
		
		
			$client_id = stripslashes($_POST['client_id']);

			/**
			 * Create an Array for all possible Values.
			 * @var array
			 */
			$clientArray = array(
				'firstname' 		=> $_POST['firstName'],
				'lastname' 			=> $_POST['lastName'],
				'email' 			=> $_POST['clientEmailAddress'],
				'phone' 			=> $_POST['clientPhoneNumber'],
				'company' 			=> $_POST['companyName'],
				'address' 			=> $_POST['clientAddress'],
				'city' 				=> $_POST['clientCity'],
				'state' 			=> $_POST['clientState'],
				'zip' 				=> $_POST['clientZip'],
				'country_id' 		=> $_POST['clientCountry']
			);

			/**
			 * Make an attempt to create new client
			 */
			if (crm\Services\Clients::update($client_id, $clientArray)) {
				
				$response['success'] = true;
				$response['request']['message'] = 'Client updated!';

			} else {

				$response['success'] = false;
				$response['request']['message'] = 'Unknown error occurred.';

			}



		} else {
			$response['success'] = false;
			$response['request']['message'] = 'Client name not provided.';
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
				$response['request']['message'] = 'Unknown error occurred.';

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
				$response['request']['message'] = 'Unknown error occurred.';

			}


		} else {
			$response['success'] = false;
			$response['request']['message'] = 'Department name not provided.';
		}

		

	break;




	/**
	 * Get All Meetings for current client
	 */
	case 'meetings/all': 

		# Get all meetings for current user
		$meetings 	= crm\Services\Meetings::forStaff();

		$count = 0;

		foreach ($meetings as $meeting) {

			$response[$count]['id'] 		= $meeting['id'];
			$response[$count]['title'] 		= $meeting['purpose'];
			$response[$count]['start'] 		= date('c', $meeting['timeStart']);
			$response[$count]['end'] 		= date('c', $meeting['timeEnd']);
			
			$count++;

		}

		unset($response['success']);
		
		// $response[0]['allDay'] 	= '1';

		// $response[1]['id'] 		= '1';
		// $response[1]['title'] 	= 'Meeting 2';
		// $response[1]['start'] 	= date('c', '1568380023');
		// $response[1]['end'] 	= date('c', '1568416023');
		// $response[1]['allDay'] 	= '1';

	break;



	/**
	 * Get All Meetings for current client
	 */
	case 'meetings/get': 

	break;



	/**
	 * Get All Meetings for current client
	 */
	case 'meetings/new': 

	break;



	/**
	 * Get All Meetings for current client
	 */
	case 'meetings/update': 

	break;



	/**
	 * Get All Meetings for current client
	 */
	case 'meetings/delete': 


	break;



	/**
	 * Set theme to Dark
	 */
	case 'theme/dark':

		if (crm\Users::theme('dark')) {
			$response['success'] = true;
			$response['request']['message'] = 'Theme set to Dark';
		} else {
			$response['success'] = false;
			$response['request']['message'] = 'An unknown error occured, theme reverted.';
		}	

	break;


	/**
	 * Set theme to Light
	 */
	case 'theme/light':

		if (crm\Users::theme('light')) {
			$response['success'] = true;
			$response['request']['message'] = 'Theme set to Light';
		} else {
			$response['success'] = false;
			$response['request']['message'] = 'An unknown error occured, theme reverted.';
		}	

	break;



	
	default:
		
		$response['success'] = false;
		$response['request']['message'] = 'Unknown Response';

		break;
}

echo json_encode($response, JSON_PRETTY_PRINT);
// print_r($response);