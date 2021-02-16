<?php
include_once('../tools/DB.php');
DB::setConnection('localhost', 'id16136785_trabalho', 'DanielEduarda2021!', 'id16136785_trabalhophpds4');


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