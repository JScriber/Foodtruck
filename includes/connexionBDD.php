<?php
	// Connexion à la base de données
	try
	{
		$nomBDD = 'calm';
		$utilisateur = 'root';
		$motDePasse = '';

		$bdd = new PDO('mysql:host=localhost;dbname='.$nomBDD.';charset=utf8', $utilisateur, $motDePasse);
	}
	catch(PDOException $e) {
    	die('Erreur : ' . $e->getMessage());
    }

?>