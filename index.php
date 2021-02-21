<?php

spl_autoload_register(function ($name) {
    include_once("model/$name.php");
});

function path()
{
	$path = $_SERVER['REQUEST_URI'];
	$path = explode("?", $path)[0];

	$path = str_replace ( root() , '' , $path);

	if($path == '')
	$path = 'index';

	if(@end(explode(".", $path)) == $path)
		$path = $path.'.php';
	
	if(file_exists("control/$path"))
		return "control/$path";
	
	return "control/404.php";
}

function root($path='')
{
	if($_SERVER['HTTP_HOST']!='localhost')
		return "/$path";
	
	return $GLOBALS['ROOT']."/$path";
}

function email($to, $subject, $message, $from)
{
	mail($to, $subject, $message, "From: ");
}


session_start();

date_default_timezone_set('America/Sao_Paulo');

$GLOBALS['APP_NAME'] = 'Cantina Virtual';
$GLOBALS['PATH_INFO'] = pathinfo($_SERVER['SCRIPT_FILENAME']);
$GLOBALS['ROOT'] = str_replace ( '/'.$GLOBALS['PATH_INFO']['basename'] , '' , $_SERVER['SCRIPT_NAME']);

//Caminho real da pasta
//$diretorio = $GLOBALS['PATH_INFO']['dirname'];

//Conexão com o banco do 000
//DB::setConnection('localhost', 'id16136785_trabalho', 'DanielEduarda2021!', 'id16136785_trabalhophpds4');
include_once(path());


?>
