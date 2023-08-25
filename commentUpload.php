<?php



require('db_config.php');
require('php/comment.php');

if(isset($_POST) && !empty($_POST['comment']) && !empty($_POST['commentId'])){

	$id = $_POST["albumId"];

		$comment= new Comment();
		$comment->uploadComment($_POST['comment'], $_POST['commentId']);
		


		$_SESSION['success'] = 'Comment Uploaded successfully.';
		header("Location: ".$SERVER."/album.php?Id=$id");
	
}else{
	$_SESSION['error'] = 'Please Select Image or Write comment';
	header("Location: ".$SERVER."/album.php?Id=$id");
}


?>