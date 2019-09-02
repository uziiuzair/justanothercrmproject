<?php 
use uziiuzair\crm;
use Sentry\State\Scope;

/** 
 * Initialize Sentry.io
 */
\Sentry\init([
	'dsn' => crm\Config::SentryDSN,
	'release' => crm\Config::SentryReleaseVersion,
	'environment' => crm\Config::SystemEnvironment
]);



/**
 * System Development
 */
if (crm\Config::SystemEnvironment == 'development') {
	ini_set('display_errors', 1); 
}



/**
 * If Session Exists
 */
if (crm\Sessions::get('studioUserLogin')) {


	/**
	 * Current User Variable
	 */
	$currentUser = crm\Sessions::get('studioUserLogin');

	/**
	 * Sentry Capture User
	 */
	\Sentry\configureScope(function (\Sentry\State\Scope $scope): void {
		$scope->setUser([
			'id' => crm\Sessions::get('studioUserLogin')->id,
			'username' => crm\Sessions::get('studioUserLogin')->username,
			'email' => crm\Sessions::get('studioUserLogin')->email
		]);	
	});


	/**
	 * Update User Activity
	 */
	crm\Users::updateActivity(time());

}

/** 
 * The following function gets the request and returns the render
 * of the page.
 */
crm\Routes::get();
