<?php
include_once("abstract.databoundobject.php");
class chat extends DataBoundObject {

        protected $id;
        //protected $id_foto;
        protected $nombre_usuario;
        protected $texto;
        protected $fecha;

        protected function DefineTableName() {
                return("chat");
        }

        protected function DefineRelationMap() {
                return(array(
                        "id" => "id",
                        //"id_foto" => "id_foto",
                        "nombre_usuario" => "nombre_usuario",
                        "texto" => "texto",
                        "fecha" => "fecha"
                ));
        }
        public function registrar($texto){

                $dsn = "mysql:host=topjam;dbname=chat";
                $objPDO = new PDO($dsn, "admin", "root",array()); 
                $objPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $objchat = new chat($objPDO);
                
                session_start();

                if(!isset($_SESSION["usuario"])){
                    header("Location:login.php");
                }

                //evitar inyeccion datos
                $texto=htmlentities($texto);
                $nombre_usuario = $_SESSION["usuario"];

                //$id_foto = $id_foto;

                $fecha = date('Y-m-d H:i:s');
                
                //insertar en db si no existe
               
                $objchat->setnombre_usuario($nombre_usuario)->settexto($texto)->setfecha($fecha)->Save();
                echo "ok";
                        
        

        }
        public function mostrar_comentario($id_foto){
                
                //echo $id_foto;

                $query="SELECT * FROM chat  order by id asc";
                $resultado=$this->objPDO->query($query);
                
                //ejecutar query
                $resultado->execute();
                
                $json = array();        
                foreach ($resultado as $row){
                       $json[] = array(
                               'id' => $row['id'],
                               'fecha' => $row['fecha'],
                               'texto' => $row['texto'],
                               'nombre_usuario' => $row['nombre_usuario'],

                       );
                }
                $jsonstring = json_encode($json);
                echo $jsonstring;
                        
                       
               
        }
        public function mostrar_comentarios(){
                
                //echo $id_foto;

                $query="SELECT * FROM chat order by id desc";
                $resultado=$this->objPDO->query($query);
                
                //ejecutar query
                $resultado->execute();
                
                $json = array();        
                foreach ($resultado as $row){
                       $json[] = array(
                               'id' => $row['id'],
                               'nombre_usuario' => $row['nombre_usuario'],
                               'texto' => $row['texto'],
                               'fecha' => $row['fecha']
                        );
                }
                $jsonstring = json_encode($json);
                echo $jsonstring;
                        
                       
               
        }
        

}


?>