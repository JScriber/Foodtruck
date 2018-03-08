<article id="ongletNousTrouver">
	<div id="eventPopup" class="hidden">
		<div>
			<h1>Présence aux évènements</h1>
   			<ul>
            <?php 
                $evenements = $bdd->query('SELECT * FROM evenement ORDER BY nom');
                while($evenement = $evenements->fetch()){
            ?>
       			<a href=" <?php echo $evenement['lien']; ?> " target="_blank"> <?php echo $evenement['nom']; ?> </a>
            <?php } ?>
            </ul>
        </div>
    </div>
	<div class="content">
        <ul id="joursSemaine">
            <li class="highlight">Lundi</li>
            <li>Mardi</li>
            <li>Mercredi</li>
            <li>Jeudi</li>
            <li>Vendredi</li>
            <li>Samedi</li>
        </ul>
        <div class="allMap">
           <div class="slider">
                <ul>
                    <li>
						<h2>Campus de Kerlann</h2>
						<p>Rue Pierre de Maupertuis, 35170 Bruz</p>
                    </li>
                    <li data-latitude="48.046807" data-longitude="-1.740896" class="map"></li>
                </ul>
                <ul>
                    <li>
						<h2>Lycée Bréquigny</h2>
						<p>7 Avenue Georges Graff, 35200 Rennes</p>
					</li>
        			<li data-latitude="48.085075" data-longitude="-1.691362" class="map"></li>
        		</ul>
        		<ul>
					<li>
						<h2>Université Rennes 2</h2>
						<p>Place du Recteur Henri Le Moal, 35700 Rennes</p>
					</li>
        			<li data-latitude="48.121466" data-longitude="-1.704052" class="map"></li>
        		</ul>
        		<ul>
        			<li>
						<h2>Campus Beaulieu</h2>
						<p>Allée Henri Poincaré, 35700 Rennes</p>
					</li>
        			<li data-latitude="48.115891" data-longitude="-1.637143" class="map"></li>
        		</ul>
        		<ul>
        			<li>
						<h2>Supélec</h2>
						<p>Avenue de la Boulaie, 35510 Cesson-Sévigné</p>
					</li>
        			<li data-latitude="48.125957" data-longitude="-1.623550" class="map"></li>
        		</ul>
        		<ul>
        			<li>
						<h2>Lycée Chateaubriand</h2>
						<p>136 Boulevard de Vitré, 35700 Rennes</p>
					</li>
        			<li data-latitude="48.125924" data-longitude="-1.650284" class="map"></li>
        		</ul>
            </div>
        </div>
        <div id="showEvents">
			<svg viewBox="0 0 24 24">
				<use xlink:href="#IMG_EVENT"></use>
			</svg>
        </div>
    </div>
</article>