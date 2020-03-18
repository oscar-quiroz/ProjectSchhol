<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$files=$_FILES['files'];

	for ($i=0; $i < count($files['name']); $i++) {
		if (is_uploaded_file($_FILES['files']['tmp_name'][$i])) {
			if(empty($_FILES['files']['name'][$i])){
				echo " Archivo vacío ";
				exit;
			}

			$upload_file_name = $_FILES['files']['name'][$i];

			if(strlen ($upload_file_name)>100) {
				echo " too long file name ";
				exit;
			}

			$upload_file_name = preg_replace("/[^A-Za-z0-9 \.\-_]/", '', $upload_file_name);

			if ($_FILES['files']['size'][$i] > 1000000) {
				echo " too big file ";
				exit;
			}
			mkdir("uploads/l");
			$dest=__DIR__.'/uploads/'.$upload_file_name;

			if (move_uploaded_file($_FILES['files']['tmp_name'][$i], $dest)) {
				echo 'File Has Been Uploaded !';
			}
		} 
	}
}
?>