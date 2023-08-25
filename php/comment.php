<?php

class Comment
{
    public function uploadComment(string $text, int $id) {
        require('db_config.php');
        $sql = "INSERT INTO image_comments (comment, galleryId) VALUES ('".$_POST['comment']."', '".$_POST['commentId']."')";
		$mysqli->query($sql);
    }   
    
}
?>