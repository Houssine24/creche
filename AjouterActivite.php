<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Ajout Activité crèche</title>
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
                    <input type="submit" class="btn btn-warning" value="Retour liste des activité">
                </form>
            </div>
            <div>
                <form action="#" method="POST">
                    <input type="submit" class="btn btn-danger" value="Déconnexion">
                </form>
            </div>
        </div>
    </div>
 
    <div id="formulaireAjout" style="background-color: #E6E6FA; text-align: center; margin-top: 8%; border: solid 1px;">
        <form enctype="multipart/form-data" method="POST" ACTION="">
            <div class="element">
                <label>Nom de l'activité:</label>
                <input type="text" name="activity_name">
            </div>
            <div class="element"> 
                <label>Type d'activité :</label>
                <input type="text" name="activity_type"></input>
            </div>
            <div class="element">
                <label>Nombre max d'enfants :</label>
                <input type="number" name="activity_number_max_child">
            </div>
            <div class="element">
                <button  class="button" name="submit" type="submit" value="Envoyer">Envoyer</button>
            </div>
        </form>
    </div>   
<?php
//Message d'erreur si input vide.
if(!empty($_POST['submit'])){
    if (!empty($_POST['activity_name']) && !empty($_POST['activity_type']) && !empty($_POST['activity_number_max_child'])){
        try {
            //Pour éviter les erreur.
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            // Connexion à la base de données.
            $bdd = new PDO('mysql:host=localhost;dbname=creche_laravel;charset=utf8', 'simoccauch30','mamanjetaime4812', $pdo_options);
            //Ajout du nouvel enfant dans la table Children.
            $req = $bdd->prepare('INSERT INTO activity(activity_name, activity_type, activity_number_max_child)
                VALUES(:activity_name, :activity_type, :activity_number_max_child)');
            $req->execute(array(
                ':activity_name' => $_POST['activity_name'],
                ':activity_type' => $_POST['activity_type'],
                ':activity_number_max_child' => $_POST['activity_number_max_child']
            ));
            header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur : ' . $e->getMessage());
            }
    }else{
        echo  "<script>alert( 'erreur de saisie');</script>"; 
    }
}
?>

</body>
</html>