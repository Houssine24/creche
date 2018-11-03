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
        <form method="POST">
            <div class="element">
                <label>prénom :</label>
                <input type="text" name="children_firstname">
            </div>
            <div class="element"> 
                <label>nom :</label>
                <input type="text" name="children_lastname"></input>
            </div>
            <div class="element">
                <label>date de naissance :</label>
                <input type="date" name="children_birthday">
            </div>
            <div class="element">
                <label>adresse :</label>
                <input type="text" name="children_adress">
            </div>
            <div class="element">
                <label>contacts parents :</label>
                <input type="text" name="children_parents_contact">
            </div>
            <div class="element">
                <label>remarque éventuelle :</label>
                <input type="text" name="children_remarks">
            </div> 
           <!--  <div class="element">
                <label>dates d'accueil :</label>
                <input type="date" name="ch_start_date">
            </div>
            <div class="element"> 
                <label>date fin d'accueil :</label>
                <input type="date" name="ch_end_date"></input>
            </div>
            <div class="element">
                <label>numéro de chambre :</label>
                <input type="date" name="ch_room">
            </div>
            <div class="element">
                <label>numéro de lit :</label>
                <input type="text" name="ch_bed">
            </div> -->
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
            header('Location: ListeEnfant.php');
        }
        // if(!empty($_POST['submit']))
        // {
        //     if (!empty($_POST['ch_start_date']) && !empty($_POST['ch_end_date']) && !empty($_POST['ch_room']) && !empty($_POST['ch_bed']))
        //     {
        //         try 
        //         {
        //             //Pour éviter les erreur.
        //             $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        //             // Connexion à la base de données.
        //             $bdd = new PDO('mysql:host=localhost;dbname=creche_laravel;charset=utf8', 'simoccauch30','mamanjetaime4812', $pdo_options);
        //             //Ajout du nouvel enfant dans la table Children.
        //             $req = $bdd->prepare('INSERT INTO childcare_history(ch_start_date, ch_end_date, ch_room, ch_bed)
        //                 VALUES(:ch_start_date, :ch_end_date, :ch_room, :ch_bed)');
        //             $req->execute(array(
        //                 ':ch_start_date' => $_POST['ch_start_date'],
        //                 ':ch_end_date' => $_POST['ch_end_date'],
        //                 ':ch_room' => $_POST['ch_room'],
        //                 ':ch_bed' => $_POST['ch_bed']
        //             ));
        //         }
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