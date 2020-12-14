<?php
/* chargement des librairies */
require_once "inc/fonctions.php";
/* chargement de tous les fichiers du répertoire inc/ */
load('inc');
/* chargement de tous les fichiers modeles*/
load('modele');
/* chargement de tous les fichiers controleurs */
load('controleur');

/* try/catch */
try {
	//instanciation du blog
	$blog=new Blog;
	
	//pivot
	if ( isset($_GET['action']) ){
		//assainissement
		$action=assainit('get', 'action', 'string');
		
		//pivot
		switch ($action){
			case 'billet':
				if( isset($_GET['id']) ){
					$id=assainit('get','id','int');
					if ($id != 0) {
						$billet= Billet::load($id);
						//afficher le billet avec l'id renseigné
						require_once $blog->affiche('billet');
					} else {
						throw new Exception("Identifiant de billet non valide");
					}
				} else {
					throw new Exception("Identifiant de billet non défini");
				}
				break;
			default:
				throw new Exception("Action non valide");
				break;
		}
		
	} else {
		//afficher l'accueil par defaut
		require_once $blog->affiche('accueil');
	}
} catch (Exception $e){
	//aller chercher les messages d'erreur
	$messsage=$e->getMessage();
	//vue Erreur
	require_once $blog->affiche('erreur');
}
?>
