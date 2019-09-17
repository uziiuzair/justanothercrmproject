<?php   
/**
 * Templates
 *
 * @package 	Just Another CRM Project
 * @author 		uziiuzair [https://www.uziiuzair.com/]
 * @since 		v1.0
 */

namespace uziiuzair\crm;

/**
 * 
 */
class Templates
{
	
	/**
	 * Gets Theme Header
	 * @param  string $header [Title of Page]
	 * @return 
	 */
	public static function get_header($header = '') {
		$header = stripcslashes($header);
		include 'app/includes/header.php';
	}





	/**
	 * Gets Theme Footer
	 * @return 
	 */
	public static function get_footer() {
		include 'app/includes/footer.php';
	}





	/**
	 * Get Snippet
	 * @param string $name [Name of Snipper]
	 */
	public static function snippet($name) {

		include 'app/views/snippets/snippet.' . $name . '.php';

	}






	/**
	 * Get View
	 */
	public static function view($name) {

		
		$file = 'app/views/' . stripslashes($name) . '.php';
		
		if (file_exists($file)) {			
			include $file;
		} else {
			echo 'file not found: ' . $file;
		}

	}





	public static function translate($translation) {

		
		
	}




	public static function getSystemWorkingDirectory() {
		return SystemWorkingDirectory;
	}





}