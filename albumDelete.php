<?php


session_start();
require('db_config.php');


if(isset($_POST) && !empty($_POST['id'])){

        $sql = "DELETE FROM image_gallery WHERE AlbumId = ".$_POST['id'];
        $mysqli->query($sql);
		$sql = "DELETE FROM albums WHERE Id = ".$_POST['id'];
		$mysqli->query($sql);

        


		$_SESSION['success'] = 'Album Deleted successfully.';
		header("Location: http://localhost/");
}else{
	$_SESSION['error'] = 'Please Select Image or Write title';
	header("Location: http://localhost/");
}


?>