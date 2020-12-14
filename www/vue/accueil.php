<?php
//declaration du titre de la page
$blog->titre='Mon blog';

//démarrage de la mémoire tampon et enregistrement de ce qu'il se passe à partir de la ligne prochaine
ob_start();

//mise en forme des billets
foreach ($blog->billets as $billet):
	?>
	<article>
		<header>
			<h3 class="titreBillet"><a href='billet-<?= $billet->ID ?>.html'><?= $billet->titre ?></a></h3>
			<time><?= $billet->getParutionFormatEdition() ?></time>
		</header>
		<p><?= $billet->contenu ?></p>
	</article>
	<hr />
<?php 
endforeach; 

//arrêt du la mémoire tampon et transmission de ce qu'il s'est passé après mon ob_start()
$contenu=ob_get_clean();

//appel à mon gabarit
require_once 'gabarit.php';
?>