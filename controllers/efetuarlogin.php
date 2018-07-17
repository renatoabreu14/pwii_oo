<?php

session_start();

if (isset($_POST['entrar'])){
    $_SESSION['usuario'] = $_POST['email'];
    header('Location: ../views/lista_produtos.php');
}else{
    header('Location: login.html');
}