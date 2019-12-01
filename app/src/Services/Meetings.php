<?php
namespace uziiuzair\crm\Services;
use uziiuzair\crm\Config;
use uziiuzair\crm\Sessions;

/**
 * Class Meetings
 * @package studio\app
 */
class Meetings
{


	public static function create(array $details) {
		
	}	

	public static function update() {
		
	}	

	public static function get($id) {
		
	}	

	public static function all() {

		if (!Config::$db) {
			Config::db();
		}

		$query = Config::$db->query("SELECT * FROM meetings");

		return $query->fetch_all(MYSQLI_ASSOC);
		
	}


	public static function delete($meeting_id) {
		
	}	


	public static function forStaff() {

		if (!Config::$db) {
			Config::db();
		}

		$staff_id = Sessions::get('studioUserLogin')->id;

		$query = Config::$db->query("SELECT * FROM meetings WHERE `staff_id` = $staff_id");

		return $query->fetch_all(MYSQLI_ASSOC);
		
	}	


	public static function forClient($client_id) {

		if (!Config::$db) {
			Config::db();
		}

		$client_id 	= stripslashes($client_id);
		$client_id 	= Config::$db->escape_string($client_id);

		$query = Config::$db->query("SELECT * FROM meetings WHERE `client_id` = $client_id");

		return $query->fetch_all(MYSQLI_ASSOC);
		
	}	

	

}