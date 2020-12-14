<?php
//declaration du titre de la page
$blog->titre='Erreurs';

//démarrage de la mémoire tampon
ob_start();

//mise en forme des erreurs
?>
<p class='erreurs'>Une erreur est survenue : <?= $message ?></p>
<?php

//arret de la mémoire tampon
$contenu=ob_get_clean();

//appel à mon gabarit
require_once 'gabarit.php';
?>