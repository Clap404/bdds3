<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" type="text/css" href="public/css/bdds3.css">
        <title><?= $title ." | Projet BDD S3" ?></title>

        <script type="text/javascript">
            function setActiveSection(){
                
            }
        </script>

    </head>

    <body>
        <img src="public/images/iut.png" width="30%"/><br>
        <center>    
            <h1><?= $title ?></h1>
        </center>
        <nav>
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="#">Manifestations</a></li>
                <li><a href="?p=iut">IUT</a></li>
                <li><a href="#">Etudiants</a></li>
                <li><a href="?p=epreuves">Epreuves</a></li>
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