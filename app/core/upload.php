<?php use uziiuzair\crm;
header('Content-Type: application/json; charset=utf-8;', true);

/**
 * Getting the server request
 */
$page = crm\Routes::getServerRequest('/upload/');

// Initiate Response
$response = array();

switch ($page) {

	case 'client/profile':

		if (!empty($_FILES)) {

			$uploadedImage 	= $_FILES['file']['tmp_name']; 
  			$temp 			= explode(".", $_FILES["file"]["name"]);
  			$finalName 		= app\Watchdog::generateRandomString('25') . '.' . end($temp);

  			$media_id = app\Media::genMediaId();

  			if (app\Services\Clients::addBusinessLogo($media_id)) {
  				app\Files::upload($uploadedLogo, $finalName, 'businessLogo', $media_id);
  			}

		} else {
			$response['success'] = false;
			$response['error']['message'] = 'POST required.';
		}

	break;

	default:

		$response['success'] = false;
		$response['error']['message'] = 'Unknown Response';
		
		break;

}


echo json_encode($response, JSON_PRETTY_PRINT);