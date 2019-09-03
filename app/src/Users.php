<?php   
/**
 * Users
 *
 * @package 	Just Another CRM Project
 * @author 		uziiuzair [https://www.uziiuzair.com/]
 * @since 		v1.0
 */

namespace uziiuzair\crm;

/**
 * 	Table of Contents
 * 	1. Authentication
 * 	2. User Information
 *  3. Account Functions
 */

/**
 * Class Users
 */
class Users
{
	
	/**
	 * AUTHENTICATION
	 ****************************************/


	/**
	 * User Login
	 *
	 * Logs user in by authenticating the username and password. 
	 * Password should be sha256 encrypted before hand.
	 * @param $username
	 * @param $password
	 * @return bool
	 */
	public static function login($username, $password) {

		if (!Config::$db) {
			Config::db();
		}

		// To protect MySQLi injection for security purpose
		$username = stripslashes($username);
		$password = stripslashes($password);
		$username = Config::$db->escape_string($username);
		$password = Config::$db->escape_string($password);

		$user = new \stdClass();

		$stmt = Config::$db->prepare("SELECT * FROM users WHERE `username` = ? OR `email` = ?");
		$stmt->bind_param('ss', $username, $username);
		$stmt->bind_result(
			$user->id,
			$user->media_id,
			$user->department_id,
			$user->username,
			$user->email,
			$user->password,
			$user->firstname,
			$user->lastname,
			$user->phone,
			$user->signup_date,
			$user->last_update,
			$user->theme,
			$user->status,
			$user->isadmin,
			$user->loginCounter
		);
		$stmt->execute();
		$stmt->fetch();

		// Update the last update to login time.
		$user->last_update = time();

		// If user is valid, login and set user data
		if ($user->password == $password) {
			

			unset($user->password);
			unset($user->fbAuth);
			unset($password);

			Sessions::set('studioUserLogin', $user);

			return true;

		} else {
			
			return false;
		
		}

		$stmt->close();

	}





	/**
	 * Sign up!
	 * Password should be sha256 encrypted before hand.
	 * @param $username
	 * @param $password
	 * @return bool
	 */
	public static function create(array $attributes) {

		if (!Config::$db) {
			Config::db();
		}

		$acceptableValues = array(
			'firstname', 
			'lastname', 
			'username', 
			'email', 
			'phone', 
			'password',
			'department_id',
			'is_admin'
		);
		
		$queryColumns 	= '';
		$queryValues 	= '';

		$attribCount 	= count($attributes);
		$keepCount 		= 0;

		foreach ($attributes as $attribute => $value) {
			
			if (in_array($attribute, $acceptableValues)) {

				$attribute 	= stripslashes($attribute);
				$value 		= stripslashes($value);
				$attribute 	= Config::$db->escape_string($attribute);
				$value 		= Config::$db->escape_string($value);

				if(++$keepCount === $attribCount) {
					$queryColumns .= '`'. $attribute .'`'; 
					$queryValues .= "'" . $value . "'"; 
				} else {
					$queryColumns .= '`'. $attribute .'`, '; 
					$queryValues .= "'" . $value ."', "; 
				}

			}

		}

		# Defaults
		$staffCreated 	=	time();		# Created
		$staffUpdated 	=	time();		# Last Updated
		$staffStatus 	= 	'1'; 		# 0 = Pending Email Verification | 1 = Active | 2 = Locked | 3 = Banned/Suspended
		$loginCounter	=	'0'; 		# no Failed Logins
		$staffTheme 	=	'light';	# Light or Dark Theme
		$staffMedia 	= 	'0';		# No Media = 0

		# Append Defaults
		$appendedDefaults 	= "'" . $staffCreated . "', '" . $staffUpdated . "', '" . $staffTheme . "', '" . $staffStatus . "', '" . $loginCounter . "', '" . $staffMedia . "'";

		# Build Query
		$theFinalQuery 		= 'INSERT INTO `users` (' . $queryColumns . ', `signup_date`, `last_update`, `theme`, `status`, `login_counter`, `media_id`) VALUES (' . $queryValues . ', '. $appendedDefaults .')';


		# Query
		$stmt = Config::$db->prepare($theFinalQuery);

		# Run Query
		if ($stmt->execute()) {

			# You're good! This was fun.
			return true;

		} else {

			# You seriously messed up.
			return false;

		}

		$stmt->close();
		
	}





