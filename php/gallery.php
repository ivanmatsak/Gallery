<?php

class Gallery
{
    public function uploadImage(string $title, string $image,int $id) {
        require('db_config.php');
        $sql = "INSERT INTO image_gallery (title, image, AlbumId) VALUES ('".$title."', '".$image."','".$id."')";
		$mysqli->query($sql);
    }
    public function deleteImage(int $id) {
        require('db_config.php');
        $sql = "DELETE FROM image_gallery WHERE id = ".$id;
		$mysqli->query($sql);
    }
    
}
?>