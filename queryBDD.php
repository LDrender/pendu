<?php


try
{
	$bdd = new PDO('mysql:host=localhost;dbname=stac_V2;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

if(!isset($_SESSION))
  {
		session_start(); 
  }

?>
