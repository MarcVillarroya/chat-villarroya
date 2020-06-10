<?php
require("class.usuario.php");
require("class.pdofactory.php");

$dsn = "mysql:host=topjam;dbname=chat";
    $objPDO = new PDO($dsn, "admin", "root",array()); 
    $objPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $objusuario = new usuario ($objPDO);
    
    $usuarios = $objusuario->mostrar_usuarios();


?>