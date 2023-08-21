<?php


session_start();
require('db_config.php');


if(isset($_POST) && !empty($_POST['comment']) && !empty($_POST['commentId'])){

	$id = $_POST["albumId"];

		$sql = "INSERT INTO image_comments (comment, galleryId) VALUES ('".$_POST['comment']."', '".$_POST['commentId']."')";
		$mysqli->query($sql);


		$_SESSION['success'] = 'Comment Uploaded successfully.';
		header("Location: http://localhost/album.php?Id=$id");
	
}else{
	$_SESSION['error'] = 'Please Select Image or Write comment';
	header("Location: http://localhost/album.php?Id=$id");
}


?>