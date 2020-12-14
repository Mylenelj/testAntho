<?php
//testAntho
require_once 'modele/classModele.php';
echo "ok";

class Blog extends Modele
{
	/*PROPRIETES*/
	public $titre;
	public $billets;

	/* CONSTRUCTEUR */
	function __construct()
	{
		//hydration de $titre
		$this->titre = '';

		//recuperation des billets
		$this->billets = array();

		$requete = "SELECT *
				FROM Billet
				ORDER BY parution desc";
		$this->billets = $this->fetchAllClass($requete, 'Billet');
	}

	/* ACCUEIL */
	public function affiche($vue)
	{
		switch ($vue) {
				//au cas où $vue==accueil
			case 'accueil':
				$lien = 'vue/accueil.php';
				break;
				//au cas où $vue==billet
			case 'billet':
				$lien = 'vue/billet.php';
				break;
				//au cas où $vue==erreur
			case 'erreur':
				$lien = 'vue/erreur.php';
				break;
				//au cas où $vue est différent de mes cas
			default:
				$lien = 'vue/accueil.php';
				break;
		}

		return $lien;
	}
}
