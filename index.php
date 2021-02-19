<?php

spl_autoload_register(function ($name) {
    include_once("model/$name.php");
});
session_start();
date_default_timezone_set('America/Sao_Paulo');
const nome = 'Lojinha Top';
const subp = '/trabalhophpds4';


//DB::setConnection('localhost', 'id16136785_trabalho', 'DanielEduarda2021!', 'id16136785_trabalhophpds4');

$path = $_SERVER['REQUEST_URI'];
$path = explode("?", $path)[0];

$path = str_replace ( subp , '' , $path);

if($path == '/')
$path = '/index';

if(@end(explode(".", $path)) == $path)
    $path = $path.'.php';
        
if(file_exists("control/$path"))
    include_once("control/$path");
else
    include_once("control/404.php");
?>
