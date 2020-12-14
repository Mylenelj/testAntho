<?php

abstract class Modele {
	//execution simple d'une requete
	protected function executer($requete){
		$bdd = db_connect::invoque();
		$statement = $bdd->connexion->prepare($requete);
		$statement->execute();
		
		return $statement;
	}
	
	//fetch class
	protected function fetchClass($requete, $classe){
		//preparation, execution de la requete
		$statement=$this->executer($requete);
		
		//fetch all en class
		$statement->setFetchMode(PDO::FETCH_CLASS, $classe);
		$donnee=$statement->fetch();
		
		return $donnee;
	}
	
	//fetch all class
	protected function fetchAllClass($requete, $classe){
		//preparation, execution de la requete
		$statement=$this->executer($requete);
		
		//fetch all en class
		$donnees= array();
		$statement->setFetchMode(PDO::FETCH_CLASS, $classe);
		$donnees=$statement->fetchAll();
		
		return $donnees;
	}
	
	//loader classique
	protected function loader($requete, $classe){
		//preparation, execution de la requete
		$statement=$this->executer($requete);
		
		//si le retour est de , on fabrique un objet, sinon on lance une erreur
		if ($statement->rowCount()==1){
			$statement->setFetchMode(PDO::FETCH_CLASS, $classe);
			$donnee=$statement->fetch();
		} else {
			throw new Exception("Aucun '$classe' ne correspond à l'identifiant '$id'");
		}
		
		return $donnee;
	}
}