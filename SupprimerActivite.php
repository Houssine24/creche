<?php

ini_set('display_errors', 1);
try
{

	$bdd = new PDO('mysql:host=localhost;dbname=creche_laravel;charset=utf8','simoccauch30', 'mamanjetaime4812');
}
catch (Exception $e){

	die('Erreur : ' . $e->getMessage());
}
if(isset($_POST['supprimer']))
{
	$id_del = $_POST['activity_id'];
	$bdd->query("DELETE FROM activity WHERE activity_id=" . $id_del);  
    header('Location: ListeActivite.php');
}
?>