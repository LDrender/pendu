<?php


try
{
	$bdd = new PDO('mysql:host=localhost;dbname=stac;charset=utf8', 'login', 'mot_de_passe', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
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
