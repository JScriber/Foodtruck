window.addEventListener('load', function(){
	// A supprimer plus tard
	var plat = document.querySelector('.plat'),
	copie;
	for(var i = 0; i < 10; i++) {
		copie = plat.cloneNode(true);
		plat.parentNode.appendChild(copie);
	}

	// Ajustement du carrousel
	var changeSize = function(){
		var carousselConteneur = document.querySelector('.carrouselConteneur'),
		header = document.querySelector('header');

		var headerHeight = header.getBoundingClientRect().height;
		var newHeight = window.innerHeight - headerHeight+"px";

		carousselConteneur.style.height = newHeight;
	}
	changeSize();
	window.addEventListener('resize', changeSize);

	// Changement d'article (de morceau de page)
	var liens = document.querySelector('header ul');
	liens.addEventListener('click', function(e){
		var target = e.target;
		// S'assurce que l'élement cliqué récupéré est un LI
		// Ceci est important pour récupérer le data-link
		while(target.tagName != "LI"){
			target = target.parentNode;
		}
		// Récupération de l'article à afficher
		var article = target.getAttribute('data-link');
		var articleDom = document.getElementById(article);
		// Si l'article existe on l'affiche
		if(articleDom){
			var i;

			// On cache tous les articles
			var articlesDom = document.querySelectorAll('section > article');
			var nombreArticles = articlesDom.length; // Bonne pratique
			for(i = 0; i < nombreArticles; i++){
				articlesDom[i].classList.remove('shown');
			}
			// On affiche le concerné
			articleDom.classList.add('shown');

			// Modification du menu sur le même principe que les articles
			var toutLiens = e.currentTarget.querySelectorAll('li');
			var nombreLiens = toutLiens.length;
			for(i = 0; i < nombreLiens; i++){
				toutLiens[i].classList.remove('highlight');
			}
			target.classList.add('highlight');

			// Retour en haut de page
			window.scrollTo(0, 0);
		}
	});

	// Navigation dans les cartes du Menu
	var appelsRecette = document.querySelectorAll('.showRecipe');
	var nombreAppels = appelsRecette.length;

	for(var i = 0; i < nombreAppels; i++){
		appelsRecette[i].addEventListener('click', function(e){
			// On cache avant tout les autres recettes
			var autresRecettes = document.querySelectorAll('.platRecette');
			for(var j = 0; j < autresRecettes.length; j++){
				var hideClass = "hide";
				if(autresRecettes[j].getAttribute('class') == "platRecette"){
					autresRecettes[j].classList.add('hide');
				}
			}

			// Trouve la recette associée
			var carte = e.currentTarget;
			while(carte.tagName != "OL"){
				carte = carte.parentNode;
			}
			var recette = carte.querySelector('.platRecette');
			recette.classList.remove("hide");
		});
	}

	var fermetureRecette = document.querySelectorAll('.closeRecipe');
	var nombreFermetures = fermetureRecette.length;
	for(var i = 0; i < nombreFermetures; i++){
		fermetureRecette[i].addEventListener('click', function(e){
			var recettes = e.currentTarget.parentNode;
			recettes.classList.add('hide');
		});
	}


	// Partie pour commander le plat
	var popsup = document.querySelectorAll('.popsup');
	var popup = document.getElementById('popup');
	for(var i = 0; i < popsup.length; i++){
		popsup[i].addEventListener('click', function(){
			if(popup){
				// On récupère la carte contenant les informations 
				var currentCard = this.parentNode.parentNode;
				var img = currentCard.querySelectorAll('.platPresentation img')[1].getAttribute('src');
				var titre = currentCard.querySelector('.platPresentation h3').innerHTML;
				var prix = currentCard.querySelector('.platActions p').innerHTML;
				popup.querySelector('img').setAttribute('src', img);

				popup.querySelector('h3').innerHTML = titre;
				popup.querySelector('.hidden').value = titre;
				popup.querySelector('p').innerHTML = prix;
				console.log(popup.querySelector('.hidden'));
				popup.classList.remove('hide');
			}
		});
	}

	// Fermeture d'un popup
	var closePopup = function(dom, cardTag, hideClass){
		dom.addEventListener('click', function(e){
			var target = e.target;
			while(target.tagName != cardTag && (target != e.currentTarget)){
				target = target.parentNode;
			}
			if(target == e.currentTarget)
			{
				this.classList.add(hideClass);
			}
		});
	}
	closePopup(popup, 'FORM', 'hide');

	// Fermeture du popup "evenement"
	var eventPopup = document.getElementById('eventPopup');
	closePopup(eventPopup, 'DIV', 'hidden');
	// Ouverture du popup "evenement"
	document.getElementById('showEvents').addEventListener('click', function(){
		eventPopup.classList.remove('hidden');
	});
	

	// Changement de régime (filtre)
	var regimes = document.querySelector('.regime');
	if(regimes){
		regimes.addEventListener('click', function(e){
			var target = e.target,
			highLight = 'highlight';

			// test si est un li
			var isLi = function(targ){
				return target.tagName == "LI";
			}

			while(!isLi(target) && target != e.currentTarget){
				target = target.parentNode;
			}
			if(isLi(target)){
				var oldHighLight = e.currentTarget.querySelector('.'+highLight);
				oldHighLight.classList.remove(highLight);
				target.classList.add(highLight);

				var sift = target.getAttribute('data-search');
				var plats = document.querySelectorAll('.plat'), i;
				if(sift == "all"){
					for(i = 0; i < plats.length; i++){
						// Retire les filtres
						plats[i].classList.remove('hidden');
					}
				}else{
					for(i = 0; i < plats.length; i++){
						if(!plats[i].classList.contains(sift)){
							plats[i].classList.add('hidden');
						}
					}
				}
			}
		});
	}
});
