<?php
session_start();
include("queryBDD.php");
$endGame = $_SESSION["endgame"];
	
if(isset($_POST["share"])){
	
	$user_party = $_POST["user_share"];
	$error = $endGame["attempt"]." - 8";
	$time_party = 0;
	
	
	try
	{
		$add_party = "INSERT INTO share (num_game, user, search, time, stat, error) VALUES ('".$endGame['numGame']."', '$user_party', '".$endGame['word']."', '$time_party', '".$endGame['state']."', '$error')";
		$query = $bdd->exec($add_party);
		
		$query_del = "DELETE FROM game WHERE numGame='".$endGame['numGame']."'";
		$query2 = $bdd->exec($query_del);
			
		session_destroy();
		header("location: ./ ");
	}
	
	catch (Exception $e)
	{
			$msg = die('Erreur : ' . $e->getMessage());
	}
}
?>