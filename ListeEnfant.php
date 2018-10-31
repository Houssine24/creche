<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <title>Liste des enfants</title> 
</head>
<body>
    <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
            <a class="lienRetour" href="index.php">Retour Page d'accueil</a>
            <h1>Liste</h1>
            <a class="lienAjout" href="AjoutEnfant.php">Ajouter un Enfant</a>
    </nav>
    <h2>Liste des enfants :</h2>
    <?php
                // Connexion à la base de données
        try
        {
            $bdd = new PDO('mysql:host=localhost;dbname=creche_laravel;charset=utf8', 'simoccauch30', 'mamanjetaime4812');
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }


                // On récupère la liste enfants
        $req = $bdd->query('SELECT * FROM  children WHERE children_id');
    ?>
       

    <div class="news  col-sm-9" >
        <table class="table table-striped">    

        <?php
            while ($donnees = $req->fetch())
            {
               echo "<tr><td> Prénom : " . $donnees['children_firstname'] . "</td></tr>";
               echo "<tr><td> Nom : " . $donnees['children_lastname'] . "</td></tr>";
               echo "<tr><td> Date de naissance : " . $donnees['children_birthday'] . "</td></tr>";
               echo "<tr><td> Adresse : " . $donnees['children_adress'] . "</td></tr>";
               echo "<tr><td> Contacts parents : " . $donnees['children_parents_contact'] . "</td></tr>";
               echo "<tr><td> Remarque éventuelle : " . $donnees['children_remarks'] . "</td></tr><td><button class='modif btn btn-warning'>Modifier</button></td><td><button class='supprime btn btn-danger'>Supprimer</button></td></tr>";
            } 
            // Fin de la boucle des articles.
            $req->closeCursor();
       ?>

     <script src="node_modules/jquery/dist/jquery.min.js"></script>
     <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>