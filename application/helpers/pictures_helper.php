<?php

function uploadPicture ($postName) {
	$CI =& get_instance();
	$result = false;
	if (isset($_FILES[$postName]) && $_FILES[$postName]['error'] == UPLOAD_ERR_OK) {
		$file = $_FILES[$postName];
		$CI->load->helper('string');
		$ext = explode ('/', $file['type']);
		$ext = isset($ext[1])?$ext[1]:"";
		$path = getcwd().'/uploads/';
		while (file_exists($path . ($fileName = random_string('alnum', rand(8, 12)).".".$ext))) {}
		if (move_uploaded_file($file['tmp_name'], $path . $fileName)) {
			$result = $fileName;
		}
	}
	return $result;
}
