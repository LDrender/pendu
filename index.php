<?php 
	include("queryJoinParty.php");
	include("table_stat.php");
 ?>

<!DOCTYPE HTML>

<html>
	<head>
		<title>Stac | by LD</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body>
	
	
	<!-- Header -->
	<header id="header">
		<div class="logo"><a href="">PENDU</span></a></div>
	</header>
	
			
		<!-- Main -->
			<section id="main">
				<div class="inner">

				<!-- One -->

					<section id="one" class="wrapper">
						<div class="spotlight alt">
							<div class="inner zero_padding">
								<div class="table-wrapper size_table">
									<table>
										<thead>
											<tr>
												<th>Num Game</th>
												<th>Player</th>
												<th>Word</th>
												<th>Stat</th>
												<th>Error</th>
												<th>Time</th>
											</tr>
										</thead>
										<tbody>
											<?php echo $tableFile ; ?>
										</tbody>
										<tfoot>
										
										</tfoot>
									</table>
								</div>
							</div>
							<div  class="inner left-text">
								<form method="post" action="">
									<div class="row uniform">
										<div class="9u 12u$(small)">
											<input type="text" name="code_game" value="" Placeholder="Num Party"/>
										</div>
										<div class="3u$ 12u$(small)">
											<input type="submit" name="game" value="Join Game" />
										</div>
									</div>
								</form>
								<form method="post" action="">
									<input class="fit" type="submit" name="game_random" value="Join Game Random" />
								</form>
								<form method="post" action="create">
									<input class="fit" type="submit" name="create" value="Create Party" />
								</form>
								<p><?php echo $msg ; ?></p>
							</div>
						</div>
					</section>

				</div>
			</section>
	

	<!-- Scripts -->
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/jquery.poptrox.min.js"></script>
		<script src="assets/js/skel.min.js"></script>
		<script src="assets/js/util.js"></script>
		<script src="assets/js/main.js"></script>

	</body>
</html>