<?php
include("queryEndGame.php");
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
				<div class="logo"><a href="">Partie<span><?php echo $endGame["numGame"]; ?></span></a></div>
			</header>

		<!-- Main -->
			<section id="main">
				<div class="inner">

				<!-- One -->

					<section id="one" class="wrapper">
						<div class="">
							<center>
								<h3 class="top_add"><?php echo $endGame["title"]; ?></h3>
							</center>
						</div>
						<div class="spotlight alt">
							<div class="image flush"><img src="images/<?php echo $endGame["image"]; ?>" alt="" /></div>
							<div  class="inner left-text">
							
							<p>Vous avez <?php echo $endGame["text"]; ?>, en trouvant le mot : " <?php echo $endGame["word"]; ?> "</p>
							<!-- <p>Durée de la partie : " '.$time_party .'s "</p> -->
							<p>Nombre d'erreur : " <?php echo $endGame["attempt"]; ?>/8 "</p>
							
							
								<form method="post" action="">
									<div class="row uniform">
										<div class="12u 12u$(small)">
											<input type="text" name="user_share" value="" placeholder="Pseudo" />
										</div>
										<div class="12u$ 12u$(small)">
											<input type="submit" name="share" value="Partager Score" class="fit" />
										</div>
									</div>
								</form>
							</div>
						</div>
					</section>

				</div>
			</section>


			<center>
				<form method="post" action="./leave">
					<input class="special" type="submit" value="Quitter" />
				</form>
			</center>
			
	<!-- Scripts -->
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/jquery.poptrox.min.js"></script>
		<script src="assets/js/skel.min.js"></script>
		<script src="assets/js/util.js"></script>
		<script src="assets/js/main.js"></script>

	</body>
</html>