<!DOCTYPE html>
<html>
	<head>
		<!-- CSS files -->
		<link rel="stylesheet" href="styles/commun.css" type="text/css"/>
		<link rel="stylesheet" href="styles/coupon.css" type="text/css"/>
		
		<!-- JS files -->
		<script type="text/javascript" src="scripts/coupon.js"></script>
		<title>Coupon commande</title>
		<meta charset="utf-8">
	</head>
	<body>
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
						<li>NOM prénom</li>
						<li>Nom du plat</li>
					</ul>
				</header>
				<ol>
					<li>
						<h2>Numéro</h2>
						<p>123</p>	
					</li>
					<li>
						<h2>Date récupération</h2>
						<p>20/12/18</p>
					</li>
				</ol>
			</div>
			
			<p id="print">Imprimer votre coupon</p>
		</div>
	</body>
</html>