	/**
	 * Failed Login
	 * @param $username 
	 * @param $action = failed | reset
	 * @return string
	 */
	public static function loginFailed($username, $action) {

		if (!Config::$db) {
			Config::db();
		}

		$user = stripslashes($username);
		$user = Config::$db->escape_string($username);

		if ($action == 'failed') {
			$stmt = Config::$db->prepare("UPDATE `users` SET `login_counter` = login_counter + 1 WHERE `users`.`username` = ?");
			$stmt->bind_param('s', $user);
		} else {
			$stmt = Config::$db->prepare("UPDATE `users` SET `login_counter` = 0 WHERE `users`.`username` = ?");
			$stmt->bind_param('s', $user);
		}

		if ($stmt->execute()) {
			return true;
		} else {
			return false;	
		}

		$stmt->close();

	}





	/**
	 * Update information for the logged in user
	 * @param array $details
	 * @return bool
	 */
	public static function updateUserInfo(array $details) {

		if (!Config::$db) {
			Config::db();
		}

		$acceptableValues = array('firstName', 'lastName', 'username', 'email', 'password');
		$valueToString = '';
		
		foreach ($details as $detail) {

			if (in_array($detail, $acceptableValues)) {
				$detail 		= stripslashes($detail);
				$detail 		= Config::$db->escape_string($detail);

				$valueToString .= $detail . ',';
			}
			
		}

		$valueToString = substr_replace($valueToString, "", -1);

		// $username 	= stripslashes($username);
		// $password 	= stripslashes($password);
		// $firstname	= stripslashes($firstname);
		// $lastname 	= stripslashes($lastname);
		// $email 		= stripslashes($email);
		// $username 	= Config::$db->escape_string($username);
		// $password 	= Config::$db->escape_string($password);
		// $firstname 	= Config::$db->escape_string($firstname);
		// $lastname 	= Config::$db->escape_string($lastname);
		// $email 		= Config::$db->escape_string($email);

		// $passhash = hash('sha256', $password);
		
		// // SQL query to fetch information of registered users and finds user match.
		// $stmt = Config::$db->prepare("UPDATE `users` SET `password` = ?, `firstname` = ?, `lastname` = ?, `email` = ? WHERE `users`.`username` = ?");
		// $stmt->bind_param('sssss', $passhash, $firstname, $lastname, $email, $username);

		// if ($stmt->execute()) {
		// 	return true;
		// } else {
		// 	return false;	
		// }

		// $stmt->close();

	}





	/**
	 * Updates activity counter of the user. 
	 * @param $time
	 * @return bool
	 */
	public static function updateActivity($time) {

		if (!Config::$db) {
			Config::db();
		}

		$time 	= stripslashes($time);
		$time 	= Config::$db->escape_string($time);

		$currentUser = Sessions::get('studioUserLogin');

		$stmt = Config::$db->prepare("UPDATE `users` SET `last_update` = ? WHERE `users`.`username` = ?");
		$stmt->bind_param('is', $time, $currentUser->username);
		
		if ($stmt->execute()) {
			return true;
		} else {
			return false;
		}

		$stmt->close();

	}





	/**
	 * ACCOUNT FUNCTIONS
	 ****************************************/



	/**
	 * Get Client by ID Number
	 * @param  int 		$client_id
	 * @return string 	
	 */
	public static function getAllWithID(array $ids) {

		if (!Config::$db) {
			Config::db();
		}

		$idToString = '';

		foreach ($ids as $id) {
			$id 	= stripslashes($id);
			$id 	= Config::$db->escape_string($id);

			$idToString .= $id . ',';
		}

		$idToString = substr_replace($idToString, "", -1);

		$query 	= Config::$db->query("SELECT * FROM users WHERE `id` IN ($idToString)");
	
		return $query->fetch_all(MYSQLI_ASSOC);	

	}





