<?php



require('db_config.php');
require('php/albums.php');

if(isset($_POST) && !empty($_POST['id'])){



		$albums= new Albums();
		$albums->deleteAlbum($_POST['id']);

		$_SESSION['success'] = 'Album Deleted successfully.';
		header("Location: ".$SERVER."/");
}else{
	$_SESSION['error'] = 'Please Select Image or Write title';
	header("Location: ".$SERVER."/");
}


?>