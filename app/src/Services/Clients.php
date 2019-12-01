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
use uziiuzair\crm\Media;

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
	public static function create(array $attributes) {

		if (!Config::$db) {
			Config::db();
		}

		# Client Statuses
		# 1 - Active
		# 2 - Inactive
		
		# Acceptable Values
		$acceptableValues = array(
			'staff_id', 'firstname', 'lastname', 'email', 
			'phone', 'company', 'address', 'city', 'state', 
			'zip', 'country_id'
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
		$clientCreated 	= time();		# Created
		$clientUpdated	= time();		# Updated
		$clientMedia	= '0';			# No Media
		$clientStatus	= '1';			# 1 = Active | 2 = Inactive
		$clientRisk 	= '0';			# Risk?! What?
		$clientType		= '1'; 			# I don't quite recall what I created this for
		$clientWeb		= '0'; 			# Website

		# Append Defaults
		$appendedDefaults 	= "'" . $clientCreated . "', '" . $clientUpdated . "', '" . $clientMedia . "', '" . $clientStatus . "', '" . $clientRisk . "', '" . $clientType . "', '" . $clientWeb . "'";

		# Build Query
		$theFinalQuery 		= 'INSERT INTO `clients` (' . $queryColumns . ', `created`, `updated`, `media_id`, `status`, `risk`, `type`, `web`) VALUES (' . $queryValues . ', '. $appendedDefaults .')';


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


		// return $theFinalQuery;


	}





	/**
	 * Update Client
	 * @return [type] [description]
	 */
	public static function update($client_id, array $attributes) {

		if (!Config::$db) {
			Config::db();
		}
		
		# Acceptable Values
		$acceptableValues = array(
			'firstname', 'lastname', 'email', 
			'phone', 'company', 'address', 'city', 
			'state', 'zip', 'country_id'
		);

		$client_id 		= stripslashes($client_id);
		$client_id 		= Config::$db->escape_string($client_id);

		$queryValues 	= '';

		foreach ($attributes as $attribute => $value) {
			
			if (in_array($attribute, $acceptableValues)) {

				$attribute 	= stripslashes($attribute);
				$value 		= stripslashes($value);
				$attribute 	= Config::$db->escape_string($attribute);
				$value 		= Config::$db->escape_string($value);

				$queryValues .= "`". $attribute ."` = '" . $value . "', ";

			}

		}


		# Append Defaults
		$appendedDefaults 	= "`updated` = '". time() ."'";


		# Build Query
		$theFinalQuery 		= 'UPDATE `clients` SET ' . $queryValues . $appendedDefaults . ' WHERE `clients`.`id` = ' . $client_id;


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


		// return $theFinalQuery;


	}





	/**
	 * Archive Client
	 * @return [type] [description]
	 */
	public static function archive($client_id) {

	}





	/**
	 * Delete Client
	 * @return [type] [description]
	 */
	public static function delete($client_id) {

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
			$profile->address,
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
	 * 
	 */
	public static function getBusinessLogo($client_id) {

		$media_id = Clients::get($client_id)->media_id;

		if ($media_id != '0') {
			$media_url = Media::get($media_id)->link;
		} else {
			$media_url = Users::getGravatar(Clients::get($client_id)->email, 500);
		}

		return $media_url;

	}





	public static function assignBusinessLogo($media_id, $client_id) {

		if (!Config::$db) {
			Config::db();
		}

		$media_id 	= stripslashes($media_id);
		$client_id 	= stripslashes($client_id);
		$media_id 	= Config::$db->escape_string($media_id);
		$client_id 	= Config::$db->escape_string($client_id);

		$stmt = Config::$db->prepare("UPDATE clients SET `media_id` = ? WHERE `id` = ?");
		$stmt->bind_param('si', $media_id, $client_id);

		if ($stmt->execute()) {
			return true;
		} else {
			return false;
		}

		$stmt->close();

	}





	/**
	 * Gets all Clients assigned to a Staff Member
	 * @param  int $id 	 Staff ID
	 * @return array    
	 */
	public static function forStaff($id) {

		if (!Config::$db) {
			Config::db();
		}

		$query = Config::$db->query("SELECT * FROM clients WHERE `staff_id` = $id");

		return $query->fetch_all(MYSQLI_ASSOC);

	}




}





