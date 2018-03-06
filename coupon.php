<!DOCTYPE html>
<html>
	<head>
		<!-- CSS files -->
		<link rel="stylesheet" href="styles/commun.css" type="text/css"/>
		<link rel="stylesheet" href="styles/coupon.css" type="text/css"/>
		
		<link rel="shortcut icon" href="images/logo/favicon.png">

		<!-- JS files -->
		<script type="text/javascript" src="scripts/coupon.js"></script>
		<title>Coupon commande</title>
		<meta charset="utf-8">
	</head>
	<body>
		<?php
			// Connexion à la BDD
			include('includes/connexionBDD.php');

			$plat = $_POST['plat'];
			$nom = $_POST['nom'];
			$prenom = $_POST['prenom'];

			$redirection = 'Location:index.php';

			if(isset($plat) && isset($nom) && isset($prenom)){
				$plat = htmlspecialchars($plat);
				$nom = htmlspecialchars($nom);
				$prenom = htmlspecialchars($prenom);
				// Le nom et le prénom doivent être supérieurs à deux
				if(strlen($nom) < 2 || strlen($prenom) < 2){
					header($redirection);
				}
				// insertion dans la bdd
				$nbcommande = $bdd -> query("SELECT COUNT(id_commande) FROM commande");
				$nbcommande = $nbcommande -> fetch();
				$id_plat = $bdd -> query("SELECT id_plat FROM plat WHERE nom = '".$plat."'");
				$id_plat = $id_plat -> fetch();

				$id_plat_str = strval($id_plat[0]);

				$derniere = $bdd -> query("SELECT * FROM commande ORDER BY id_commande DESC LIMIT 1");
				$derniere = $derniere -> fetch();

				if ($nom == $derniere['nom'] && $prenom == $derniere['prenom'] && $id_plat_str == $derniere['id_plat']){
					header($redirection);
				}
				
				do{
					$numero = rand(1000, 2000);
					$unique = $bdd -> query("SELECT numero FROM commande WHERE numero = '".$numero."' ");
					$unique = $unique -> fetch();
				} while ( $unique != NULL );
				
				if($nbcommande[0] <= 150 ){
					$insertion = $bdd -> query("INSERT INTO commande VALUES (NULL, '".$nom."', '".$prenom."', '".$numero."', '".$id_plat[0]."')");
				}else{
					header($redirection);
				}
			}else{
				header($redirection);
			}

			// Permet d'avoir avec certitude le jour d'après.
			$demain = new DateTime('now+1day');
		?>
		<svg version="1.0" style="display: none;">
			<defs>
				<g id="IMG_DONE">
					<path d="M0 0h24v24H0z" fill="none"/>
					<path d="M9 16.2L4.8 12l-1.4 1.4L9 19 21 7l-1.4-1.4L9 16.2z"/>
				</g>
			</defs>
		</svg>
		<div id="conteneur">
			<div class="information">
				<svg viewBox="0 0 24 24">
		   			<use xlink:href="#IMG_DONE"></use>
		  		</svg>
		  		<p>Plat réservé</p>
			</div>
			<div id="coupon">
				<header>
					<ul>
						<li><?php echo strtoupper($nom)." ".ucfirst(strtolower($prenom)) ?></li>
						<li><?php echo $plat ?></li>
					</ul>
				</header>
				<ol>
					<li>
						<h2>Numéro</h2>
						<p><?php echo $numero ?></p>
					</li>
					<li>
						<h2>Date récupération</h2>
						<p><?php echo $demain->format('d/m/Y'); ?></p>
					</li>
				</ol>
			</div>
			
			<p id="print">Imprimer votre coupon</p>
		</div>
	</body>
</html>