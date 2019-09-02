<?php  
/**
 * Services
 *
 * @package 	Just Another CRM Project
 * @author 		uziiuzair [https://www.uziiuzair.com/]
 * @since 		v1.0
 *
 * Table of Contents
 * 1. Services
 * 2. Services Category
 * 3. Services Purchased
 */

namespace uziiuzair\crm\Services;
use uziiuzair\crm\Config;
use uziiuzair\crm\Sessions;

/**
 * 
 */
class Services
{
	
	/**
	 * Services
	 *******************************/

	public static function create() {

	}


	public static function update() {

	}


	public static function get(array $ids) {

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

		$query 	= Config::$db->query("SELECT * FROM services WHERE `id` IN ($idToString)");
		
		return $query->fetch_all(MYSQLI_ASSOC);	

	}


	public static function all() {

		if (!Config::$db) {
			Config::db();
		}

		$query = Config::$db->query("SELECT * FROM services");

		return $query->fetch_all(MYSQLI_ASSOC);

	}


	public static function archive() {

	}


	public static function delete() {

	}




	/**
	 * Services Category
	 *******************************/

	public static function createCategory() {

	}



	public static function getCategory($id, $value) {

		$id 	= stripslashes($id);
		$id 	= Config::$db->escape_string($id);

		$category = new \stdClass();

		$stmt = Config::$db->prepare("SELECT * FROM `servicesCategory` WHERE `id` = ?");
		$stmt->bind_param('i', $id);
		$stmt->bind_result(
			$category->id,
			$category->name,
			$category->created,
			$category->updated
		);
		$stmt->execute();
		$stmt->fetch();

		if ($category->id === '') {
			return 'category not found';
		} else {
			return $category->$value;
		}

		$stmt->close();

	}



	public static function allCategories() {

		if (!Config::$db) {
			Config::db();
		}

		$query = Config::$db->query("SELECT * FROM servicesCategory");

		return $query->fetch_all(MYSQLI_ASSOC);

	}



	public static function updateCategory() {

	}



	public static function archiveCategory() {

	}



	public static function deleteCategory() {

	}
  




	/**
	 * Services Purchased
	 *******************************/

	public static function getForProject($id) {

		if (!Config::$db) {
			Config::db();
		}
		
		$id 	= stripslashes($id);
		$id 	= Config::$db->escape_string($id);

		$query 	= Config::$db->query("SELECT * FROM servicesPurchased WHERE `project_id` = $id");
		
		return $query->fetch_all(MYSQLI_ASSOC);	
	}


}
