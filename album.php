<!DOCTYPE html>
<html>
<head>
    <title>Альбом</title>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
   
    <script src="https://use.fontawesome.com/fe459689b4.js"></script>
    
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>


<div class="container">


    <h3>Альбом. <a href="http://localhost/">Назад</a> </h3>
    <form action="/imageUpload.php" class="form-image-upload" method="POST" enctype="multipart/form-data">


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
                <strong>Изображение:</strong>
                <input type="file" name="image" class="form-control">
                <input type="hidden" name="albumId" value="<?php echo $_GET["Id"] ?>">
            </div>
            
            <div class="col-md-2">
                <br/>
                <button type="submit" class="btn btn-success">Добавить</button>
            </div>
        </div>


    </form> 
    <br>

    <div class="row">
    <div class='list-group gallery'>


            <?php
            require('db_config.php');


            $sql = "SELECT * FROM image_gallery";
            $images = $mysqli->query($sql);

            $commentsSql="SELECT * FROM image_comments";
            $comments = $mysqli->query($commentsSql);

            while($image = $images->fetch_assoc()){

                if($_GET["Id"]===$image['AlbumId']){


                
            ?>
                <div class='col-sm-4 col-xs-6 col-md-3 col-lg-3' >
                    
                    <a class="thumbnail fancybox item" rel="ligthbox" href="/uploads/<?php echo $image['image'] ?>">
                        <img class="img-responsive" alt="" src="/uploads/<?php echo $image['image'] ?>" />
                        <div class='text-center'>
                            <small class='text-muted'><?php echo $image['title'] ?></small>
                        </div>
                    </a>
                    
                    <form action="/imageDelete.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $image['id'] ?>">
                    <input type="hidden" name="albumId" value="<?php echo $_GET["Id"] ?>">
                    <button type="submit" class="close-icon btn btn-danger"><i class="glyphicon glyphicon-remove"></i></button>
                    </form>

                    <?php
                    $likes = $image['likes'];
                    $dislikes = $image['dislikes'];
                    ?>
             
                    <button class="btn" id="green"><i class="fa fa-thumbs-up fa-lg like" aria-hidden="true" id="<?=$image['id']?>" data-id="<?=$image['id']?>"><?=$likes?></i></button>
                    <button class="btn child" id="red"><i class="fa fa-thumbs-down fa-lg dislike" aria-hidden="true" id="dislike_<?=$image['id']?>" data-id="<?=$image['id']?>"><?=$dislikes?></i></button>
                    
                    <?php 
                    foreach($comments as $comment){
                        if($comment['galleryId']===$image['id']){

                        ?>
                        <figcaption> <?php echo $comment['comment'];?></figcaption>
                    <?}}?>
                    
                    <form action="/commentUpload.php" method="POST">
                    <div class="row">
                        <div class="col-lg-7">
                            <strong>Комментарий:</strong>
                            <input type="text" name="comment" class="form-control" placeholder="Комментарий">
                            <input type="hidden" name="commentId" id="hiddenField" value="<?php echo $image['id'] ?>" />
                            <input type="hidden" name="albumId" value="<?php echo $_GET["Id"] ?>">
                        </div>
                        
                        <div class="col-md-2">
                            <br/>
                            <button type="submit" class="btn btn-success comment-btn">Отправить</button>
                        </div>
                    </div>
                    </form>

                </div> 

            <?php }} ?>

        </div> 
    </div> 
</div> 


</body>

<script type="text/javascript" src="js/jquery.js"></script>
<script src="/js/scripts.js"></script>
</html>
