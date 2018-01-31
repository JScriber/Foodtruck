window.addEventListener('load', function(){

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
		}
	});

	// Navigation dans les cartes du Menu
	var appelsRecette = document.querySelectorAll('.showRecipe');
	var nombreAppels = appelsRecette.length;

	for(var i = 0; i < nombreAppels; i++){
		appelsRecette[i].addEventListener('click', function(e){
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


});
