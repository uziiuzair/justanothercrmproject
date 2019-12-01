<?php use uziiuzair\crm;
header('Content-Type: application/json; charset=utf-8;', true);

/**
 * Getting the server request
 */
$page = crm\Routes::getServerRequest('/upload/');

// Initiate Response
$response = array();

switch ($page) {


	case 'client/logo':

		if (!empty($_POST['client_id'])) {

			$mediaArray = array(
				'staff_id'		=> crm\Sessions::get('studioUserLogin')->id,
				'client_id'		=> $_POST['client_id']
			);

			$uploadResponse = crm\Media::upload($_FILES['upload_photo'], $mediaArray, $_POST['upload_type'], SystemWorkingDirectory); 

			if (!empty($uploadResponse)) {
				
				if (crm\Services\Clients::assignBusinessLogo($uploadResponse['media_id'], $_POST['client_id'])) {

					$response['success'] = true;
					$response['error']['message'] = 'Image Uploaded.';

				}
				
			}


		} else {
			$response['success'] = false;
			$response['error']['message'] = 'POST required.';
		}

	break;




	case 'lead/logo':

		if (!empty($_POST['lead_id'])) {

			$mediaArray = array(
				'staff_id'		=> crm\Sessions::get('studioUserLogin')->id,
				'lead_id'		=> $_POST['lead_id']
			);

			$uploadResponse = crm\Media::upload($_FILES['upload_photo'], $mediaArray, $_POST['upload_type'], SystemWorkingDirectory); 

			if (!empty($uploadResponse)) {
				
				if (crm\Services\Leads::assignBusinessLogo($uploadResponse['media_id'], $_POST['lead_id'])) {

					$response['success'] = true;
					$response['error']['message'] = 'Image Uploaded.';

				}
				
			}


		} else {
			$response['success'] = false;
			$response['error']['message'] = 'POST required.';
		}

	break;




	case 'system/logo':

		if (!empty($_POST['upload_type'])) {

			$mediaArray = array(
				'staff_id'		=> crm\Sessions::get('studioUserLogin')->id
			);

			$uploadResponse = crm\Media::upload($_FILES['upload_photo'], $mediaArray, $_POST['upload_type'], SystemWorkingDirectory); 

			if (!empty($uploadResponse)) {
				
				if (crm\Functions::setSystemOption('system-logo', $uploadResponse['media_id'])) {

					$response['success'] = true;
					$response['error']['message'] = 'Image Uploaded.';

				}
				
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