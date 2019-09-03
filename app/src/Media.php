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
	

	/**
	 * Upload Media
	 * @param  array  $details  [description]
	 * @return bool           	[description]
	 */
	public static function uplaod(array $details) {

		$acceptableValues = array(
			'staff_id',
			'client_id',
			'project_id',
			'name',
			'type',
			'tags',
			'expire',
			'protected',
			'password',
			'public'
		);

		// $acceptedFileTypes = array(
		// 	''
		// )

	}


	public static function get($media_id) {

		if (!Config::$db) {
			Config::db();
		}

		// To protect MySQLi injection for security purpose
		$media_id = stripslashes($media_id);
		$media_id = Config::$db->escape_string($media_id);

		$media = new \stdClass();

		$stmt = Config::$db->prepare("SELECT * FROM media WHERE `media_id` = ?");
		$stmt->bind_param('s', $media_id);
		$stmt->bind_result(
			$media->id,
			$media->media_id,
			$media->staff_id,
			$media->client_id,
			$media->project_id,
			$media->name,
			$media->link,
			$media->type,
			$media->tags,
			$media->created,
			$media->updated,
			$media->expire,
			$media->protecte,
			$media->password,
			$media->public
		);
		$stmt->execute();
		$stmt->fetch();

		return $media;

		$stmt->close();

	}


	public static function getAll() {

		if (!Config::$db) {
			Config::db();
		}

		$query = Config::$db->query("SELECT * FROM media");

		return $query->fetch_all(MYSQLI_ASSOC);

	}


	public static function getAllForProject($project_id) {

		if (!Config::$db) {
			Config::db();
		}

		$project_id 	= stripslashes($project_id);
		$project_id 	= Config::$db->escape_string($project_id);

		$query = Config::$db->query("SELECT * FROM media WHERE `project_id` = $project_id");

		return $query->fetch_all(MYSQLI_ASSOC);

	}


	public static function update($media_id, array $details) {

	}


	public static function archive($media_id) {

	}


	public static function delete($media_id) {

	}

}