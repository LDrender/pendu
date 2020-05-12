<?php

include("queryBDD.php");
require 'classCreateCustom.php';
$msg = "";

if(isset($_POST["create_party"])){
	$numParty = $_POST["num_party"];
	$wordSearch = $_POST["search_party"];
	
	$party = new CreateGame($bdd, $numParty, $wordSearch);
	$temp = $party->createParty();
	$msg = $temp;
}


?>