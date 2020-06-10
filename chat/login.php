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
   <div class="panel panel-default">
      <div class="panel-heading">Chat Application Login</div>
    <div class="panel-body">
    <form  id="form_login" name="form" method="POST">
      <p class="text-danger"></p>
      <div class="form-group">
      <input type="text" name="nombre_usuario" id="inputusername" class="form-control" placeholder="nombre de usuario" required>
                            <label for="inputEmail">Nombre de usuario</label>
      </div>
      <div class="form-group">
      <input type="password" name="contrasena" id="inputPassword" class="form-control" placeholder="contraseña" required>
                            <label for="inputPassword">Contraseña</label>
      </div>
      <div class="form-group">
      <button class="btn btn-lg btn-primary btn-block text-uppercase" id="btnEnviar" name="btnEnviar">Iniciar sesión</button>
      </div>
     </form>
    </div>
   </div>
  </div>
  <script src="login.js"></script>
    </body>  
</html>