<?php

require_once "../models/Cliente.class.php";
require_once "../controllers/ControllerCliente.php";
require_once "../controllers/ControllerEstCivil.php";
require_once "../controllers/ControllerProfissao.php";

$cliente = new Cliente();

if (isset($_POST['enviar'])){
  $cliente->setId($_POST['id']);
  $cliente->setNome($_POST['nome']);
  $cliente->setEmail($_POST['email']);
  $cliente->setTelefone($_POST['telefone']);
  $cliente->setEndereco($_POST['endereco']);
  $cliente->setSexo($_POST['sexo']);
  $cliente->getProfissao()->setId($_POST['profissao']);
  $cliente->getEstCivil()->setId($_POST['estcivil']);
  ControllerCliente::salvar($cliente);
  header('Location: lista_clientes.php');
}

if(isset($_GET['id'])){
    $cliente = ControllerCliente::buscarCliente($_GET['id']);
}

$listaEstCivil = ControllerEstCivil::buscarTodos();
$listaProfissao = ControllerProfissao::buscarTodos();


?>

<!DOCTYPE html>
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

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.html">Start Bootstrap</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Cadastro de Cliente">
          <a class="nav-link" href="cad_cliente.php">
            <!--<i class="fa fa-fw fa-dashboard"></i>-->
            <span class="nav-link-text">Cadastro de Cliente</span>
          </a>
        </li><!-- aqui é o meu menu-->
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="messagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-envelope"></i>
            <span class="d-lg-none">Messages
              <span class="badge badge-pill badge-primary">12 New</span>
            </span>
            <span class="indicator text-primary d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="messagesDropdown">
            <h6 class="dropdown-header">New Messages:</h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <strong>David Miller</strong>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">Hey there! This new version of SB Admin is pretty awesome! These messages clip off when they reach the end of the box so they don't overflow over to the sides!</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <strong>Jane Smith</strong>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">I was wondering if you could meet for an appointment at 3:00 instead of 4:00. Thanks!</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <strong>John Doe</strong>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">I've sent the final files over to you for review. When you're able to sign off of them let me know and we can discuss distribution.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item small" href="#">View all messages</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-bell"></i>
            <span class="d-lg-none">Alerts
              <span class="badge badge-pill badge-warning">6 New</span>
            </span>
            <span class="indicator text-warning d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="alertsDropdown">
            <h6 class="dropdown-header">New Alerts:</h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-success">
                <strong>
                  <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
              </span>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-danger">
                <strong>
                  <i class="fa fa-long-arrow-down fa-fw"></i>Status Update</strong>
              </span>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-success">
                <strong>
                  <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
              </span>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item small" href="#">View all alerts</a>
          </div>
        </li>
        <li class="nav-item">
          <form class="form-inline my-2 my-lg-0 mr-lg-2">
            <div class="input-group">
              <input class="form-control" type="text" placeholder="Search for...">
              <span class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fa fa-search"></i>
                </button>
              </span>
            </div>
          </form>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.html">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Blank Page</li>
      </ol>
      <div class="row">
        <div class="col-12">
          <!-- aqui é o conteúdo do site-->
          <div class="col-10 offset-1">
            <form action="#" method="post">
                <input type="hidden" name="id" value="<?php echo $cliente->getId();?>">
              <div class="form-group row">
                <div class="col-12">
                  <label class="label">Nome</label>
                  <input type="text" name="nome" placeholder="Nome" class="form-control" value="<?php echo $cliente->getNome();?>">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-12">
                  <label class="label">Email</label>
                  <input type="email" name="email" placeholder="email@site.com.br" class="form-control" value="<?php echo $cliente->getEmail();?>">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-6">
                  <label class="label">Telefone</label>
                  <input type="text" name="telefone" placeholder="(99)99999-9999" class="form-control" value="<?php echo $cliente->getTelefone();?>">
                </div>
                <div class="col-6">
                  <label class="label">Sexo</label>
                  <select name="sexo" class="form-control">
                      <?php
                        if ($cliente->getSexo() == 'F') {
                            ?>
                            <option value="F" selected>Feminino</option>
                            <option value="M">Masculino</option>
                            <?php
                        }else {
                            ?>
                            <option value="F">Feminino</option>
                            <option value="M" selected>Masculino</option>
                            <?php
                        }
                      ?>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-12">
                  <label class="label">Endereço</label>
                  <input type="text" name="endereco" placeholder="Rua dos Bobos nº0" class="form-control" value="<?php echo $cliente->getEndereco();?>">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-6">
                  <label class="label">Profissão</label>
                    <select name="profissao" class="form-control">
                        <?php
                        foreach ($listaProfissao as $profissao){
                            if ($cliente->getProfissao()->getId() == $profissao->getId()){
                                echo "<option value='".$profissao->getId()."' selected>".$profissao->getDescricao()."</option>";
                            }else{
                                echo "<option value='".$profissao->getId()."'>".$profissao->getDescricao()."</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
                  <div class="col-6">
                      <label class="label">Estado Civil</label>
                      <select name="estcivil" class="form-control">
                          <?php
                            foreach ($listaEstCivil as $estcivil){
                                if ($cliente->getEstCivil()->getId() == $estcivil->getId()){
                                    echo "<option value='".$estcivil->getId()."' selected>".$estcivil->getDescricao()."</option>";
                                }else{
                                    echo "<option value='".$estcivil->getId()."'>".$estcivil->getDescricao()."</option>";
                                }
                            }
                          ?>
                      </select>
                  </div>
              </div>
              <div class="form-group row">
                <button type="submit" class="btn btn-success" name="enviar">Enviar</button>&nbsp;
                <a href="lista_clientes.php" class="btn btn-light">Cancelar</a>
              </div>
            </form>
          </div>
          <!--fim do conteúdo-->
        </div>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © Your Website 2018</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.html">Logout</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin.min.js"></script>
  </div>
</body>

</html>
