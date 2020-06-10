<?php
require("class.chat.php");
require("class.pdofactory.php");

$dsn = "mysql:host=topjam;dbname=chat";
    $objPDO = new PDO($dsn, "admin", "root",array()); 
    $objPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $texto = $_POST["texto"];
    //$id_foto = $_POST["id_foto"];

    //echo $id_foto;
    

    
    $validar = 0;


    if(!empty($texto)){
        $validar++; 
    }else{
        echo "vacio";
    }
    
    

    $objchat = new chat($objPDO);
    //echo $validar;

    if($validar>=1){
        
       $chats = $objchat->registrar($texto);
    }

    
    
    

    
