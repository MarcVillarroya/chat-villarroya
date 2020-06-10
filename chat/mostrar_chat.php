<?php
require("class.chat.php");
require("class.pdofactory.php");

$dsn = "mysql:host=topjam;dbname=chat";
    $objPDO = new PDO($dsn, "admin", "root",array()); 
    $objPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $objchat = new chat ($objPDO);
    
    //$id_foto = $_POST["id_foto"];

   // echo $id_foto;
    
    $chats = $objchat->mostrar_comentarios();


?>