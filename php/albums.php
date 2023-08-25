<?php

class Albums
{
    public function uploadAlbum(string $title, string $description) {
        require('db_config.php');
        $sql = "INSERT INTO albums (AlbumName, AlbumDescription) VALUES ('".$title."', '".$description."')";
		$mysqli->query($sql);
    }
    public function deleteAlbum(int $id) {
        require('db_config.php');
        $sql = "DELETE FROM image_gallery WHERE AlbumId = ".$id;
        $mysqli->query($sql);
		$sql = "DELETE FROM albums WHERE Id = ".$id;
		$mysqli->query($sql);
    }
}
?>