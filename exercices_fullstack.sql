
-- Ecrire des requêtes d'interrogation de la base de données

-- Vous devez écrire les requêtes suivantes:


--     Afficher la liste des commandes ( la liste doit faire apparaitre la date, les informations du client, le plat et le prix )

select date_commande, nom_client, telephone_client, email_client, adresse_client, plat.libelle, plat.prix 
from commande 
inner join plat on commande.id_plat = plat.id;

--     Afficher la liste des plats en spécifiant la catégorie

select categorie.libelle AS catégories, plat.libelle, prix from categorie join plat on plat.id_categorie = categorie.id;

--     Afficher les catégories et le nombre de plats actifs dans chaque catégorie

select categorie.libelle as categorie, plat.libelle from categorie join plat where active = "Yes";

--     Liste des plats les plus vendus par ordre décroissant

select plat.libelle, quantite from plat join commande on commande.id_plat = plat.id order by quantite DESC LIMIT 3;

--     Le plat le plus rémunérateur

select plat.libelle, (count(*)*plat.prix) as total from commande join plat on commande.id_plat group by plat.libelle order by total desc limit 3;

--     Liste des clients et le chiffre d'affaire généré par client (par ordre décroissant)

SELECT nom_client, sum(quantite * plat.prix) AS chifre_daff
FROM commande JOIN plat ON commande.id_plat = plat.id 
GROUP BY nom_client 
ORDER BY chifre_daff desc; 

--     Ecrire des requêtes de modification de la base de données

--     1. Ecrivez une requête permettant de supprimer les plats non actif de la base de données

DELETE (*) from plat where active = "No";

--     2. Ecrivez une requête permettant de supprimer les commandes avec le statut livré

DELETE (*) from commande where etat = "livrée";

--     3. Ecrivez un script sql permettant d'ajouter une nouvelle catégorie et un plat dans cette nouvelle catégorie.

INSERT INTO categorie (libelle, desription, prix, image, active) VALUES (libelle, desription, prix, image, active);

--     4. Ecrivez une requête permettant d'augmenter de 10% le prix des plats de la catégorie 'Pizza'

-- Methode 1 :
UPDATE plat SET prix = prix * 1.1 where id_categorie = 4;
-- Methode 2 :
UPDATE plat SET prix = prix * 1.1 where plat.id_categorie = (SELECT categorie.id FROM categorie WHERE libelle = "Pizza");
-- Methode 3 :
UPDATE plat JOIN categorie ON id_categorie = categorie.id SET prix = prix * 1.1  where id_categorie = "Pizza";



