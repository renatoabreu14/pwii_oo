<?php
/**
 * Created by PhpStorm.
 * User: renato
 * Date: 17/07/18
 * Time: 19:10
 */

require_once "../models/Usuario.class.php";
require_once "Conexao.php";

class ControllerUsuario{

    private function __construct(){

    }

    public static function salvar(Usuario $usuario){
        if ($usuario->getId() <= 0){
            self::inserir($usuario);
        }else{
            self::alterar($usuario);
        }
    }

    private static function inserir(Usuario $usuario){
        try {
            $sql = "INSERT INTO usuario (nome, sobrenome, email, senha) VALUES (";
            $sql .= ":nome,";
            $sql .= ":sobrenome,";
            $sql .= ":email,";
            $sql .= ":senha)";

            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":nome", utf8_encode($usuario->getNome()));
            $p_sql->bindValue(":sobrenome", utf8_encode($usuario->getSobrenome()));
            $p_sql->bindValue(":email", $usuario->getEmail());
            $p_sql->bindValue(":senha", $usuario->getSenha());

            return $p_sql->execute();
        }catch (Exception $e){
            print "Ocorreu erro ao executar a inserção";
        }
    }

    private static function alterar(Usuario $usuario){

    }
}