<?php
include_once("abstract.databoundobject.php");

class usuario extends DataBoundObject {

        public $id;
        public $nombre_usuario;
        public $contrasena;


        public function DefineTableName() {
                return("usuario");
        }

        public function DefineRelationMap() {
                return(array(
                        "id" => "id",
                        "nombre_usuario" => "nombre_usuario",
                        "contrasena" => "contrasena"
                ));
        }
        //registrar
      
        
        public function login($nombre_usuario,$contrasena){

                $dsn = "mysql:host=topjam;dbname=chat";
                $objPDO = new PDO($dsn, "admin", "root",array()); 
                $objPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $objUsuario = new usuario($objPDO);



                //comprobar que no existe
                $query="SELECT * FROM usuario where nombre_usuario = '".$nombre_usuario."' and contrasena = '".$contrasena."' ";
                $resultado=$this->objPDO->query($query);
                
                //ejecutar query
                $resultado->execute();

                
                $numero_registro=$resultado->rowCount();
                //echo $numero_registro;

                //insertar en db si no existe
                if($numero_registro != 0){
                                session_start();
                                $_SESSION["usuario"]=$_POST["nombre_usuario"];
                                echo "usuario";
                }else{
                        echo "fail";
                      
                }
        }
        public function mostrar_usuarios(){
                session_start();

                if(!isset($_SESSION["usuario"])){
                    header("Location:login.php");
                }

                $nombre_usuario = $_SESSION["usuario"];
                
                
                $query="SELECT * FROM usuario where nombre_usuario != '".$nombre_usuario."' ORDER BY id";
                $resultado=$this->objPDO->query($query);
                
                //ejecutar query
                $resultado->execute();
                $numero_registro=$resultado->rowCount();
                //echo $numero_registro;

                //insertar en db si no existe

                $json = array();
                if($numero_registro != 0){
                        
                        foreach ($resultado as $row){
                               $json[] = array(
                                       'id' => $row['id'],
                                       'nombre_usuario' => $row['nombre_usuario']
                               );
                        }
                        $jsonstring = json_encode($json);
                        echo $jsonstring;
                       
                }else{
                        echo "fail";
                        
                }
        }
       


        
}

?>