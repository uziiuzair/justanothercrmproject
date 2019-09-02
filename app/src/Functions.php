<?php  
/**
 * Functions
 *
 * @package 	Just Another CRM Project
 * @author 		uziiuzair [https://www.uziiuzair.com/]
 * @since 		v1.0
 */

namespace uziiuzair\crm;

/**
 * Class Functions
 * @package studio\app
 */
class Functions
{

	/**
	 * Get Country
	 */
	public static function getCountry($id, $value = 'name') {
		
		if (!Config::$db) {
			Config::db();
		}

		$id 	= stripslashes($id);
		$value 	= stripslashes($value);
		$id 	= Config::$db->escape_string($id);
		$value 	= Config::$db->escape_string($value);

		$currency = new \stdClass();

		$stmt = Config::$db->prepare("SELECT * FROM `countries` WHERE `id` = ?");
		$stmt->bind_param('i', $id);
		$stmt->bind_result(
			$currency->id,
			$currency->name,
			$currency->iso,
			$currency->prefix,
			$currency->continent
		);
		$stmt->execute();
		$stmt->fetch();

		return $currency->$value;

		$stmt->close();

	}




	/**
	 * Get Countries
	 */
	public static function getCountries() {
		
		if (!Config::$db) {
			Config::db();
		}

		$sql	= 'SELECT * FROM countries';
		$query 	= Config::$db->query($sql);

		return $query->fetch_all(MYSQLI_ASSOC);

	}





	/**
	 * Get Currency
	 */
	public static function getCurrency($id, $value='prefix') {
		
		if (!Config::$db) {
			Config::db();
		}

		$id 	= stripslashes($id);
		$id 	= Config::$db->escape_string($id);

		$currency = new \stdClass();

		$stmt = Config::$db->prepare("SELECT * FROM `currency` WHERE `id` = ?");
		$stmt->bind_param('i', $id);
		$stmt->bind_result(
			$currency->id,
			$currency->name,
			$currency->symbol,
			$currency->prefix,
			$currency->value,
			$currency->created,
			$currency->updated
		);
		$stmt->execute();
		$stmt->fetch();

		return $currency->$value;

		$stmt->close();

	}


	


	/**
	 * Get Continent
	 */
	public static function getContinent($name = null) {
		
		if (!Config::$db) {
			Config::db();
		}

		$name 	= stripslashes($name);
		$name 	= Config::$db->escape_string($name);

		$sql = "SELECT * FROM `countries`";

		if ($name != null) {
			$sql .= " WHERE `continent` = '" . $name . "'";
		}

		$query = Config::$db->query($sql);
		$resultArray = $query->fetch_all(MYSQLI_ASSOC);

		return $resultArray;

		$stmt->close();

	}





	/**
	 * 
	 */
	public static function getlogs($type, $id='') {

		if (!Config::$db) {
			Config::db();
		}

		$id 	= stripslashes($id);
		$id 	= Config::$db->escape_string($id);
		$type 	= stripslashes($type);
		$type 	= Config::$db->escape_string($type);

		$acceptableValues = array('client_log', 'system_log', 'user_log', 'api_log', 'project_log', 'lead_log', 'staff_log');

		if (in_array($type, $acceptableValues)) {

			if ('client_log' == $type) {
				if (!empty($id)) {
					$query = 'SELECT * FROM `logs` WHERE `client_id` = ' . $id . ' AND `type` = "client_log"';
				} else {
					$query = 'SELECT * FROM `logs` WHERE `type` = "client_log"';
				}
			} elseif ('project_log' == $type) {
				if (!empty($id)) {
					$query = 'SELECT * FROM `logs` WHERE `project_id` = ' . $id . ' AND `type` = "project_log"';
				} else {
					$query = 'SELECT * FROM `logs` WHERE `type` = "project_log"';
				}
			} elseif ('user_log' == $type) {
				if (!empty($id)) {
					$query = 'SELECT * FROM `logs` WHERE `staff_id` = ' . $id . ' AND `type` = "staff_log"';
				} else {
					$query = 'SELECT * FROM `logs` WHERE `type` = "staff_log"';
				}
			} elseif ('lead_log' == $type) {
				if (!empty($id)) {
					$query = 'SELECT * FROM `logs` WHERE `client_id` = ' . $id . ' AND `type` = "lead_log"';
				} else {
					$query = 'SELECT * FROM `logs` WHERE `type` = "lead_log"';
				}
			} elseif ('staff_log' == $type) {
				if (!empty($id)) {
					$query = 'SELECT * FROM `logs` WHERE `staff_id` = ' . $id;
				} else {
					return 'invalid log type';
				}
			} else {
				$query = 'SELECT * FROM `logs` WHERE `type` = ' . $type;
			}
			
			$logs = Config::$db->query($query);
			return $logs->fetch_all(MYSQLI_ASSOC);


		} else {
			return 'invalid log type';
		}

		$stmt->close();

		# I'll be back. This code can be written a lot cleaner. Write to me if I haven't fixed this in production.

	}





