<?php  
/**
 * Config
 *
 * @package 	Just Another CRM Project
 * @author 		uziiuzair [https://www.uziiuzair.com/]
 * @since 		v1.0
 */

namespace uziiuzair\crm;

/**
 * Class Config
 * @package uziiuzair\crm
 */
class Config
{


	/**
	 * MySQL Details
	 */
	const DatabaseHost = 'localhost'; 
	const DatabaseUser = 'root';
	const DatabasePass = 'root';
	const DatabaseName = 'envato_crm';

	/**
	 * System Configuration
	 */
	
	# Sentry Configurations
	const SentryReleaseVersion 		= 'justAnotherCRM@0.0.1';
	const SentryDSN 				= 'https://44835eb0b2cd4d50a1e3a54431b723db@sentry.io/1385784';	
	


	# Environment [development | production]
	const SystemEnvironment 		= 'development';
	const SystemDebug 				= false;



	# System Credentials(?)
	const SystemApplicationName 	= 'Just Another CRM Project';
	const SystemPublicURL    		= 'https://crm.envato.dev:8890/';
	const SystemDefaultPage 		= 'dashboard';

	


	/**
	 * @var \mysqli
	 */
	public static $db;


	/**
	 * @return \mysqli
	 */
	public static function db()
	{
		if (!self::$db) {
			self::$db = new \mysqli(self::DatabaseHost, self::DatabaseUser, self::DatabasePass, self::DatabaseName);
		}
		return self::$db;
	}

}