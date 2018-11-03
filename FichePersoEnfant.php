<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Fiche personnelle Enfant</title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
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
                <form action="ListeEnfant.php" method="POST">
                    <input type="submit" class="btn btn-warning" value="Retour liste des enfants">
                </form>
            </div>
            <div>
                <form action="#" method="POST">
                    <input type="submit" class="btn btn-danger" value="Déconnexion">
                </form>
            </div>
        </div>
    </div>
    <div class="news  col-sm-9" style="margin-top: 5%; text-align: center;">
    <table class="table table-striped" style="background-color: #E6E6FA; margin-left: 15%;">
      <thead>
        <th>dates d'accueil</th>
        <th>date fin d'accueil</th>
        <th>numéro de chambre</th>
        <th>numéro de lit</th>
    </thead>

<?php

ini_set('display_errors', 1);
try
{

	$bdd = new PDO('mysql:host=localhost;dbname=creche_laravel;charset=utf8','simoccauch30', 'mamanjetaime4812');
}
catch (Exception $e){

	die('Erreur : ' . $e->getMessage());
};

if(isset($_POST['info']))
{
    $id_child = $_POST['child_id'];
    $req =$bdd->query("SELECT * FROM  childcare_history WHERE children_id=" . $id_child);
    while ($donnees = $req->fetch())
    {
        echo "
              <tr>
                <td>" . $donnees['ch_start_date'] . "</td>
                <td>" . $donnees['ch_end_date'] . "</td>
                <td>" . $donnees['ch_room'] . "</td>
                <td>" . $donnees['ch_bed'] . "</td>
                <td><input type='hidden' name='info_child' value=" . $donnees['ch_id'] . "></td>
                <td>
                  <form method='post' class='id_child'>
                    <input type='hidden' name='children_id' value=". $donnees['children_id'] . ">
                </td>
              </tr>";
    }
    if (isset($_POST['info']))
    {
        $id_child = $_POST['child_id'];
    $req =$bdd->query("SELECT * FROM  participate WHERE children_id=" . $id_child);
    while ($donnees = $req->fetch())
    {
        echo "
                    <li>Participe à l'activité : (par id)
                        <ul>
                            " . $donnees['activity_id'] . "<input type='hidden' name='children_id' value=". $donnees['children_id'] . ">
                        </ul>
                    </li>

        ";
    }
    }
}
?>

</body>
</html>