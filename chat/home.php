<?php

session_start();

if(!isset($_SESSION['usuario']))
{
 header("location:login.php");
}

?>

<html>  
    <head>  
        <title>Chat Application using PHP Ajax Jquery</title>  
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    </head>  
    <body>  
        <div class="container">
   <br />
   
   <h3 align="center">Chat Application using PHP Ajax Jquery</a></h3><br />
   <br />
   
   <div class="table-responsive">
    <h4 align="center">Online User</h4>
    <p align="right">Hi - <?php echo $_SESSION['usuario'];  ?> - <a href="logout.php">Logout</a></p>
    <h1 class="mr-auto ml-auto">Usuarios</h1>
            <div class="table-responsive tablas">
                <table class="table  table-striped table-hover table-scroll">
                        <thead>
                            <tr>
                            <th>ID</th>
                                <th>Nombre de Usuario</th>
                            </tr>
                            <tbody id="tabla_usuarios">

                        </tbody>
                    </table>
            </div>

            <div id="fotos2">

            </div>
                        
  </div>
  <script src="mostrar_usuarios.js"></script>
    </body>  
</html>  