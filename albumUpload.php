<?php



require('db_config.php');
require('php/albums.php');

if(isset($_POST) && !empty($_POST['title']) && !empty($_POST['description'])){

		$albums= new Albums();
		$albums->uploadAlbum($_POST['title'],$_POST['description']);
		

		$_SESSION['success'] = 'Image Uploaded successfully.';
		header("Location: ".$SERVER."/");
	
}else{
	$_SESSION['error'] = 'Please Select Image or Write title';
	header("Location: ".$SERVER."/");
}


?>