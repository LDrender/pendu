<?php
include("queryCreateCustom.php");
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
	
		<!-- Main -->
			<section id="main">
				<div class="inner">

				<!-- One -->

					<section id="one" class="wrapper">
						<div class="">
							<center>
							
								<h3 class="top_add">Create Party</h3>
							</center>
						</div>
						<div class="spotlight alt">
							<div class="inner text_right">
								<br/>
								<p>Regle pour les mots :
								<br/> - Ne pas mettre d'espace
								<br/> - Ne pas mettre de caractère spécieux "@ è é à + / * ..."
								<br/> - Caractère spécial accepté " - "</p>
								<p>Regle pour les num° partie :
								<br/> - Min 4 chiffre
								<br/> - Max 4 chiffre</p>
								<br/>
							</div>
							<div  class="inner left-text">
							
								<form method="post" action="">
									<div class="row uniform">
										<div class="12u 12u$(small)">
											<input type="text" name="num_party" id="num_party" value="" placeholder="Num° Partie" maxlength="4" required /><br/>
											<input type="text" name="search_party" id="search_party" value="" placeholder="Mot à trouver" required />
										</div>
										<div class="12u$ 12u$(small)">
											<input type="submit" name="create_party" value="Créer Partie" class="fit" />
										</div>
										<div class="12u$ 12u$(small)">
											<input type="checkbox" id="copy" name="copy" >
											<label for="copy"><a class="white">Ajouter se mot à la base de connaissance</a></label>
										</div>
								</form>
										<div class="12u$ 12u$(small)">
											<p><?php echo $msg ; ?></p>
										</div>
									</div>
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