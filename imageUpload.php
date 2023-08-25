<?php



require('db_config.php');
require('php/gallery.php');

if(isset($_POST) && !empty($_FILES['image']['name']) && !empty($_POST['title'])){

	$id = $_POST["albumId"];
	$name = $_FILES['image']['name'];
	list($txt, $ext) = explode(".", $name);
	$image_name = time().".".$ext;
	$tmp = $_FILES['image']['tmp_name'];


	if(move_uploaded_file($tmp, 'uploads/'.$image_name)){

		$gallery= new Gallery();
		$gallery->uploadImage($_POST['title'], $image_name, $id);
		


		$_SESSION['success'] = 'Image Uploaded successfully.';
		header("Location: ".$SERVER."/album.php?Id=$id");
	}else{
		$_SESSION['error'] = 'image uploading failed';
		header("Location: ".$SERVER."/album.php?Id=$id");
	}
}else{
	$_SESSION['error'] = 'Please Select Image or Write title';
	header("Location: ".$SERVER."/album.php?Id=$id");
}


?>