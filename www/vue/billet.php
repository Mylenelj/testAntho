<?php
//declaration du titre de la page
$blog->titre=$billet->titre;

//démarrage de la mémoire tampon
ob_start();

//mise en forme du billet
?>
<article>
	<header>
		<h3 class="titreBillet"><a href='billet-<?= $billet->ID ?>.html'><?= $billet->titre ?>'</a></h3>
		<time><?= $billet->getParutionFormatEdition() ?></time>
	</header>
	<p><?= $billet->contenu ?></p>
</article>
<hr />
<h2>Réponses</h2>
<article>
<?php foreach ($billet->commentaires as $commentaire): ?>
  <p><?= $commentaire->auteur ?> dit :</p>
  <p><?= $commentaire->contenu ?></p>
<?php endforeach; ?>
</article>
<?php

//arret de la mémoire tampon
$contenu=ob_get_clean();

//appel à mon gabarit
require_once 'gabarit.php';
?>