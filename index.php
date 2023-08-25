<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Albums</title>
  </head>
  <body>
   


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="jquery.js"></script>
   

    <h2>Список альбомов</h2>
    <form action="/albumUpload.php" method="POST">


    <?php if(!empty($_SESSION['error'])){ ?>
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                <li><?php echo $_SESSION['error']; ?></li>
            </ul>
        </div>
    <?php unset($_SESSION['error']); } ?>


    <?php if(!empty($_SESSION['success'])){ ?>
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
            <strong><?php echo $_SESSION['success']; ?></strong>
    </div>
    <?php unset($_SESSION['success']); } ?>


    <div class="row">
        <div class="col-md-5">
            <strong>Название:</strong>
            <input type="text" name="title" class="form-control" placeholder="Название">
        </div>
        <div class="col-md-5">
            <strong>Описание:</strong>
            <input type="text" name="description" class="form-control" placeholder="Описание">
        </div>
        
        <div class="col-md-2">
            <br/>
            <button type="submit" class="btn btn-success">Добавить</button>
        </div>
    </div>


    </form> 
    <br>




<?php
require('db_config.php');



if($mysqli->connect_error){
    die("Ошибка: " . $mysqli->connect_error);
}
$sql = "SELECT * FROM albums";
if($result = $mysqli->query($sql)){
    $rowsCount = $result->num_rows; // количество полученных строк
    
    echo "<table class='table table-success table-striped'><tr><th>Id</th><th>Название</th><th>Описание</th><th>Подробнее</th><th>Удалить</th></tr>";
    
    foreach($result as $row){
        $albumId = $row["Id"];
        echo "<tr>";
            echo "<td>" . $row["Id"] . "</td>";
            echo "<td>" . $row["AlbumName"] . "</td>";
            echo "<td>" . $row["AlbumDescription"] . "</td>";
            //echo "<td><a href='./DetailAlbumPage.php?Id=$albumId'>Detail</a></td>";
          
            echo "<td><a href='./album.php?Id=$albumId'>Подробнее</a></td>";
            ?>
            <td>
            <form action="/albumDelete.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $row["Id"] ?>">
            <button type="submit" class="close-icon btn btn-danger"><i class="glyphicon glyphicon-remove">Удалить</i></button>
            </form>
            </td><?
        echo "</tr>";
    }
    echo "</table>";
    $result->free();
} else{
    echo "Ошибка: " . $conn->error;
}

?>
  </body>
</html>
