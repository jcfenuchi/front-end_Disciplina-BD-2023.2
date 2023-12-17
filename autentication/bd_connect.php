<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$bd = new mysqli("192.168.102.185", "front-end", "123", "mydb");
if ($bd->connect_errno)
{
	die("Falha ao conectar ao MySQL: (" . $bd->connect_errno . ") " . $bd->connect_error);
}
?>