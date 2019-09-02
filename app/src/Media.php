<?php  
/**
 * Media
 *
 * @package 	Just Another CRM Project
 * @author 		uziiuzair [https://www.uziiuzair.com/]
 * @since 		v1.0
 */

namespace uziiuzair\crm;

/**
 * 
 */
class Media
{
	
	public static function uplaod($media_id, array $details) {

	}


	public static function get() {

	}


	public static function getAll() {

		if (!Config::$db) {
			Config::db();
		}

		$query = Config::$db->query("SELECT * FROM files");

		return $query->fetch_all(MYSQLI_ASSOC);

	}


	public static function getAllForProject($project_id) {

		if (!Config::$db) {
			Config::db();
		}

		$project_id 	= stripslashes($project_id);
		$project_id 	= Config::$db->escape_string($project_id);

		$query = Config::$db->query("SELECT * FROM files WHERE `project_id` = $project_id");

		return $query->fetch_all(MYSQLI_ASSOC);

	}


	public static function update($media_id, array $details) {

	}


	public static function archive($media_id) {

	}


	public static function delete($media_id) {

	}

}