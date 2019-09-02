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

}