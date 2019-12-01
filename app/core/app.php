<?php 
use uziiuzair\crm;
use Sentry\State\Scope;

# Initialize Sentry.io
if (crm\Config::SentryEnable) {

	\Sentry\init([
		'dsn' 			=> crm\Config::SentryDSN,
		'release' 		=> crm\Config::SentryReleaseVersion,
		'environment' 	=> crm\Config::SystemEnvironment
	]);

}


# System Prechecks
# 1. File Upload Settings
# - PHP.INI - Max Post, Max Upload
# 2. 
# 


# System Defaults
# Do NOT edit these values
define('SystemWorkingDirectory'	, dirname(__DIR__, 2));				# System Current Working Directory
define('SystemRequestStartTime'	, time());							# System Request Start Time
define('SystemDebug'			, crm\Config::SystemDebug);			# System Debug
define('SystemEnvironment'		, crm\Config::SystemEnvironment);	# System Environment

# System Development
if (SystemEnvironment == 'development') {
	ini_set('display_errors', 1); 
}



# If Session Exists
if (crm\Sessions::get('studioUserLogin')) {


	# Current User Variable
	$currentUser = crm\Sessions::get('studioUserLogin');

	# Sentry Capture User
	if (crm\Config::SentryEnable) {
		
		\Sentry\configureScope(function (\Sentry\State\Scope $scope): void {
			$scope->setUser([
				'id' 		=> crm\Sessions::get('studioUserLogin')->id,
				'username' 	=> crm\Sessions::get('studioUserLogin')->username,
				'email' 	=> crm\Sessions::get('studioUserLogin')->email
			]);	
		});
	
	}

	# Update User Activity
	crm\Users::updateActivity(SystemRequestStartTime);

}

/** 
 * The following function gets the request and returns the render
 * of the page.
 */
crm\Routes::get();






