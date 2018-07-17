<?php
require_once "../controllers/ControllerUsuario.php";

$usuario = new Usuario();
if (isset($_POST['registre'])){
    $usuario->setId(0);
    $usuario->setNome($_POST['nome']);
    $usuario->setSobrenome($_POST['sobrenome']);
    $usuario->setEmail($_POST['email']);
    $usuario->setSenha(md5($_POST['senha']));
    ControllerUsuario::salvar($usuario);
    header('Location: login.html');
}
?>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>SB Admin - Start Bootstrap Template</title>
  <!-- Bootstrap core CSS-->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="../css/sb-admin.css" rel="stylesheet">
</head>

<body class="bg-dark">
  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Registre-se</div>
      <div class="card-body">
        <form method="post" action="#">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputName">Nome</label>
                <input class="form-control" id="exampleInputName" type="text" aria-describedby="nameHelp" placeholder="Entre com o seu nome" name="nome">
              </div>
              <div class="col-md-6">
                <label for="exampleInputLastName">Sobrenome</label>
                <input class="form-control" id="exampleInputLastName" type="text" aria-describedby="nameHelp" placeholder="Entre com o seu sobrenome" name="sobrenome">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input class="form-control" id="exampleInputEmail1" type="email" aria-describedby="emailHelp" placeholder="Entre com o seu email" name="email">
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputPassword1">Senha</label>
                <input class="form-control" id="exampleInputPassword1" type="password" placeholder="Entre com a sua senha" name="senha">
              </div>
              <div class="col-md-6">
                <label for="exampleConfirmPassword">Confirmação de senha</label>
                <input class="form-control" id="exampleConfirmPassword" type="password" placeholder="Confirme sua senha">
              </div>
            </div>
          </div>
          <button class="btn btn-primary btn-block" name="registre" type="submit">Registrar</button>
        </form>
        <!--<div class="text-center">
          <a class="d-block small mt-3" href="login.html">Login Page</a>
          <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
        </div>-->
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>
