<article id="ongletMenu">
	<!-- Popup de confirmation de la commande -->
	<div id="popup" class="hide">
		<form method="post" action="coupon.php">
			<span>
				<h3>Titre</h3>
				<p>Prix</p>
				<img src="" name="Image du plat"/>
			</span>
			<input type="text" name="plat" class="hidden" />
			<h3>Nom</h3>
			<input  autocomplete="off" type="text" placeholder="Durand" name="nom"/>
			<h3>Prénom</h3>
			<input autocomplete="off" type="text" placeholder="Jean" name="prenom"/>
			<button>Commander</button>
		</form>
	</div>

	<nav>
		<ul class="regime">
			<li data-search="all" class="highlight">
				<svg viewBox="0 0 380.721 380.721">
					<use xlink:href="#IMG_TRAY"></use>
				</svg>
				<p>Totalité</p>
			<li data-search="vegetarien">
				<svg viewBox="0 0 937.816 937.815">
						<use xlink:href="#IMG_VEGETARIAN"></use>
					</svg>
				<p>Végétarien</p>
			</li>
		</ul>
	</nav>
	<ul>
		<?php 
			// class vegan = .plat.vegetarien
			$platsAdresse = "images/plats/";
			$plats = $bdd->query('SELECT * FROM plat ORDER BY nom');
			while($plat = $plats->fetch()){
			?>
				<ol class="plat <?php
					if($plat['vegetarien']){
						echo "vegetarien";
					}
				?>">
					<li class="platPresentation">
						<div class="header">
							<button class="showRecipe topButton">
								<img src="images/icones/recette.svg"/>
							</button>
							<img src="<?php echo $platsAdresse.$plat['photo']; ?>" name="Image de plat"/>
							<h3><?php echo $plat['nom']; ?></h3>
						</div>
						<p><?php echo $plat['description']; ?></p>
					</li>
					<li class="platRecette hide">
						<button class="closeRecipe topButton">
							<img src="images/icones/close.svg"/>
						</button>
						<h3>Composition</h3>
						<ol>
							<?php
								$requeteIngredient = 'SELECT ingredient.nom FROM ingredient, possede WHERE possede.id_ingredient = ingredient.id_ingredient AND possede.id_plat = '.$plat['id_plat'];
								$ingredients = $bdd->query($requeteIngredient);
								while($ingredient = $ingredients->fetch()){
								?>
									<li><?php echo $ingredient['nom']; ?></li>
								<?php
								}
							?>
						</ol>
					</li>
					<div class="platActions">
						<?php
							$prixRequete = 'SELECT prix.prix FROM prix, plat WHERE plat.id_prix = prix.id_prix AND plat.id_plat = '.$plat['id_plat'].' HAVING COUNT(prix) = 1';
							$prix = $bdd->query($prixRequete);
						?>
						<p><?php echo $prix->fetch()['prix']; ?></p>
						<button class="popsup">Commander</button>
					</div>
				</ol>
		<?php
			}
		?>

	</ul>
</article>