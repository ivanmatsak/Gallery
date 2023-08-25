<?php



require('db_config.php');
require('php/gallery.php');

if(isset($_POST) && !empty($_POST['id'])){

	$id = $_POST["albumId"];

		$gallery= new Gallery();
		$gallery->deleteImage($_POST['id']);
		


		$_SESSION['success'] = 'Image Deleted successfully.';
		header("Location: ".$SERVER."/album.php?Id=$id");
}else{
	$_SESSION['error'] = 'Please Select Image or Write title';
	header("Location: ".$SERVER."/album.php?Id=$id");
}


?>