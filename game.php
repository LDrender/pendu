<?php
include("queryGame.php");
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
				<div class="logo"><a href="">Partie<span><?php echo $numgame; ?></span></a></div>
			</header>

		<!-- Main -->
			<section id="main">
				<div class="inner">

				<!-- One -->

					<section id="one" class="wrapper">
						<div class="">
							<center>
								<h3 class="top_add"><?php echo $wordHidden; ?></h3>
							</center>
						</div>
						<div class="spotlight alt">
							<div class="image flush"><img src="./images/<?php echo $attemptImage; ?>.png" alt="" /></div>
							<div  class="inner">
							
								<form method="post" action="">
									<div class="row uniform">
										<div class="9u 12u$(small)">
											<input type="text" name="scribe_word" id="scribe_word" value="" placeholder="Proposer un mot" />
										</div>
										<div class="3u$ 12u$(small)">
											<label for="vraibouton" ><a class="button special icon fa-search"></a></label>
											<input id="vraibouton" type="submit" name="search_word" value="" class="invisibility" />
										</div>
									</div>
								</form>
								
								<form method="get" action="">
									<?php echo $keyboardDisplay; ?>
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