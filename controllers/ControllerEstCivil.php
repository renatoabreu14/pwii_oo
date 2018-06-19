<?php
/**
 * Created by PhpStorm.
 * User: renato
 * Date: 19/06/18
 * Time: 19:38
 */

require_once "../models/EstCivil.class.php";
require_once "Conexao.php";

class ControllerEstCivil{

    public static function buscarTodos(){
        try{
            $sql = "SELECT * FROM est_civil ORDER BY descricao";
            $resultado = Conexao::getInstance()->query($sql);
            $lista = $resultado->fetchAll(PDO::FETCH_ASSOC);

            $v_lista = array();
            foreach ($lista as $il){
                $v_lista[] = self::popularEstCivil($il);
            }

            return $v_lista;

        }catch (Exception $e){
            print "Ocorreu um erro ao executar a consulta";
        }
    }

    private static function popularEstCivil($itemLista){
        $estcivil = new EstCivil();
        $estcivil->setId($itemLista['id']);
        $estcivil->setDescricao($itemLista['descricao']);
        return $estcivil;
    }

}