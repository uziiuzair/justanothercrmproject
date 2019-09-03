<?php
namespace uziiuzair\crm\Services;
use uziiuzair\crm\Config;
use uziiuzair\crm\Sessions;

/**
 * Class Tasks
 * @package uziiuzair\crm
 */
class Tasks
{

	/**
	 * Create a new Task
	 * @return [type] [description]
	 */
	public static function create(array $attributes) {

		# Task Statuses
		# 0 - No Status
		# 1 - Not Started
		# 2 - Pending
		# 3 - Started
		# 4 - Due Soon
		# 5 - Overdue
		# 6 - Done
		# 7 - Awaiting Feedback
		# 8 - Cancelled

		if (!Config::$db) {
			Config::db();
		}

		$attributeWhitelist = array('client_id', 'lead_id', 'project_id', 'staff_id', 'milestone_id', 'name', 'description', 'priority', 'start', 'end', 'created', 'updated', 'status', 'billed', 'price', 'discount', 'visible');

		$queryColumns 	= '';
		$queryValues 	= '';

		$attribCount 	= count($attributes);
		$keepCount 		= 0;

		foreach ($attributes as $attribute => $value) {
			
			if (in_array($attribute, $attributeWhitelist)) {

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
		$taskCreated 	= time();
		$taskUpdated 	= time();

		# Append Defaults
		$appendedDefaults 	= "'" . $taskCreated . "', '" . $taskUpdated . "'";

		# Build Query
		$theFinalQuery 		= 'INSERT INTO `tasks` (' . $queryColumns . '`created`, `updated`) VALUES (' . $queryValues . $appendedDefaults .')';

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
		
		// return $theFinalQuery;
		$stmt->close();


	}





	/**
	 * Get by ID
	 */
	public static function get($id, $type='') {

		if (!Config::$db) {
			Config::db();
		}

		$typeWhitelist = array('lead', 'client', 'project');

		if (!empty($type)) {
			if (in_array($type, $typeWhitelist)) {
				$sqlAppend = " WHERE `" . $type . "_id` = " . $id;
			} else {
				return 'Invalid Type';
			}
		}

		$sql = "SELECT * FROM tasks" . $sqlAppend;

		$query = Config::$db->query($sql);

		return $query->fetch_all(MYSQLI_ASSOC);

	}



	/**
	 * Translate the status ID to Works
	 * TO DO: Move this to Templates Class.
	 * @param  [type] $status_id [description]
	 * @return [type]            [description]
	 */
	public static function translatePriority($priority) {

		$priority 	= stripslashes($priority);

		$PriorityArray = array(
			1 => 'Low',
			2 => 'Medium',
			3 => 'High',
			4 => 'Urgent',
		);

		return $PriorityArray[$priority];

	}











}