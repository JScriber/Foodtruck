<!DOCTYPE html>
<html>
	<head>
		<title>Email</title>
		<meta charset="utf-8"/>
	</head>
	<body>
		<?php 

			include('includes/connexionBDD.php');

			$commandes = $bdd->query('SELECT commande.*, plat.nom as plat, prix.prix
				FROM plat
				INNER JOIN commande ON commande.id_plat = plat.id_plat
				INNER JOIN prix ON plat.id_prix = prix.id_prix 
				ORDER BY commande.nom');
		?>
		<table>
			<?php
				$liste = "";
				while($commande = $commandes->fetch()){
					?>
					<tr>
						<td><?php
							$numero = strtoupper($commande['numero']);
							echo $numero;
							$liste = $liste.$numero." ";
						?></td>
						<td><?php
							$nom = strtoupper($commande['nom']);
							echo $nom;
							$liste = $liste.$nom." ";
						?></td>
						<td><?php
							$prenom = ucfirst(strtolower($commande['prenom']));
							echo $prenom;
							$liste = $liste.$prenom." ";
						?></td>
						<td><?php
							$plat = ucfirst(strtolower($commande['plat']));
							echo $plat;
							$liste = $liste.$plat." ";
						?></td>
						<td><?php
							$prix = $commande['prix']."€";
							echo $prix;
							$liste = $liste.$prix." ";
						?></td>
					</tr>
					<?php
					$liste = $liste."\n";
				}

				$liste = str_replace("\n.", "\n..", $liste);
				$liste = wordwrap($liste, 70, "\r\n");
				$adresse = "comme.alamaison@laposte.net";

				$message = "salut :)";
				// Envoie par mail
				try
				{
					$retour = mail($adresse, "Liste des plats", $message);
					if($retour){
						echo "Email envoyé à ".$adresse."<br>";
					}else{
						echo "Erreur lors de l'envoi";
					}
				} catch(Exception $e) {
					echo "Assurez-vous que les fichiers .INI sont bien configurés. Voir sendmail.ini et php.ini";
				}
			?>
		</table>
	</body>
</html>
