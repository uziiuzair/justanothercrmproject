<?php
namespace uziiuzair\crm\Services;
use uziiuzair\crm\Config;
use uziiuzair\crm\Sessions;
use uziiuzair\crm\Users;

/**
 * Class Leads
 * @package studio\app
 */
class Leads
{


	/**
	 * Create Lead
	 * @param  string  $name
	 * @param  array   $attributes
	 * @return bool
	 */
	public static function create($name, array $attributes) {

		if (!Config::$db) {
			Config::db();
		}

		# Lead Statuses:
		# 1 :	New
		# 2 :	Contacted
		# 3 :	Working
		# 4 :	Qualifie
		# 5 :	UnQualified
		# 7 :	Lost
		# 8 :	Junk
		# 9 :	Archived
		# 10 :	Deleted

		$acceptableValues = array(
			'staff_id',
			'assigned',
			'honorific',
			'name',
			'email',
			'phone',
			'company',
			'title',
			'description',
			'website',
			'addressStreet',
			'addressCity',
			'addressState',
			'addressZip',
			'addressCountry',
			'source',
			'status'
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
		$leadDescription 	= ''; 		# No Description
		$leadCreated 		= time(); 	# Created Date
		$leadUpdated 		= time(); 	# Updated Date	
		$leadAssigned		= time(); 	# Assigned Date (changes when reassigned)
		$leadContacted		= '0'; 		# Bleh, you haven't contacted them. Have you? 
		$leadConverted		= '0'; 		# Well, you haven't converted them 🤷‍♂️

		
		# Append Defaults
		$appendedDefaults 	= "'" . $leadDescription . "', '"  . $leadCreated . "', '" . $leadUpdated . "', '" . $leadAssigned . "', '" . $leadContacted . "', '" . $leadConverted . "'";

		
		# Build Query
		$theFinalQuery 		= 'INSERT INTO `leads` (' . $queryColumns . ', `description`, `created`, `updated`, `dateAssigned`, `dateContacted`, `dateConverted`) VALUES (' . $queryValues . ', '. $appendedDefaults .')';


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
	 * Archive Lead
	 * @return [type] [description]
	 */
	public static function archive($lead_id) {

		if (!Config::$db) {
			Config::db();
		}

		# Protect the data!
		$lead_id 	= stripslashes($lead_id);
		$lead_id 	= Config::$db->escape_string($lead_id);

		$status 	= 9; # Archive

		# Prepare the Data!!
		$stmt = Config::$db->prepare("UPDATE `leads` SET `status` = ? WHERE `users`.`id` = ?");
		$stmt->bind_param('ii', $status, $lead_id);

		# Execute the Data!
		if ($stmt->execute()) {

			# Move on.
			return true;
		} else {

			# What have you done now?
			if (Constants::DEBUG == true) {
				return 'execute() failed: ' . htmlspecialchars($stmt->error);	 
			} else {
				return false;
			}	
		}

		$stmt->close();

	}





	/**
	 * Delete Lead
	 * @return [type] [description]
	 */
	public static function delete($lead_id) {

		if (!Config::$db) {
			Config::db();
		}

		$lead_id 	= stripslashes($lead_id);
		$lead_id 	= Config::$db->escape_string($lead_id);

		$status = 10;

		$stmt = Config::$db->prepare("UPDATE `leads` SET `status` = ? WHERE `users`.`id` = ?");
		$stmt->bind_param('ii', $status, $lead_id);

		if ($stmt->execute()) {
			return true;
		} else {
			if (Constants::DEBUG == true) {
				return 'execute() failed: ' . htmlspecialchars($stmt->error);	 
			} else {
				return false;
			}	
		}

		$stmt->close();

	}





	/**
	 * Get All Leads
	 * @return array Returns an array of all Leads.. i thought it was obvious..
	 */
	public static function getAll() {

		if (!Config::$db) {
			Config::db();
		}

		$query = Config::$db->query("SELECT * FROM leads");

		return $query->fetch_all(MYSQLI_ASSOC);

	}





	/**
	 * Get Lead by ID Number
	 * @param  int 		$Lead_id
	 * @return string 	
	 */
	public static function get($lead_id) {

		if (!Config::$db) {
			Config::db();
		}

		$lead_id 	= stripslashes($lead_id);
		$lead_id 	= Config::$db->escape_string($lead_id);

		$profile = new \stdClass();

		$stmt = Config::$db->prepare("SELECT * FROM `leads` WHERE `id` = ?");
		$stmt->bind_param('i', $lead_id);
		$stmt->bind_result(
			$profile->id,
			$profile->staff_id,
			$profile->assigned,
			$profile->honorific,
			$profile->name,
			$profile->email,
			$profile->phone,
			$profile->company,
			$profile->title,
			$profile->description,
			$profile->website,
			$profile->addressStreet,
			$profile->addressCity,
			$profile->addressState,
			$profile->addressZip,
			$profile->addressCountry,
			$profile->created,
			$profile->updated,
			$profile->dateAssigned,
			$profile->dateContacted,
			$profile->dateConverted,
			$profile->source,
			$profile->status
		);
		$stmt->execute();
		$stmt->fetch();

		if ($profile->id === '') {
			return false;
		} else {
			return $profile;
		}

		$stmt->close();

	}





	/**
	 * Active Leads
	 * Gets a list of Leads with active projects 
	 *
	 * @return array [Array of Leads]
	 */
	public static function activeLeads() {

		if (!Config::$db) {
			Config::db();
		}

		$sql = "SELECT * FROM `leads` WHERE `status` = 1 OR `status` = 2 OR `status` = 3 OR `status` = 4"; # I feel like there is a better way to do this. I'll be back.

		$query = Config::$db->query($sql);
		$resultArray = $query->fetch_all(MYSQLI_ASSOC);

		return $resultArray;

		$stmt->close();

	}





	/**
	 * [getBusinessLogo description]
	 * @param  [type] $email [description]
	 * @return [type]        [description]
	 */
	public static function getBusinessLogo($email) {

		return Users::getGravatar($email, 500);

	}




	/**
	 * Translate the status ID to Works
	 * TO DO: Move this to Templates Class.
	 * @param  [type] $status_id [description]
	 * @return [type]            [description]
	 */
	public static function translateStatus($status_id) {

		$status_id 	= stripslashes($status_id);

		$statusArray = array(
			1 => 'New Lead',
			2 => 'Contacted',
			3 => 'Working',
			4 => 'Qualifie',
			5 => 'UnQualified',
			6 => 'Lost',
			7 => 'Junk',
			8 => 'Archived',
			9 => 'Deleted'
		);

		return $statusArray[$status_id];

	}



}





