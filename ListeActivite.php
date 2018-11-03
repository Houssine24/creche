<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8"/>
  <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
  <title>Liste des activités</title> 
</head>
<body style="background-color: #5D7585;">
  <div class="header">
    <h3 style="color: orange; text-align: center;">Crèche</h3>
    <div class="btnHeader" style="display: flex; justify-content: space-around; margin-top: 2%;">
    <div>
      <form action="index.php" method="POST">
        <input type="submit" class="btn btn-warning" value="Retour page d'accueil">
      </form>
    </div>
    <div>
      <form action="AjouterActivite.php" method="POST">
        <input type="submit" class="btn btn-warning" value="Ajouter une Activité">
      </form>
    </div>
    <div>
      <form action="#" method="POST">
        <input type="submit" class="btn btn-danger" value="Déconnexion">
      </form>
    </div>
    </div>
  </div>
  <!-- <h1>Liste des enfants</h1> -->
  <?php
  require ('SupprimerActivite.php');
    // Connexion à la base de données
  try
  {
    $bdd = new PDO('mysql:host=localhost;dbname=creche_laravel;charset=utf8', 'simoccauch30', 'mamanjetaime4812');
  }
  catch(Exception $e)
  {
    die('Erreur : '.$e->getMessage());
  }
    // On récupère la liste des activités
  $req = $bdd->query('SELECT * FROM  activity WHERE activity_id');
  ?>
  <div class="news  col-sm-9" style="margin-top: 5%; text-align: center;">
    <table class="table table-striped" style="background-color: #E6E6FA; margin-left: 15%;">
      <thead>
        <th>Nom de l'activité</th>
        <th>Type d'activité</th>
        <th>Nombre d'enfants max</th>
        <th>Option</th>
    </thead> 
      <?php
      while ($donnees = $req->fetch())
      {
       echo "
              <tr>
                <td>" . $donnees['activity_name'] . "</td>
                <td>" . $donnees['activity_type'] . "</td>
                <td>" . $donnees['activity_number_max_child'] . "</td>
                <td>
                  <form method='post' class='deleteform'>
                    <input type='hidden' name='activity_id' value=". $donnees['activity_id'] . ">
                    <input type='submit' name='supprimer' class='supprimer btn btn-danger' value='supprimer'>
                  </form>
                </td>
                <td>
                  <form method='post' action='ModifierActivite.php' class='deleteform'>
                    <input type='hidden' name='activity_id' value=". $donnees['activity_id'] . ">
                    <input type='submit' name='modifier' class='modifier btn btn-success' value='modifier'>
                  </form>
                </td>
              </tr>";
     } 
        // Fin de la boucle.
     $req->closeCursor();
     ?>

  <script src="node_modules/jquery/dist/jquery.min.js"></script>
  <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>