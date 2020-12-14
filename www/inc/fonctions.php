<?php

//autoloader de fichiers
function load($repertoire){
	$dossier=opendir($repertoire);
	while ($fichier=readdir($dossier)){
		if (is_file($repertoire.'/'.$fichier) && $fichier !='/' && $fichier !='.' && $fichier != '..'){
			require_once($repertoire.'/'.$fichier);
		}
	}
	closedir($dossier);
}

/** 
* Fonction qui assainit les données depuis le POST
**/
function assainit($methode, $cle, $type){
	$bob='';
	
	if ($methode==='post') {
		switch($type){
			case 'int':
				$bob=( isset($_POST[$cle]) ) ? intval($_POST[$cle]) : 0;
				break;
			case 'float':
				$bob=( isset($_POST[$cle]) ) ? floatval($_POST[$cle]) : 0.00;
				break;
			case 'string':
				$bob=( isset($_POST[$cle]) ) ? htmlspecialchars(trim(strip_tags($_POST[$cle]))) : '';
				break;
			case 'textarea':
				$bob=( isset($_POST[$cle]) ) ? htmlspecialchars(trim(addslashes($_POST[$cle]))) : '';
				//evite les injections xss
				$bob=str_replace(array("<script>","</script>"), array("",""), $bob);
				break;
		}
	} else {
		switch($type){
			case 'int':
				$bob=( isset($_GET[$cle]) ) ? intval($_GET[$cle]) : 0;
				break;
			case 'float':
				$bob=( isset($_GET[$cle]) ) ? floatval($_GET[$cle]) : 0.00;
				break;
			case 'string':
				$bob=( isset($_GET[$cle]) ) ? htmlspecialchars(trim(strip_tags($_GET[$cle]))) : '';
				break;
			case 'textarea':
				$bob=( isset($_GET[$cle]) ) ? htmlspecialchars(trim(addslashes($_GET[$cle]))) : '';
				//evite les injections xss
				$bob=str_replace(array("<script>","</script>"), array("",""), $bob);
				break;
		}
	}
	
	return $bob;
}