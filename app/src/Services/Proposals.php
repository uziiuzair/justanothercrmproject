<?php
namespace uziiuzair\crm\Services;
use uziiuzair\crm\Config;
use uziiuzair\crm\Sessions;

/**
 * 
 */
class Proposals
{


	/**
	 * Create a new Proposal
	 * @param  array  $details 	[description]
	 * @return bool          	[description]
	 */
	public static function create(array $details) {

		if (!Config::$db) {
			Config::db();
		}

		# Proposal Statuses
		# 1: Draft
		# 2: Published
		# 3: Sent to Client
		# 4: Accepted
		# 5: Rejected
		# 6: Archived

		$acceptableValues = array(
			'staff_id',
			'lead_id',
			'client_id',
			'project_id',
			'invoice_id',
			'status',
			'created',
			'updated',
			'duedate',
			'title',
			'content',
			'discount',
			'total'
		);

		$queryColumns 	= '';
		$queryValues 	= '';

		$attribCount 	= count($attributes);
		$keepCount 		= 0;

		foreach ($attributes as $attribute => $value) {
			
			if (in_array($attribute, $attrWhitelist)) {

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
		$proposalCreated = time(); 	# Time when proposal was created
		$proposalUpdated = time();	# Time when proposal was last updated
		$proposalStatus = 1;		# Status of the Proposal

		
		# Append Defaults
		$appendedDefaults = "'" . $proposalCreated . "', '" . $proposalUpdated . "', '" . $proposalUpdated . "'";


		# Build Query
		$theFinalQuery = 'INSERT INTO `proposals` (' . $queryColumns . ', `created`, `updated`, `status`) VALUES (' . $queryValues . ', '. $appendedDefaults .')';


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
	 * Get a Proposal
	 * @param  int 	$proposal_id [description]
	 * @return array              [description]
	 */
	public static function get($proposal_id) {

	}





	/**
	 * Update a Proposal
	 * @param  int $proposal_id [description]
	 * @return bool              [description]
	 */
	public static function update($proposal_id) {

	}





	/**
	 * Archive a Proposal
	 * @param  int $proposal_id [description]
	 * @return bool              [description]
	 */
	public static function archive($proposal_id) {

	}





	/**
	 * Delete a Proposal
	 * @param  [type] $proposal_id [description]
	 * @return [type]              [description]
	 */
	public static function delete($proposal_id) {

	}





	/**
	 * Get all Proposals
	 * @return array [description]
	 */
	public static function all() {

		if (!Config::$db) {
			Config::db();
		}

		$query = Config::$db->query("SELECT * FROM proposals");

		return $query->fetch_all(MYSQLI_ASSOC);

	}





	/**
	 * Get all Proposals for specified Staff
	 * @param  int $client_id [description]
	 * @return array            [description]
	 */
	public static function forStaff($staff_id) {

		if (!Config::$db) {
			Config::db();
		}

		$query = Config::$db->query("SELECT * FROM proposals WHERE `staff_id` = $staff_id");

		return $query->fetch_all(MYSQLI_ASSOC);

	}


	/**
	 * Gets all Proposals with the Project ID
	 * @param  int $id 	 Project ID
	 * @return array    
	 */
	public static function forProject($id) {

		if (!Config::$db) {
			Config::db();
		}

		$query = Config::$db->query("SELECT * FROM proposals WHERE `project_id` = $id");

		return $query->fetch_all(MYSQLI_ASSOC);

	}





	/**
	 * Gets all Proposals with the Client ID
	 * @param  int $id 	 Client ID
	 * @return array    
	 */
	public static function forClient($id) {

		if (!Config::$db) {
			Config::db();
		}

		$query = Config::$db->query("SELECT * FROM proposals WHERE `client_id` = $id");

		return $query->fetch_all(MYSQLI_ASSOC);

	}







}