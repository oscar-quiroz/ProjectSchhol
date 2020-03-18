<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="post" enctype="multipart/form-data" action="uploadfile.php">
		<p>
	      	<label for="my_upload">Select the file to upload:</label>
	      	<input id="my_upload" name="files[]" type="file" multiple>
    	</p>

    	<input type="submit" value="Upload Now">
	</form>
</body>
</html>