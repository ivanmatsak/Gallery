<?php


session_start();
require('db_config.php');


if(isset($_POST) && !empty($_POST['title']) && !empty($_POST['description'])){


		$sql = "INSERT INTO albums (AlbumName, AlbumDescription) VALUES ('".$_POST['title']."', '".$_POST['description']."')";
		$mysqli->query($sql);


		$_SESSION['success'] = 'Image Uploaded successfully.';
		header("Location: http://localhost/");
	
}else{
	$_SESSION['error'] = 'Please Select Image or Write title';
	header("Location: http://localhost/");
}


?>