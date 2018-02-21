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
		<ol class="plat">
			<li class="platPresentation">
				<div class="header">
					<button class="showRecipe topButton">
						<img src="images/icones/recette.svg"/>
					</button>
					<img src="images/plats/sandwitch.jpg" name="Image de plat"/>
					<h3>Sandwich maison</h3>
				</div>
				<p>Lorem ipsum tempor officia consectetur minim officia nulla minim dolore in labore ullamco ut consequat eu cillum.</p>
			</li>
			<li class="platRecette hide">
				<button class="closeRecipe topButton">
					<img src="images/icones/close.svg"/>
				</button>
				<h3>Composition</h3>
				<ol>
					<li>Pain</li>
					<li>Beurre</li>
					<li>Jambon</li>
					<li>Salade</li>
					<li>Mayonnaise</li>
					<li>Sauce burger</li>
				</ol>
			</li>
			<div class="platActions">
				<p>2.5</p>
				<button class="popsup">Commander</button>
			</div>
		</ol>

		<ol class="plat vegetarien">
			<li class="platPresentation">
				<div class="header">
					<button class="showRecipe topButton">
						<img src="images/icones/recette.svg"/>
					</button>
					<img src="images/plats/bolognaise.jpg" name="Image de plat"/>
					<h3>Bolognaises veganes</h3>
				</div>
				<p>Lorem ipsum tempor officia consectetur minim officia nulla minim dolore in labore ullamco ut consequat eu cillum.</p>
			</li>
			<li class="platRecette hide">
				<button class="closeRecipe topButton">
					<img src="images/icones/close.svg"/>
				</button>
				<h3>Composition</h3>
				<ol>
					<li>Salade</li>
					<li>Racine</li>
					<li>Radis</li>
					<li>Herbe</li>
				</ol>
			</li>
			<div class="platActions">
				<p>2.5</p>
				<button class="popsup">Commander</button>
			</div>
		</ol>

	</ul>
</article>