<?php

$host="localhost";
$user="root";
$password="root1234";
$db="db_webserv";

$kon = mysqli_connect($host,$user,$password,$db);
if (!$kon){
	
	echo"Database  MYSQL <b>gagal</b> dikoneksikan<br>";
}




?>