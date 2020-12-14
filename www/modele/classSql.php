<?php

//Singleton
class db_connect {
	public $host;
	public $login;
	public $pwd;
	public $db;
	public $connexion;
	private static $objet = NULL;
	
	function __construct($host, $login, $pwd, $db) {
		$this->host = $host;
		$this->login = $login;
		$this->pwd = $pwd;
		$this->db = $db;
		
		//dsn = data source name
		$dsn="mysql:dbname=$db;host=$host";
		//options qui révèlent les erreurs et les transmettent à try/catch
		$options=array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
		
		//instanciation d'un PDO
		$this->connexion = new PDO($dsn, $login, $pwd, $options);
	}
	
	public static function construit($host, $login, $pwd, $db) {
		if (isset(self::$objet)) {
			//La connexion existe déjà
			return self::$objet;
		} else {
			//Il n'y a pas de connexion à la BDD
			self::$objet = new db_connect($host, $login, $pwd, $db);
			return self::$objet;
		}
	}
	
	/* construit la connexion en fonction du portage */
	public static function invoque(){
		/*vars*/
		$host='';
		$login='';
		$pwd='';
		$db='';
		
		/*var à changer avant le portage ailleurs*/
		$portage="localhost";
		
		/*hydratation*/
		switch($portage){
			case 'localhost':
				$host='localhost';
				$login='root';
				$db='BLOG';
				break;
		}
		
		/*retour*/
		return self::construit($host, $login, $pwd, $db);
	}
}