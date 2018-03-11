<!DOCTYPE html>
<html>
	<head>
		<title>Email</title>
		<meta charset="utf-8"/>

		<!-- Favicon -->
		<link rel="apple-touch-icon" sizes="180x180" href="images/logo/favicon/apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="images/logo/favicon/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="images/logo/favicon/favicon-16x16.png">
		<link rel="manifest" href="images/logo/favicon/site.webmanifest">
		<link rel="mask-icon" href="images/logo/favicon/safari-pinned-tab.svg" color="#ffb500">
		<link rel="shortcut icon" href="images/logo/favicon/favicon.ico">
		<meta name="msapplication-TileColor" content="#ffb500">
		<meta name="msapplication-config" content="images/logo/favicon/browserconfig.xml">
		<meta name="theme-color" content="#ffb500">
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
				$compteur = 0;
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
					$compteur++;
				}

				$liste = str_replace("\n.", "\n..", $liste);
				$liste = wordwrap($liste, 70, "\r\n");
				$adresse = "comme.alamaison@laposte.net";

				// Si aucune commande
				if($compteur == 0){
					$liste = "Aucune commande de passée.";

					echo $liste."<br>";
				}

				// Envoie par mail
				try
				{
					$demain = new DateTime('now+1day');
					$retour = mail($adresse, "Liste des plats - ".$demain->format('d/m/Y'), $liste);
					if($retour){
						echo "Email envoyé à ".$adresse."<br>";
						// Delete the table
						$bdd->query('DELETE FROM commande');
						$bdd->query('ALTER TABLE commande AUTO_INCREMENT = 1');
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
