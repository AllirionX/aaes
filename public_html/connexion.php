<?php
require "config.php";
try
{
	$bdd = new PDO('mysql:host='.$host.';dbname='.$dbname, $login, $password);
	$bdd->exec("SET NAMES 'UTF8'");
	
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
?>