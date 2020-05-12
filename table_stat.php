<?php

include("queryBDD.php");

$query1 = $bdd->query("
		SELECT
			id,
			num_game,
			user,
			search,
			time,
			stat,
			error
		FROM
			share
		ORDER BY
			id
		DESC
			");

while ($row = $query1->fetch()){
	$ligne = "

		<tr>
			<td>".$row['num_game']."</td>
			<td>".$row['user']."</td>
			<td>".$row['search']."</td>
			<td>".$row['stat']."</td>
			<td>".$row['error']."</td>
			<td>".$row['time']."</td>
		</tr>
		";

		$tableList[] = $ligne;
}
if(isset($tableList)){
	$tableFile = implode($tableList);
}
else{
	$tableFile = "
		<tr>
		</tr>
		";
}

$query1->closeCursor();

?>
