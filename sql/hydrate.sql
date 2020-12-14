/*utilisation de la base de données*/
USE BLOG;

/*hydratation des tables*/
INSERT INTO Billet(titre, contenu) VALUES 
/*id:1*/	("Premier billet","Bonjour monde ! Ceci est le premier billet sur mon blog."),
/*id:2*/	("Au travail", "Il faut enrichir ce blog dès maintenant.");

INSERT INTO Commentaire(auteur, contenu, billetID) VALUES
	("A. Nonyme","Bravo pour ce début",1),
	("Moi","Merci ! Je vais continuer sur ma lancée",1);