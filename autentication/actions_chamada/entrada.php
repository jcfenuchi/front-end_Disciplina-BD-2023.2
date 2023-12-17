<?php
include "./../bd_connect.php";
$container_num = (int)substr($_SESSION["container"], -2);
$ip = $_SERVER['REMOTE_ADDR'
$result = $bd->query("call processachamada($container_num,1,$ip)");
$row = $result->fetch_assoc();
header("Location: ./../../chamada.php");
?>