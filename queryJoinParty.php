<?php

include("queryBDD.php");
require 'classCreateRandom.php';
$msg = "";

if(isset($_POST["game_random"])){
	$party = new CreateGame($bdd);
	$randomParty = $party->createParty();

	$_SESSION["numgame"] = $randomParty;
	header("location: ./game");
}

if(isset($_POST["game"]))
{
	$codeGame = $_POST["code_game"];
	$checkParty = $bdd->query("SELECT COUNT(numGame) FROM game WHERE numGame = '$codeGame'");
	$rowCheckParty = $checkParty->fetch();

	if($rowCheckParty >= 1)
	{
		$_SESSION["numgame"] = $codeGame;
		header("location: ./game");
	}
	else
	{
		$msg = "La partie est introuvable";
	}

}

?>