	/**
	 * Get User Field
	 * @param  [type] $id    [description]
	 * @param  [type] $field [description]
	 * @return [type]        [description]
	 */
	public static function getUserField($id, $field) {

		if (!Config::$db) {
			Config::db();
		}

		# To protect MySQLi injection for security purpose
		$id = stripslashes($id);
		$id = Config::$db->escape_string($id);

		$acceptableValues = array(
			'id',
			'media_id',
			'username',
			'email',
			'password',
			'firstname',
			'lastname',
			'signup_date',
			'last_update',
			'status',
			'isadmin',
			'loginCounter'
		);
		
		$user = new \stdClass();

		$stmt = Config::$db->prepare("SELECT * FROM users WHERE `id` = ?");
		$stmt->bind_param('i', $id);
		$stmt->bind_result(
			$user->id,
			$user->media_id,
			$user->department_id,
			$user->username,
			$user->email,
			$user->password,
			$user->firstname,
			$user->lastname,
			$user->phone,
			$user->signup_date,
			$user->last_update,
			$user->theme,
			$user->status,
			$user->isadmin,
			$user->loginCounter
		);

		$stmt->execute();
		$stmt->fetch();

		if (in_array($field, $acceptableValues)) {
			return $user->$field;
		} else {
			return 'Field not found';
		}

		$stmt->close();

	}




	/**
	 * Get User Field
	 * @param  [type] $id    [description]
	 * @param  [type] $field [description]
	 * @return [type]        [description]
	 */
	public static function get($id) {

		if (!Config::$db) {
			Config::db();
		}

		# To protect MySQLi injection for security purpose
		$id = stripslashes($id);
		$id = Config::$db->escape_string($id);
		
		$user = new \stdClass();

		$stmt = Config::$db->prepare("SELECT * FROM users WHERE `id` = ?");
		$stmt->bind_param('i', $id);
		$stmt->bind_result(
			$user->id,
			$user->media_id,
			$user->department_id,
			$user->username,
			$user->email,
			$user->password,
			$user->firstname,
			$user->lastname,
			$user->phone,
			$user->signup_date,
			$user->last_update,
			$user->theme,
			$user->status,
			$user->isadmin,
			$user->loginCounter
		);

		$stmt->execute();
		$stmt->fetch();

		unset($user->password);

		return $user;

		$stmt->close();

	}






	/**
	 * Get All users
	 * @param  int 		$client_id
	 * @return string 	
	 */
	public static function getAll($sortby = 'DESC') {

		if (!Config::$db) {
			Config::db();
		}

		$query 	= Config::$db->query("SELECT `id`, `media_id`, `department_id`, `username`, `email`, `firstname`, `lastname`, `phone`, `lastname`, `signup_date`, `is_admin` FROM users ORDER BY signup_date $sortby");
	
		return $query->fetch_all(MYSQLI_ASSOC);	

	}





	/**
	 * Does User Exist
	 * @param $time
	 * @return bool
	 */
	public static function doesUserExist($find, $type) {

		if (!Config::$db) {
			Config::db();
		}

		$find 	= 	stripslashes($find);
		$type 	= 	stripslashes($type);
		$find 	= 	Config::$db->escape_string($find);
		$type 	= 	Config::$db->escape_string($type);

		$user = new \stdClass();

		if ($type == 'username') { // Does Username Exist
			
			$stmt = Config::$db->prepare("SELECT username FROM users WHERE `username` = ?");
			$stmt->bind_param('s', $find);
			$stmt->bind_result(
				$user->username
			);
			$stmt->execute();
			$stmt->fetch();

			if ($user->username == '') {
				return 'false';
			} else {
				return 'true';	
			}

		} elseif ($type == 'email') { // Does Email Exist
			
			$stmt = Config::$db->prepare("SELECT email FROM users WHERE `email` = ?");
			$stmt->bind_param('s', $find);
			$stmt->bind_result(
				$user->email
			);
			$stmt->execute();
			$stmt->fetch();

			if ($user->email == '') {
				return 'false';
			} else {
				return 'true';	
			}

		} else {
			return 'Incorrect Type Defined. Accepts only USERNAME or EMAIL';
		}

		$stmt->close();

	}





