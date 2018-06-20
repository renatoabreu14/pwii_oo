<?php
/**
 * Created by PhpStorm.
 * User: renato
 * Date: 20/06/18
 * Time: 19:39
 */

require_once "../models/Profissao.class.php";
require_once "Conexao.php";

class ControllerProfissao{

    public static function buscarTodos(){
        try{
            $sql = "SELECT * FROM profissao ORDER BY descricao";
            $resultado = Conexao::getInstance()->query($sql);
            $lista = $resultado->fetchAll(PDO::FETCH_ASSOC);

            $v_lista = array();
            foreach ($lista as $il){
                $v_lista[] = self::popularProfissao($il);
            }

            return $v_lista;

        }catch (Exception $e){
            print "Ocorreu um erro ao executar a consulta";
        }
    }

    private static function popularProfissao($itemLista){
        $profissao = new Profissao();
        $profissao->setId($itemLista['id']);
        $profissao->setDescricao($itemLista['descricao']);
        return $profissao;
    }
}