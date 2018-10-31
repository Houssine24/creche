<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <title>La crèche</title> 
</head>
<body style="background-color: #5D7585;">
    <div class="header">
        <h3 style="color: orange; text-align: center;">Crèche</h3>
        <form action="#" method="POST">
            <input type="submit" class="btn btn-danger" value="Déconnexion" style="margin-left: 90%;">
        </form>
    </div>
    <div style="margin-top: 25%;">
        <form action="ListeEnfant.php" method="POST">
            <input type="submit" class="btn btn-warning" value="Liste des enfants">
        </form>
    </div>    
        <form action="#" method="POST">
            <input type="submit" class="btn btn-warning" value="Liste des activités">
        </form>
    </div>



    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>