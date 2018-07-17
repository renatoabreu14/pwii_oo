<?php
session_start();
unset($_SESSION['usuario']);
//session_destroy();
header('Location:../views/lista_produtos.php');