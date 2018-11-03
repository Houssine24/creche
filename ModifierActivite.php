<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Modifier activité crèche</title>
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
                <form action="ListeActivite.php" method="POST">
                    <input type="submit" class="btn btn-warning" value="Retour liste des activités">
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

ini_set('display_errors', 1);
try
{

	$bdd = new PDO('mysql:host=localhost;dbname=creche_laravel;charset=utf8','simoccauch30', 'mamanjetaime4812');
}
catch (Exception $e){

	die('Erreur : ' . $e->getMessage());
};

if(isset($_POST['modifier']))
{
	$id_modif = $_POST['activity_id'];
	$req =$bdd->query("SELECT * FROM  activity WHERE activity_id=" . $id_modif);
	while ($donnees = $req->fetch())
    {
		echo 	"<div style='margin-top: 5%;'>
					<form method='post'>
						<tr><td><textarea name='activity_name'>" . $donnees['activity_name'] . "</textarea></td>
						<td><textarea name='activity_type'>" . $donnees['activity_type'] . "</textarea></td>
						<td><textarea name='activity_number_max_child'>" . $donnees['activity_number_max_child'] . "</textarea></td>
						<td><button  class='button' name='submit' type='submit' value='Envoyer'>Envoyer</button></td>
					</form>
				</div>";
	};		
}

if(isset($_POST['submit']))
{      
	$id_modif = $_POST['activity_id'];
	$name = $_POST['activity_name'];
	$type = $_POST['activity_type'];
	$number = $_POST['activity_number_max_child'];
	$bdd->query("UPDATE activity SET 
		activity_name = '".$name."',
  		activity_type = '".$type."',
  		activity_number_max_child = '".$number."' WHERE activity_id = " . $id_modif);
}

?>

</body>
</html>