	/**
	 * Create Log
	 * @param  string $type    
	 * @param  string $message 
	 * @return bool          
	 */
	public static function createLog($type = 'system_log', array $attributes) {

		if (!Config::$db) {
			Config::db();
		}

		# Basic SQL injecttion sanitization
		$type 	 = stripslashes($type);
		$type 	 = Config::$db->escape_string($type);

		# Allow only the following types
		$types = array(
			'client_log', 
			'system_log', 
			'user_log', 
			'api_log', 
			'project_log', 
			'lead_log'
		);
		
		# Allow only the following fields to be 
		$attrWhitelist = array(
			'client_id', 
			'project_id', 
			'staff_id',
			'title', 
			'log', 
			'created', 
			'updated'
		);

		# Initialize Query Variables
		$queryColumns 	= '';
		$queryValues 	= '';

		# Count count count
		$attribCount 	= count($attributes);
		$keepCount 		= 0;

		# Check if the mentioned $type is whitelisted.
		if (in_array($type, $types)) {

			# Build query!
			foreach ($attributes as $attribute => $value) {

				# Check if the query values are whitelisted.
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

		} else {

			# You messed up
			return 'Log type not allowed';
		
		}

		# Defaults
		$logCreated		= time();	# Created Date
		$logUpdated		= time();	# Updated Date

		# Append Defaults
		$appendedDefaults 	= "'" . $logCreated . "', '" . $logUpdated . "', '" . $type . "'";

		# The final query
		$theQuery = 'INSERT INTO `logs` (' . $queryColumns . ', `updated`, `created`, `type`) VALUES (' . $queryValues . ', '. $appendedDefaults .')';

		# Prepare query
		$stmt = Config::$db->prepare($theQuery);
		
		# Run Query
		if ($stmt->execute()) {

			# You're good! This was fun.
			return true;

		} else {

			# You seriously messed up.
			if (Config::SystemDebug == true) {
				return 'execute() failed: ' . htmlspecialchars($stmt->error);	 
			} else {
				return false;
			}

		}

		$stmt->close();

	}






	/**
	 * Generate Randomg String
	 * @param  string  $string Sentence, strings, numbers you name it..
	 * @param  integer $max    The length of the string.
	 * @return string          [description]
	 */
	public static function generateString($string, $max=20) {
		
		$tok		=	strtok($string,' ');
		$string 	=	''; # Dafaq is this for.

		while( $tok!==false && strlen($string ) < $max ) {

			if (strlen($string)+strlen($tok)<=$max) $string.=$tok.' '; else break;
			$tok=strtok(' ');

		}
	
		if (strlen($string) < $max) {
			$rString = trim($string);
		} else {
			$rString = trim($string) . '...';
		}

		return $rString;

	}




	/**
	 * Count the number of rows in a given table.
	 * @param  string 	$table 	The name of the table
	 * @param  int 		$id    	(Optional) The ID of the user. 
	 * @return int      Returns integer, number of row.
	 */
	public static function countRows($table, $id = null, $someQuery = null) {

		if (!Config::$db) {
			Config::db();
		}

		$table 	= stripslashes($table);
		$id 	= stripslashes($id);
		$id 	= Config::$db->escape_string($id);
		$table 	= Config::$db->escape_string($table);

		$sql	= 'SELECT count(*) FROM ' . $table;

		if ($id != null) {
			$sql 	= 'SELECT count(*) FROM ' . $table . ' WHERE `staff_id` = ' . $id;
		} 

		if ($someQuery != null) {
			if ($id == null) {
				$sql 	= 'SELECT count(*) FROM ' . $table . ' WHERE ' . $someQuery;
			} else {
				$sql 	= 'SELECT count(*) FROM ' . $table . ' WHERE `staff_id` = ' . $id . ' AND ' . $someQuery;
			}
			
		}

		$query = Config::$db->query($sql);
		$resultArray = $query->fetch_all(MYSQLI_ASSOC);

		return $resultArray[0]['count(*)'];

	}






	/**
	 * Get Days Ago
	 * @param  integer $secondsSubtracted [description]
	 * @return [type]                     [description]
	 */
	public static function daysAgo($secondsSubtracted = 0) {

		# Sanitize! Practice it safely kids.
		$secondsSubtracted 	= stripslashes($secondsSubtracted);
		$secondsSubtracted 	= Config::$db->escape_string($secondsSubtracted);

		# The date
		$todaysDate = time();
		
		# What day was it?
		return date('d M Y', $todaysDate - $secondsSubtracted);

	}





}


























