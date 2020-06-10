<?php
require("class.usuario.php");
require("class.PDOfactory.php");

$dsn = "mysql:host=topjam;dbname=chat";
    $objPDO = new PDO($dsn, "admin", "root",array()); 
    $objPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $nombre_usuario = $_POST["nombre_usuario"];
    $contrasena = $_POST["contrasena"];

    $objusuario = new usuario ($objPDO);
    //echo("fail");
    $usuarios = $objusuario->login($nombre_usuario,$contrasena);

    

?>