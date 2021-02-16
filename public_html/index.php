<?php
$path = $_SERVER['REQUEST_URI'];
$path = explode("?", $path)[0];

if($path == '/')
$path = '/index';

if(@end(explode(".", $path)) == $path)
    $path = $path.'.php';
        
if(file_exists("..$path"))
    include("..$path");
else
    include("../view/404.html");
?>