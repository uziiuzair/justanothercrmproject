<?php
namespace uziiuzair\crm\Services;
use uziiuzair\crm\Config;
use uziiuzair\crm\Sessions;

/**
 * Class Projects
 * @package studio\app
 */
class Projects
{

	/**
	 * Create a new Project
	 * @return [type] [description]
	 */
	public static function create(array $details) {

		# Project Statuses
		# 1 - Not Started
		# 2 - Pending
		# 3 - Started
		# 4 = Due Soon
		# 5 - Overdue
		# 6 - Done
		# 7 - Awaiting Feedback
		# 8 - Cancelled

		$acceptableValues = array();

	}




	/**
	 * Get Project with ID
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public static function get($project_id) {

		if (!Config::$db) {
			Config::db();
		}

		$project_id 	= stripslashes($project_id);
		$project_id 	= Config::$db->escape_string($project_id);

		$project = new \stdClass();

		$stmt = Config::$db->prepare("SELECT * FROM `projects` WHERE `id` = ?");
		$stmt->bind_param('i', $project_id);
		$stmt->bind_result(
			$project->id,
			$project->client_id,
			$project->staff_id,
			$project->assigned,
			$project->name,
			$project->start,
			$project->end,
			$project->description,
			$project->created,
			$project->updated,
			$project->budget,
			$project->value,
			$project->status,
			$project->billed,
			$project->currency_id
		);
		$stmt->execute();
		$stmt->fetch();

		if ($project->id === '') {
			return 'Project not found';
		} else {
			return $project;
		}

		$stmt->close();

	}




	public static function update($id, array $details) {

		$acceptableValues = array();

	}




	public static function archive($id) {

	}




	public static function delete($id) {

	}




	/**
	 * List All Projects
	 * @return [type] [description]
	 */
	public static function all() {

		if (!Config::$db) {
			Config::db();
		}

		$query = Config::$db->query("SELECT * FROM projects");

		return $query->fetch_all(MYSQLI_ASSOC);

	}	





	/**
	 * Get All Projects for Client with ID
	 * @param  [type] $id [description]
	 * @return array
	 */
	public static function forClient($id) {

		if (!Config::$db) {
			Config::db();
		}

		$query = Config::$db->query("SELECT * FROM projects WHERE `client_id` = $id");

		return $query->fetch_all(MYSQLI_ASSOC);

	}




	/**
	 * Get all Milestones for Project
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public static function milestones($id) {

		if (!Config::$db) {
			Config::db();
		}

		$query = Config::$db->query("SELECT * FROM milestones WHERE `project_id` = $id");

		return $query->fetch_all(MYSQLI_ASSOC);

	}





	/**
	 * Gets all Proposals with the Project ID
	 * @param  int $id 	 Project ID
	 * @return array    
	 */
	public static function proposals($id) {

		if (!Config::$db) {
			Config::db();
		}

		$query = Config::$db->query("SELECT * FROM proposals WHERE `project_id` = $id");

		return $query->fetch_all(MYSQLI_ASSOC);

	}






	/**
	 * Gets all Invoices with the Project ID
	 * @param  int $id 	 Project ID
	 * @return array    
	 */
	public static function invoices($id) {

		if (!Config::$db) {
			Config::db();
		}

		$query = Config::$db->query("SELECT * FROM invoices WHERE `project_id` = $id");

		return $query->fetch_all(MYSQLI_ASSOC);

	}






	/**
	 * Get all Projects for specified Staff
	 * @param  int $client_id [description]
	 * @return array            [description]
	 */
	public static function staff($staff_id) {

		if (!Config::$db) {
			Config::db();
		}

		$query = Config::$db->query("SELECT * FROM projects WHERE `staff_id` = $staff_id");

		return $query->fetch_all(MYSQLI_ASSOC);

	}






}