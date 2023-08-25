<?php

session_start();

define ('DB_USER', "root");
define ('DB_PASSWORD', "1234");
define ('DB_DATABASE', "AlbumDb");
define ('DB_HOST', "localhost");

define ('SERVER', "http://localhost");
$_SESSION['like_is_set']=0;
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
?>