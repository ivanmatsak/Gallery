<!DOCTYPE html>
<html>
<head>
    <title>Альбом</title>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
   
    <script src="https://use.fontawesome.com/fe459689b4.js"></script>
    <style type="text/css">
    .gallery
    {
        display: inline-block;
        margin-top: 20px;
    }
    body{
    margin: 40px;
    }

    button{
    cursor: pointer;
    outline: 0;
    color: #AAA;

    }

    .btn:focus {
    outline: none;
    }


    .close-icon{
        border-radius: 50%;
        position: absolute;
        right: 5px;
        top: -10px;
        padding: 5px 8px;
    }
        .form-image-upload{
            background: #e8e8e8 none repeat scroll 0 0;
            padding: 15px;
        }
    </style>
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
                <div class='col-sm-4 col-xs-6 col-md-3 col-lg-3' class="simple__card">
                    <a class="thumbnail fancybox" rel="ligthbox" href="/uploads/<?php echo $image['image'] ?>">
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


                    
                    <button class="btn" id="green"><i class="fa fa-thumbs-up fa-lg" aria-hidden="true"></i></button>
                    <button class="btn child" id="red"><i class="fa fa-thumbs-down fa-lg" aria-hidden="true"></i></button>
                    

                    

                    <?php 
                    foreach($comments as $comment){
                        if($comment['galleryId']===$image['id']){


                        
                        ?>
                        <figcaption> <?php echo $comment['comment'];?></figcaption>
                    <?}}?>
                    
                    <form action="/commentUpload.php" method="POST">
                    <div class="row">
                        <div class="col-md-5">
                            <strong>Комментарий:</strong>
                            <input type="text" name="comment" class="form-control" placeholder="Комментарий">
                            <input type="hidden" name="commentId" id="hiddenField" value="<?php echo $image['id'] ?>" />
                            <input type="hidden" name="albumId" value="<?php echo $_GET["Id"] ?>">
                        </div>
                        
                        <div class="col-md-2">
                            <br/>
                            <button type="submit" class="btn btn-success">Отправить</button>
                        </div>
                    </div>
                    </form>

                    


                </div> 

                
            <?php }} ?>


        </div> 
    </div> 
</div> 


</body>



<script type="text/javascript">
        $(document).ready(function(){
            $(".fancybox").fancybox({
                openEffect: "none",
                closeEffect: "none"
            });
        });
        var btn1 = document.querySelector('#green');
    var btn2 = document.querySelector('#red');

    btn1.addEventListener('click', function() {
    
        if (btn2.classList.contains('red')) {
        btn2.classList.remove('red');
        } 
    this.classList.toggle('green');
    
    });

    btn2.addEventListener('click', function() {
    
        if (btn1.classList.contains('green')) {
        btn1.classList.remove('green');
        } 
    this.classList.toggle('red');
    
    });
                    
</script>
</html>
