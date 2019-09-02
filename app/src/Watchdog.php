<?php  
/**
 * Watchdog
 *
 * @package 	Just Another CRM Project
 * @author 		uziiuzair [https://www.uziiuzair.com/]
 * @since 		v1.0
 */

namespace uziiuzair\crm;

/**
 * Class WatchDog
 * @package studio\app
 */
class WatchDog
{

	/**
	 * Generate a Random String 
	 * 
	 * @param $length
	 * @return string
	 */
	public static function generateRandomString($length = 25) {
		
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		
		for ($i = 0; $i < $length; $i++) {
		    $randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		
		return $randomString;
	
	}

}