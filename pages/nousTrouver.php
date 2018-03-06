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
        		<div data-latitude="48.046807" data-longitude="-1.740896" class="map"></div>
        		<div data-latitude="48.085075" data-longitude="-1.691362" class="map"></div>
        		<div data-latitude="48.121466" data-longitude="-1.704052" class="map"></div>
        		<div data-latitude="48.115891" data-longitude="-1.637143" class="map"></div>
        		<div data-latitude="48.125957" data-longitude="-1.623550" class="map"></div>
        		<div data-latitude="48.125924" data-longitude="-1.650284" class="map"></div>
            </div>
        </div>
        <div id="showEvents">
			<svg viewBox="0 0 24 24">
				<use xlink:href="#IMG_EVENT"></use>
			</svg>
        </div>
    </div>
</article>