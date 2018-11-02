<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <title>La crèche</title> 
</head>
<body style="background-color: #5D7585;">
    <div class="accueil">
        <h3 style="color: orange; text-align: center;">Crèche</h3>
        <form action="#" method="POST">
            <input type="submit" class="btn btn-danger" value="Déconnexion" style="margin-left: 90%;">
        </form>
    </div>
      <div>
            <img src="images/page_accueil.jpg" style="height: 30%; width: 30%; margin-left: 35%; margin-top: 5%;">
        </div>
    <div style="margin-top: 5%; display: flex;">
        <div style="margin-left: 10%;">
            <form action="ListeEnfant.php" method="POST">
                <input type="submit" class="btn btn-warning" value="Liste des enfants">
            </form>
        </div>
        <div style="margin-left: 55%;">    
            <form action=ListeActivite.php#" method="POST">
                <input type="submit" class="btn btn-warning" value="Liste des activités">
            </form>
        </div>
    </div>


    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>