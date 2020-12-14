<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
		<link rel='stylesheet' href='cssReset.css'/>
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"/>
		<link rel="stylesheet/less" type="text/css" href="gen.less" />
		<script src="//cdn.jsdelivr.net/npm/less" ></script>
        <title><?= $blog->titre; ?></title>
    </head>
	
    <body>
        <div id="global">
            <header>
                <h1><a href="index.html">Mon blog</a></h1>
                <p><em>Je vous souhaite la bienvenue sur ce modeste blog.</em></p>
            </header>
			
            <main>
<?= $contenu ?>
            </main>
			
            <footer>
                Blog réalisé avec PHP, HTML5 et CSS.
            </footer>
        </div>
    </body>
</html>