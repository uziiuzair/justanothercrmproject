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
	 * 
	 * @param  array  	$file  			The File Array
	 * @param  array  	$attributes  	An array of information about the upload.
	 * @param  string  	$where_to 		System Working Directory
	 * @return bool           		
	 */
	public static function upload($file, array $attributes, $type, $where_to) {

		if (!Config::$db) {
			Config::db();
		}


		$file_upload_directory 	= 	$where_to . '/app/attachments/';	# Directory to upload to
		$file_proper			= 	$file;					# File
		$file_type 				= 	$file_proper['type'];	# File Type


		$file_name 				= 	hash('sha256', basename($file_proper['name'] . time()));			# Change the File Name
		$file_extension 		= 	pathinfo(basename($file_proper['name']), PATHINFO_EXTENSION);		# Get File Extension

		$file_name_complete 	= 	$file_name . '.' . $file_extension;										# The Complete File Name 
		$upload_destination 	= 	$file_upload_directory . $file_name_complete;							# The Complete File Destination
		$file_link 				=	Config::SystemPublicURL . 'app/attachments/' . $file_name_complete;	# The Complete File Link


		# Defaults
		$upload_max_file_size 	= 	512 * 1024 * 1024; 					# 512 MB
		$media_link				=	$file_link;							# File Link
		$media_created			=	time();								# Time the Media was Created
		$media_updated			=	time();								# Time the Media was Updated (which is the same as created time)
		$media_status			=	1;									# Media Status. 1 = Active | 2 = InActive | 3 = Archived
		$media_id				=	WatchDog::generateRandomString(15);	# Media ID
		$media_type				=	$type;


		# Response
		$response				= array();
		$response['media_id']   = $media_id


		# Acceptable Fields
		$acceptableValues = array(
			'staff_id',
			'client_id',
			'project_id',
			'name',
			'tags',
			'expire',
			'protected',
			'password',
			'type',
			'public'
		);


		# Accepted File Types from MDN (https://developer.mozilla.org/en-US/docs/Web/HTTP/Basics_of_HTTP/MIME_types)
		$acceptedFileTypes = array(
			
			# Images
			'image/apng',			# APNG Image File
			'image/bmp',			# BMP Image File
			'image/gif',			# GIF Image File
			'image/x-icon',			# ICO Image File
			'image/jpeg',			# JPEG Image File
			'image/png',			# PNG Image File 
			'image/svg+xml',		# SVG Vector Image File
			'image/tiff',			# TIFF Image File
			'image/webp',			# WEBP Image File
		
			# Audio and Video
			'audio/wave',			# WAV File
			'audio/wav',			# WAV File
			'audio/x-wav',			# WAV File
			'audio/x-pn-wav',		# WAV File
			'audio/webm',			# WEBM Audio File
			'video/webm',			# WEBM Video File
			'audio/ogg',			# OGG Audio File
			'video/ogg',			# OGG Video File
			'application/ogg',		# OGG Video/Audio File
			'video/H264',			# H.264 Video File
			'video/H265',			# H.265 Video File
			'video/mp4',			# MP4 Video File
			'audio/aac',			# AAC Audio File
		
			# Documents
			'application/pdf',		# PDF Document
			'text/csv',				# CSV Document
			'text/rtf',				# RTF Document
			'application/msword',	# MS Office Word
			'application/vnd.openxmlformats-officedocument.wordprocessingml.document',	# MS Office Word
			'application/vnd.ms-excel',													# MS Office Excel
			'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',		# MS Office Excel
			'application/vnd.ms-powerpoint',											# MS Office Powerpoint
			'application/vnd.openxmlformats-officedocument.presentationml.presentation',# MS Office Powerpoint

			# Archive
			'application/zip', 		# ZIP Archive File
			'application/x-bzip',	# BZIP Archive File
			'application/x-bzip2',	# BZIP2 Archive File
			'application/gzip', 	# GZIP Archive File
			'application/x-rar-compressed', # RAR Archve FIle
			'application/x-tar', 	# Tape Archive File
			'application/x-7z-compressed',	# 7z Archive File

			# Fonts
			'font/otf',				# .otf Font File
			'font/ttf',				# .ttf Font File
			'font/woff',			# .woff Font File
			'font/woff2',			# .woff2 Font File

			# Adobe
			'application/illustrator',			# Adobe Illustrator
			'application/x-adobe-indesign',		# Adobe InDesign
			'image/vnd.adobe.photoshop',		# Adobe Photoshop 
			'image/x-raw-adobe'					# Adobe RAW

		);


		# Build MySQL Query
		$queryColumns 	= '';		# Query Columns
		$queryValues 	= '';		# Query Values

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

		# Append Defaults
		$appendedDefaults 	= "'" . $media_link . "', '" . $media_created . "', '" . $media_updated . "', '" . $media_status . "', '" . $media_id . "', '" . $media_type . "'";

		# Build Query
		$theFinalQuery 		= 'INSERT INTO `media` (' . $queryColumns . ', `link`, `created`, `updated`, `status`, `media_id`, `type`) VALUES (' . $queryValues . ', '. $appendedDefaults .')';


		# Check if Upload is even possible
		if (in_array($file_type, $acceptedFileTypes)) {
			
			# Check file size
			if ($file_proper["size"] > $upload_max_file_size) {
				return false;
			} else {

				# Proceed with upload

				$move_file = move_uploaded_file($file_proper['tmp_name'], $upload_destination);

				if (!$move_file) {
					
					return false;

				} else {
			
					chmod($upload_destination, 0644);

					# Query
					$stmt = Config::$db->prepare($theFinalQuery);

					# Run Query
					if ($stmt->execute()) {

						# You're good! This was fun.
						return $response;

					} else {

						# You seriously messed up.
						return false;

					}

					// echo $theFinalQuery;

					$stmt->close();
	
				}				

			}
		
		} else {
			return false; 
		}
		


	}





	/**
	 * Get the Media Array
	 * 
	 * @param  int 		$media_id 	Media ID
	 * @return array
	 */
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
			$media->status,
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





	/**
	 * Get all media.
	 * 
	 * @return array
	 */
	public static function getAll() {

		if (!Config::$db) {
			Config::db();
		}

		$query = Config::$db->query("SELECT * FROM media");

		return $query->fetch_all(MYSQLI_ASSOC);

	}





	/**
	 * Get all media for a Project
	 * 
	 * @param  int 		$project_id 
	 * @return array    
	 */
	public static function forProject($project_id) {

		if (!Config::$db) {
			Config::db();
		}

		$project_id 	= stripslashes($project_id);
		$project_id 	= Config::$db->escape_string($project_id);

		$query = Config::$db->query("SELECT * FROM media WHERE `project_id` = $project_id AND `type` = 'project-upload'");

		return $query->fetch_all(MYSQLI_ASSOC);

	}





	/**
	 * Get all media for a Client
	 * 
	 * @param  int 		$client_id 
	 * @return array    
	 */
	public static function forClient($client_id) {

		if (!Config::$db) {
			Config::db();
		}

		$client_id 	= stripslashes($client_id);
		$client_id 	= Config::$db->escape_string($client_id);

		$query = Config::$db->query("SELECT * FROM media WHERE `client_id` = $client_id AND `type` = 'client-upload'");

		return $query->fetch_all(MYSQLI_ASSOC);

	}





	/**
	 * Get all media for a Staff
	 * 
	 * @param  int 		$staff_id 
	 * @return array    
	 */
	public static function forStaff($staff_id) {

		if (!Config::$db) {
			Config::db();
		}

		$staff_id 	= stripslashes($staff_id);
		$staff_id 	= Config::$db->escape_string($staff_id);

		$query = Config::$db->query("SELECT * FROM media WHERE `staff_id` = $staff_id");

		return $query->fetch_all(MYSQLI_ASSOC);

	}






	/**
	 * [update description]
	 * @param  [type] $media_id [description]
	 * @param  array  $details  [description]
	 * @return [type]           [description]
	 */
	public static function update($media_id, array $details) {

	}





	/**
	 * [archive description]
	 * @param  [type] $media_id [description]
	 * @return [type]           [description]
	 */
	public static function archive($media_id) {

	}






	/**
	 * [delete description]
	 * @param  [type] $media_id [description]
	 * @return [type]           [description]
	 */
	public static function delete($media_id) {

	}

}