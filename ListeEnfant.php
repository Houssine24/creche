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
      <?php
      while ($donnees = $req->fetch())
      {
       echo "<tr><td> PRÉNOM : " . $donnees['children_firstname'] . "</td></tr>";
       echo "<tr><td> NOM : " . $donnees['children_lastname'] . "</td></tr>";
       echo "<tr><td> DATE DE NAISSANCE : " . $donnees['children_birthday'] . "</td></tr>";
       echo "<tr><td> ADRESSE : " . $donnees['children_adress'] . "</td></tr>";
       echo "<tr><td> CONTACTS PARENTS : " . $donnees['children_parents_contact'] . "</td></tr>";
       echo "<tr><td> REMARQUE ÉVENTUELLE : " . $donnees['children_remarks'] . "</td></tr>";
       echo "<tr><td><button class='modif btn btn-success'>Modifier</button> <button class='supprime btn btn-danger' style='margin-left: 80%;'>Supprimer</button></td></tr>";
     } 
        // Fin de la boucle.
     $req->closeCursor();
     ?>

  <script src="node_modules/jquery/dist/jquery.min.js"></script>
  <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>