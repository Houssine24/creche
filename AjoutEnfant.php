<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Ajout Enfant crèche</title>
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
 
    <div id="formulaireAjout" style="background-color: #E6E6FA; text-align: center; margin-top: 8%; border: solid 1px;">
        <form enctype="multipart/form-data" method="POST" ACTION="">
            <div class="element">
                <label>Prénom :</label>
                <input type="text" name="children_firstname">
            </div>
            <div class="element"> 
                <label>Nom :</label>
                <input type="text" name="children_lastname"></input>
            </div>
            <div class="element">
                <label>date de naissance :</label>
                <input type="date" name="children_birthday">
            </div>
            <div class="element">
                <label>Adresse :</label>
                <input type="text" name="children_adress">
            </div>
            <div class="element">
                <label>Contacts parents :</label>
                <input type="text" name="children_parents_contact">
            </div>
            <div class="element">
                <label>Remarque éventuelle :</label>
                <input type="text" name="children_remarks">
            </div>
            <div class="element">
                <button  class="button" name="submit" type="submit" value="Envoyer">Envoyer</button>
            </div>
        </form>
    </div>   
<?php
//Message d'erreur si input vide.
if(!empty($_POST['submit'])){
    if (!empty($_POST['children_firstname']) && !empty($_POST['children_lastname']) && !empty($_POST['children_birthday']) && !empty($_POST['children_adress']) && !empty($_POST['children_parents_contact']) && !empty($_POST['children_remarks'])){
        try {
            //Pour éviter les erreur.
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            // Connexion à la base de données.
            $bdd = new PDO('mysql:host=localhost;dbname=creche_laravel;charset=utf8', 'simoccauch30','mamanjetaime4812', $pdo_options);
            //Ajout du nouvel enfant dans la table Children.
            $req = $bdd->prepare('INSERT INTO children(children_firstname, children_lastname, children_birthday, children_adress, children_parents_contact, children_remarks)
                VALUES(:children_firstname, :children_lastname, :children_birthday, :children_adress, :children_parents_contact, :children_remarks)');
            $req->execute(array(
                ':children_firstname' => $_POST['children_firstname'],
                ':children_lastname' => $_POST['children_lastname'],
                ':children_birthday' => $_POST['children_birthday'],
                ':children_adress' => $_POST['children_adress'],
                ':children_parents_contact' => $_POST['children_parents_contact'],
                ':children_remarks' => $_POST['children_remarks']
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