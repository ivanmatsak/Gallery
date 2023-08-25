<?
    require('db_config.php');

    
    $id = $_POST["id"];
    $sql = "UPDATE `image_gallery` SET `likes` = `likes` + 1 where id=$id";
    $images = $mysqli->query($sql);
      
?>