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
	
	
	# Sentry Configurations
	const SentryEnable				= true;
	const SentryReleaseVersion 		= 'justAnotherCRM@0.0.1';
	const SentryDSN 				= 'https://44835eb0b2cd4d50a1e3a54431b723db@sentry.io/1385784';	
	


	# Environment 
	const SystemEnvironment 		= 'development';								# System Environment [development | production]
	const SystemDebug 				= false;										# If there is an issue, Enable Debug


	# MySQL Details
	const DatabaseHost 				= 'localhost'; 									# Database Host
	const DatabaseUser 				= 'root';										# Database Username
	const DatabasePass 				= 'root';										# Database Password
	const DatabaseName 				= 'envato_crm';									# Databane Name



	# System Defaults
	const SystemApplicationName 	= 'Just Another CRM Project';					# Name of your Application
	const SystemPublicURL    		= 'https://crm.envato.dev:8890/';				# Domain for your Application with leading slash
	const SystemDefaultPage 		= 'dashboard'; 									# Default Page (e.g. dashboard) 



	# Mail
	const MailHost 					= '';											# Mail Server Hostname
	const MailUsername 				= '';											# Mail Server Username
	const MailPassword 				= '';											# Mail Server Password
	const MailPort 					= '';											# Mail Server Port
	const MailSSL 					= true;											# Shall we use SSL?
	const MailSendAs 				= 'noreply@justanothercrm.co';					# What is your default email address to send from?
	const MailReplyTo 				= 'business@uziiuzair.com';						# If set, Your clients will be able to reply to your emails.



	# AWS S3 Configuration
	const AWSEnable 				= false;										# Shall we use AWS for File Uploads?
	const AWSKey 					= '';											# What is your AWS Key?
	const AWSSecret 				= '';											# What is your AWS Secret?
	const AWSRegion 				= 'ap-southeast-1';								# What region does your AWS S3 Container exist at?
	const AWSVersion 				= '2006-03-01';									# 
	const AWSBucket					= 'justanothercrm.uploads';						# What is your AWS Bucket Name?
	const AWSACL 					= 'public-read';								# 

	# You will find the guide to setup AWS at: https://support.uziiuzair.com/jacrm/setup/aws


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