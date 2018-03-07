#------------------------------------------------------------
#        Insertion calm
#------------------------------------------------------------

INSERT INTO prix VALUES (NULL, "2.50");
INSERT INTO prix VALUES (NULL, "10");
INSERT INTO prix VALUES (NULL, "3.10");


INSERT INTO plat VALUES (NULL, "Sandwich maison", "sandwich.jpg", "Le sandwich maison est un super bon sandwich que nous préparons avec amour chaque jour.", FALSE, FALSE, TRUE, 1);

INSERT INTO plat VALUES (NULL, "Bolognaise", "bolognaise.jpg", "Les bolognaises biologiques que vous allez adorer !", FALSE, FALSE, FALSE, 2);


INSERT INTO plat VALUES (NULL, "Carbonara", "carbonara.jpg", "De délicieux spaghettis carbonara qui vont ravir vos papilles.", TRUE, FALSE, FALSE, 3);

INSERT INTO ingredient VALUES (NULL, "pain"), (NULL, "beurre"),(NULL, "jambon"),(NULL, "salade"),(NULL, "pâtes");


INSERT INTO possede VALUES (1, 1), (1,2), (1,3), (1,4), (2,5), (2,3), (3,5);


INSERT INTO evenement VALUES (NULL, "Art Rock", "https://www.artrock.org/"), (NULL, "Bobital", "https://www.bobital-festival.fr/");