	/**
	 * Change Account Status
	 * @param $username 
	 * @param $status - 0 = Pending Email Verification | 1 = Active | 2 = locked | 3 = Banned/Suspended
	 * @return string
	 */
	public static function changeAccountStatus($username, $status) {

		if (!Config::$db) {
			Config::db();
		}

		$user = stripslashes($username);
		$user = Config::$db->escape_string($username);

		if ($status == 'pending') {
			$statusCode = 0;
		} elseif ($status == 'active') {
			$statusCode = 1;
		} elseif ($status == 'locked') {
			$statusCode = 2;
		} elseif ($status == 'suspend') {
			$statusCode = 3;
		} else
		
		$stmt = Config::$db->prepare("UPDATE `users` SET `status` = ? WHERE `users`.`username` = ?");
		$stmt->bind_param('is', $statusCode, $user);
		

		if ($stmt->execute()) {
			return true;
		} else {
			return false;	
		}

		$stmt->close();

	}





	/**
	 * Get Gravatar
	 * 
	 * @param $email 	- Email (the only thing that matters)
	 * @param $s  		- Size
	 * @param $d 		- No Idea
	 * @param $r 		- No Idea
	 * @param $img 		- Image Tag or no.
	 * @param $atts 	- Attributs. No idea why.
	 * @return string
	 */
	public static function getGravatar($email, $s = 500, $d = 'mm', $r = 'g', $img = false, $atts = array())
	{

		$url = 'https://www.gravatar.com/avatar/';
		$url .= md5(strtolower(trim($email)));
		$url .= "?s=$s&d=$d&r=$r";
	
		if ($img) {
			$url = '<img src="' . $url . '"';
			foreach ($atts as $key => $val) {
				$url .= ' ' . $key . '="' . $val . '"';
			}
			$url .= ' />';
		}
	
		return $url;
	
	}




	/**
	 * Get the Department information
	 * 
	 * @param  int $department_id 
	 * @param  string $field 		id | name | description | created | updated 
	 * @return array              
	 */
	public static function department($department_id, $field='name') {

		if (!Config::$db) {
			Config::db();
		}

		$department_id = stripslashes($department_id);
		$department_id = Config::$db->escape_string($department_id);

		$fieldWhitelist = array(
			'id',
			'name',
			'description',
			'created',
			'updated'
		);

		$department = new \stdClass();

		$stmt = Config::$db->prepare("SELECT * FROM departments WHERE `id` = ?");
		$stmt->bind_param('i', $department_id);
		$stmt->bind_result(
			$department->id,
			$department->name,
			$department->description,
			$department->created,
			$department->updated
		);

		$stmt->execute();
		$stmt->fetch();

		if (in_array($field, $fieldWhitelist)) {
			return $department->$field;
		} else {
			return 'Department Field not found';
		}

		$stmt->close();

	}





	/**
	 * Get All Departments
	 * @return [type] [description]
	 */
	public static function departments() {

		if (!Config::$db) {
			Config::db();
		}

		$query 	= Config::$db->query("SELECT * FROM departments");
	
		return $query->fetch_all(MYSQLI_ASSOC);	

	}




	/**
	 * [departmentCreate description]
	 * @param  [type] $departmentName [description]
	 * @return [type]                 [description]
	 */
	public static function departmentCreate($departmentName) {

		if (!Config::$db) {
			Config::db();
		}

		$departmentName = stripslashes($departmentName);
		$departmentName = Config::$db->escape_string($departmentName);

		# Defaults
		$departmentDescription 	=	$departmentName ;	# Department Description
		$departmentCreated 		=	time();				# Created
		$departmentUpdated 		=	time();				# Last Updated

		# Build Query
		$theFinalQuery 		= "INSERT INTO `departments` (`name`, `description`, `created`, `updated`) VALUES ('" . $departmentName . "', '" . $departmentDescription . "', '" . $departmentCreated . "', '" . $departmentUpdated . "')";


		# Query
		$stmt = Config::$db->prepare($theFinalQuery);

		# Run Query
		if ($stmt->execute()) {

			# You're good! This was fun.
			return true;

		} else {

			# You seriously messed up.
			return false;

		}

		$stmt->close();


	}



}