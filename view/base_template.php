<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" type="text/css" href="public/css/bdds3.css">
        <title><?= $title ." | Projet BDD S3" ?></title>
    </head>

    <body>
        <img src="public/images/iut.png" width="30%"/>
        <h1><?= $title ?></h1>
        <nav>
            <ul>
                <li class="active"><a href="index.php">Accueil</a></li>
                <li><a href="#">Manifestations</a></li>
                <li><a href="?p=iut">IUT</a></li>
                <li><a href="#">Etudiants</a></li>
                <li><a href="#">Epreuves</a></li>
            </ul>
        </nav>

        <?= $content ?>

        <hr />
        <footer>
            <p>
                Réalisé par Benoît Houdayer et François-Xavier Béligat<br/>
                IUT Belfort Montbeliard<br/>
                2013 - 2014
            </p>
        </footer>
    </body>
</html>