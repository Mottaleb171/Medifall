<?php 

$host ='localhost';
$user ='root';
$pass ='';
$dbname='medifall';
$port =3306;

$conn=new mysqli($host,$user,$pass,$dbname,$port);
if ($conn->connect_error) {
	// code...
	die("Connection error");
}
?>