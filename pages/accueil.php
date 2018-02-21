<article class="shown" id="ongletAccueil">
	<div class="carrouselConteneur">
		<h1>Choisissez, commandez, savourez</h1>
		<div class="caroussel">
	        <span><img src="images/accueil/caroussel1.jpg"/></span>
	        <span><img src="images/accueil/caroussel2.jpg"/></span>
	        <span><img src="images/accueil/caroussel3.jpg"/></span>
    	</div>
    </div>
    <script type="text/javascript">
        $('.caroussel').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 5000,
            infinite: true,
            speed: 500,
            fade: true,
            prevArrow: false,
			nextArrow: false,
            cssEase: 'linear'
        });
    </script>

    <article>
        <h1>Ce que nous proposons</h1>
        <ul>
            <li>
            	<span>
            		<img src="images/accueil/simple.jpg" alt="Gaufres"/>
               		<h3>Simple</h3>
            	</span>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vitae convallis lacus. Fusce pellentesque iaculis luctus. Integer tincidunt purus vitae elementum tempor. Vivamus ultricies nunc hendrerit odio consectetur, lobortis ornare nunc convallis.</p>
            </li>
            <li>
            	<span>
               		<img src="images/accueil/comme_a_la_maison.jpg" alt="Chips"/>
                	<h3>Comme à la maison</h3>
                </span>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vitae convallis lacus. Fusce pellentesque iaculis luctus. Integer tincidunt purus vitae elementum tempor. Vivamus ultricies nunc hendrerit odio consectetur, lobortis ornare nunc convallis.</p>
            </li>
            <li>
            	<span>
					<img src="images/accueil/bonne_franquette.jpg" alt="Viande"/>
               		<h3>A la bonne franquette</h3>
               	</span>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vitae convallis lacus. Fusce pellentesque iaculis luctus. Integer tincidunt purus vitae elementum tempor. Vivamus ultricies nunc hendrerit odio consectetur, lobortis ornare nunc convallis. </p>
            </li>
        </ul>
    </article>
</article>