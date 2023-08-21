<?php


session_start();
require('db_config.php');


if(isset($_POST) && !empty($_POST['id'])){

	$id = $_POST["albumId"];
	
		$sql = "DELETE FROM image_gallery WHERE id = ".$_POST['id'];
		$mysqli->query($sql);


		$_SESSION['success'] = 'Image Deleted successfully.';
		header("Location: http://localhost/album.php?Id=$id");
}else{
	$_SESSION['error'] = 'Please Select Image or Write title';
	header("Location: http://localhost/album.php?Id=$id");
}


?>