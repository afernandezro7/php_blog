<?php
$servidor="localhost";
$usuario="root";
$password="root";
$basededatos="blog";
$db=mysqli_connect($servidor,$usuario,$password,$basededatos);

mysqli_query($db, "SET NAMES 'utf8'");

//Crear session
if(!isset($_SESSION)){
    session_start();
}
























