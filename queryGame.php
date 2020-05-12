<?php

require 'classGame.php';
include("queryBDD.php");
	
$party = new Party($bdd, $_SESSION["numgame"]);

$numgame = $_SESSION["numgame"];
$wordHidden = $party->wordHidden();
$attemptImage = $party->attemptImage();


echo $party->letterUsed();

if(isset($_GET["letter"]))
{
	$gameChange = $party->checkLetter($_GET["letter"]);
	$wordHidden = $gameChange["wordHidden"] ;
	$attemptImage = $gameChange["attemptImage"] ;
}
if(isset($_POST["search_word"]))
{
	$gameChange = $party->checkWord($_POST["scribe_word"]);
	$wordHidden = $gameChange["wordHidden"] ;
	$attemptImage = $gameChange["attemptImage"] ;
}

$keyboardDisplay = $party->keyboardDisplay();
?>