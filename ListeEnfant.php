<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8"/>
  <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
  <title>Liste des enfants</title> 
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
        <form action="AjoutEnfant.php" method="POST">
          <input type="submit" class="btn btn-warning" value="Ajouter un Enfant">
        </form>
      </div>
      <div>
        <form action="#" method="POST">
          <input type="submit" class="btn btn-danger" value="Déconnexion">
        </form>
      </div>
    </div>
  </div>

  <?php
  require ('SupprimerEnfant.php');
    // Connexion à la base de données
  try
  {
    $bdd = new PDO('mysql:host=localhost;dbname=creche_laravel;charset=utf8', 'simoccauch30', 'mamanjetaime4812');
  }
  catch(Exception $e)
  {
    die('Erreur : '.$e->getMessage());
  }
    // On récupère la liste des enfants
  $req = $bdd->query('SELECT * FROM  children WHERE children_id ORDER BY children_firstname');
  ?>

  <div class="news  col-sm-9" style="margin-top: 5%; text-align: center;">
    <table class="table table-striped" style="background-color: #E6E6FA; margin-left: 15%;">
      <thead>
        <th>Fiche personnelle</th>
        <th>Prenom</th>
        <th>Nom </th>
        <th>Date de Naissance</th>
        <th>Adresse</th>
        <th>Contact des Parents</th>
        <th>Remarques</th>
        <th>Option</th>
    </thead>
      <?php
      while ($donnees = $req->fetch())
      {
       echo "
              <tr>
                <td><form method='post' action='FichePersoEnfant.php' class='fichePerso'>
                      <input type='hidden' name='child_id' value=" . $donnees['children_id'] . ">
                      <input type='submit' name='info' class='info' value='+'>
                    </form>
                </td>
                <td>" . $donnees['children_firstname'] . "</td>
                <td>" . $donnees['children_lastname'] . "</td>
                <td>" . $donnees['children_birthday'] . "</td>
                <td>" . $donnees['children_adress'] . "</td>
                <td>" . $donnees['children_parents_contact'] . "</td>
                <td>" . $donnees['children_remarks'] . "</td>
                <td>
                  <form method='post' class='deleteform'>
                    <input type='hidden' name='children_id' value=". $donnees['children_id'] . ">
                    <input type='submit' name='supprimer' class='supprimer btn btn-danger' value='supprimer'>
                  </form>
                </td>
                <td>
                  <form method='post' action='ModifierEnfant.php' class='deleteform'>
                    <input type='hidden' name='children_id' value=". $donnees['children_id'] . ">
                    <input type='submit' name='modifier' class='modifier btn btn-success' value='modifier'>
                  </form>
                </td>
              </tr>";
     }
     if(isset($_POST['modifier']))
      {

      } 
        // Fin de la boucle.
     $req->closeCursor();
?>

     <script src="node_modules/jquery/dist/jquery.min.js"></script>
     <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
   </body>
   </html>