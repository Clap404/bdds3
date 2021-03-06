<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" type="text/css" href="public/css/bdds3.css">
        <title><?= $title ." | Projet BDD S3" ?></title>
        <script type="text/javascript" src="public/javascript/function.js"></script>

    </head>

    <body>
        <img src="public/images/iut.png" width="30%"/><br>
        <center>    
            <h1><?= $title ?></h1>
        </center>
        <nav>
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="?p=manifestations">Manifestations</a></li>
                <li><a href="?p=iut">IUT</a></li>
                <li><a href="?p=etudiants">Étudiants</a></li>
                <li><a href="?p=epreuves">Épreuves</a></li>
            </ul>
        </nav>

        <?= $content ?>

        <hr />
        <footer>
            <p>
                Réalisé par Benoît Houdayer et François-Xavier Béligat<br/>
                IUT Belfort Montbéliard<br/>
                2013 - 2014
            </p>
            <script type="text/javascript">
                underlineCurrent();
            </script>
        </footer>
    </body>
</html>