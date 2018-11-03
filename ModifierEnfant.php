<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Modifier Enfant crèche</title>
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
	$id_modif = $_POST['children_id'];
	$req =$bdd->query("SELECT * FROM  children WHERE children_id=" . $id_modif);
	while ($donnees = $req->fetch())
    {
		echo 	"<div style='margin-top: 5%;'>
					<form method='post'>
						<tr><td><textarea name='children_firstname'>" . $donnees['children_firstname'] . "</textarea></td>
						<td><textarea name='children_lastname'>" . $donnees['children_lastname'] . "</textarea></td>
						<td><input type='date' name='children_birthday' value=" . $donnees['children_birthday'] . "></td>
						<td><textarea name='children_adress'>" . $donnees['children_adress'] . "</textarea></td>
						<td><textarea name='children_parents_contact'>" . $donnees['children_parents_contact'] . "</textarea></td>
						<td><textarea name='children_remarks'>" . $donnees['children_remarks'] . "</textarea></td>
						<td><button  class='button' name='submit' type='submit' value='Envoyer'>Envoyer</button></td>
					</form>
				</div>";	
	};		
}

if(isset($_POST['submit']))
{      
	$id_modif = $_POST['children_id'];
	$firstname = $_POST['children_firstname'];
	$lastname = $_POST['children_lastname'];
	$birthday = $_POST['children_birthday'];
	$adress = $_POST['children_adress'];
	$parents_contact = $_POST['children_parents_contact'];
	$remarks = $_POST['children_remarks'];
	$bdd->query("UPDATE children SET 
		children_firstname = '".$firstname."',
  		children_lastname = '".$lastname."',
  		children_birthday = '".$birthday."',
  		children_adress = '".$adress."',
  		children_parents_contact = '".$parents_contact."',
  		children_remarks = '".$remarks."' WHERE children_id = " . $id_modif);

}

?>

</body>
</html>