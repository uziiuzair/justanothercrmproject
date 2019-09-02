<?php  
/**
 * Clients
 *
 * @package 	Just Another CRM Project
 * @author 		uziiuzair [https://www.uziiuzair.com/]
 * @since 		v1.0
 */

namespace uziiuzair\crm\Services;
use uziiuzair\crm\Config;
use uziiuzair\crm\Sessions;
use uziiuzair\crm\Users;

/**
 * Class Clients
 * @package studio\app
 */
class Clients
{


	/**
	 * Create Client
	 * @return [type] [description]
	 */
	public static function create() {

		# Client Statuses
		# 1 - Active
		# 2 - Inactive

	}





	/**
	 * Archive Client
	 * @return [type] [description]
	 */
	public static function archive() {

	}





	/**
	 * Delete Client
	 * @return [type] [description]
	 */
	public static function delete() {

	}





	/**
	 * Get All Clients
	 * @return array Returns an array of all Clients.. i thought it was obvious..
	 */
	public static function getAll() {

		if (!Config::$db) {
			Config::db();
		}

		$query = Config::$db->query("SELECT * FROM clients");

		return $query->fetch_all(MYSQLI_ASSOC);

	}




	/**
	 * Get Client Meta
	 * @return [type] [description]
	 */
	public static function meta() {

	}





	/**
	 * Complete Profile
	 * @return [type] [description]
	 */
	public static function complete() {

	}



	/**
	 * Get Client by ID Number
	 * @param  int 		$client_id
	 * @return string 	
	 */
	public static function get($client_id) {

		if (!Config::$db) {
			Config::db();
		}

		$client_id 	= stripslashes($client_id);
		$client_id 	= Config::$db->escape_string($client_id);

		$profile = new \stdClass();

		$stmt = Config::$db->prepare("SELECT * FROM `clients` WHERE `id` = ?");
		$stmt->bind_param('i', $client_id);
		$stmt->bind_result(
			$profile->id,
			$profile->staff_id,
			$profile->media_id,
			$profile->type,
			$profile->firstname,
			$profile->lastname,
			$profile->email,
			$profile->phone,
			$profile->company,
			$profile->addressone,
			$profile->addresstwo,
			$profile->city,
			$profile->state,
			$profile->zip,
			$profile->country,
			$profile->web,
			$profile->risk,
			$profile->status,
			$profile->created,
			$profile->updated
		);
		$stmt->execute();
		$stmt->fetch();

		if ($profile->id === '') {
			return 'client not found';
		} else {
			return $profile;
		}

		$stmt->close();

	}



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

		$query 	= Config::$db->query("SELECT * FROM clients WHERE `id` IN ($idToString)");
	
		return $query->fetch_all(MYSQLI_ASSOC);	

	}




	/**
	 * Active Clients
	 * Gets a list of clients with active projects 
	 *
	 * @return array [Array of clients]
	 */
	public static function activeClients() {

		if (!Config::$db) {
			Config::db();
		}

		/**
		 * Get client IDs for all active projects
		 */
		

		/**
		 * Get details for each client and put it into an array
		 */



	}



	/**
	 * Add Business Logo
	 * 
	 * @param $id
	 * @return bool
	 */
	public static function addBusinessLogo($id, $client_id) {

		if (!Config::$db) {
			Config::db();
		}

		$id 	= stripslashes($id);
		$id 	= Config::$db->escape_string($id);
		$client_id 	= stripslashes($client_id);
		$client_id 	= Config::$db->escape_string($client_id);

		$stmt = Config::$db->prepare("UPDATE business SET `logo` = ?");
		$stmt->bind_param('i', $id);

		if ($stmt->execute()) {
			$stmt->close();
			return true;
		} else {
			$stmt->close();
			if (Constants::DEBUG == true) {
				return 'execute() failed: ' . htmlspecialchars($stmt->error);	 
			} else {
				return false;
			}	
		}

	}




	/**
	 * 
	 */
	public static function getBusinessLogo($email) {

		return Users::getGravatar($email, 500);

	}

}





