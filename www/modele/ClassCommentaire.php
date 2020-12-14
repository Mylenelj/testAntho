<?php
require_once 'modele/classModele.php';

class Commentaire extends Modele{
	/*VARS*/
	public $ID;
	public $parution;
	public $auteur;
	public $contenu;
	public $billetID;
	
	/*CONSTRUCTEUR*/
	function __construct(){
		//transformation de la date en objet date
		$this->parution=new DateTime($this->parution);
	}
}