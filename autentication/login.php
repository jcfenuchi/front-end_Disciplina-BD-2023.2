<?php
Session_start();
if( $_SESSION["autenticado"]=1)
	header("Location: ./../main.php");

if (isset($_POST['login']) and isset($_POST['senha']))
{
	$login=$_POST['login'];
	$senha=$_POST['senha'];
}
else
	die('Erro na passagem de par&acirc;metros');

include "bd_connect.php";

$result = $bd->query("SELECT * from Usuarios where login='$login' and senha='$senha'");
if ($bd->errno)
{
	die("Erro na execucao do SQL: $sql ($bd->errno) $bd->error");
};

if ($line =  $result->fetch_assoc())
{
	$_SESSION["autenticado"]=1;
	$_SESSION["container"]=$login;
	header("Location: ./../main.php");
}
else
{
	$_SESSION["autenticado"]=0;
	header("Location: ./../index.php");
}
?>


