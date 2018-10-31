<?php
    $hote = 'localhost';
    $base = 'creche_laravel';
    $user = 'simoccauch30';
    $pass = 'mamanjetaime4812';
    $cnx = mysql_connect($hote, $user, $pass) or die(mysql_error());
    $ret = mysql_select_db($base) or die(mysql_error());
?>