<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta http-equiv="content-type" content="text/html" charset="UTF-8">
        <link href="style.css" rel="stylesheet" type="text/css">
        
        <title>UpInside | Gerenciador de sites</title>
        <?php
        include"../connections/config.php";
        include"scripts.php";
        $conexao = mysql_connect($hostname_config, $username_config, $password_config) or die(mysql_error());
        $db = mysql_select_db("$database_config") or die(mysql_error());
        ?>        
    </head>
    <body>