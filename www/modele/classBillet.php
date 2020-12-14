<?php
require_once 'modele/classModele.php';

class Billet extends Modele{
	/*VARS*/
	public $ID;
	public $parution;
	public $titre;
	public $contenu;
	
	public $commentaires;
	
	/*CONSTRUCTEUR*/
	function __construct(){
		//transformation de la date en objet date
		$this->parution=new DateTime($this->parution);
		
		//preparation des commentaires
		$this->commentaires= array();
		$requete="SELECT *
				FROM Commentaire
				ORDER BY parution asc";
		$this->commentaires=$this->fetchAllClass($requete,'Commentaire');
	}
	
	/*GETTERS*/
	public function getParutionFormatEdition(){
		$bob="le ".$this->parution->format("d/m/Y à H\hs");
		return $bob;
	}
	
	/*charge un billet en fonction de son id
	* je sais pas comment faire pour passer en methode générique avec ma classe modele
	*/
	public static function load($id){
		$requete="SELECT *
				FROM Billet
				WHERE ID=$id";
		//preparation, execution de la requete
		$bdd = db_connect::invoque();
		$statement = $bdd->connexion->prepare($requete);
		$statement->execute();
		
		//si le retour est de , on fabrique un objet, sinon on lance une erreur
		if ($statement->rowCount()==1){
			$statement->setFetchMode(PDO::FETCH_CLASS, 'Billet');
			$billet=$statement->fetch();
		} else {
			throw new Exception("Aucun '$classe' ne correspond à l'identifiant '$id'");
		}
		return $billet;
	}
}