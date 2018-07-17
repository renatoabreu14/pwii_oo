<?php
/**
 * Created by PhpStorm.
 * User: renato
 * Date: 03/07/18
 * Time: 19:39
 */

require_once "../models/Marca.class.php";
require_once "Conexao.php";

class ControllerMarca{

    public static function salvar(Marca $marca){
        if ($marca->getId() <= 0){
            return self::inserir($marca);
        }else{
            return self::alterar($marca);
        }
    }

    private static function alterar(Marca $marca){
        try{
            $sql = "UPDATE marca SET descricao = :descricao";
            $sql .= " WHERE id = :id";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":descricao", utf8_encode($marca->getDescricao()));
            $p_sql->bindValue(":id", $marca->getId());

            return $p_sql->execute();
        }catch (PDOException $e){
            print "Ocorreu erro ao executar a alteração";
        }
    }

    private static function inserir(Marca $marca){

        try {
            $sql = "INSERT INTO marca (descricao) VALUES (";
            $sql .= ":descricao)";

            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":descricao", utf8_encode($marca->getDescricao()));

            return $p_sql->execute();
        }catch (Exception $e){
            print "Ocorreu erro ao executar a inserção";
        }
    }

    public static function excluir($id){
        try{
            $sql = "DELETE FROM marca WHERE id = :id";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":id", $id);
            return $p_sql->execute();
        }catch (Exception $e){
            print "Ocorreu erro ao executar a exclusão";
        }
    }

    public static function buscarTodos(){
        try{
            $sql = "SELECT * FROM marca ORDER BY descricao";
            $resultado = Conexao::getInstance()->query($sql);
            $lista = $resultado->fetchAll(PDO::FETCH_ASSOC);

            $v_lista = array();
            foreach ($lista as $il){
                $v_lista[] = self::popularMarca($il);
            }

            return $v_lista;

        }catch (Exception $e){
            print "Ocorreu um erro ao executar a consulta";
        }
    }

    public static function buscarMarca($id){
        try{
            $sql = "SELECT * FROM marca WHERE id = :id";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":id", $id);
            $p_sql->execute();
            $lista = $p_sql->fetchAll(PDO::FETCH_ASSOC);

            $marca = new Marca();
            foreach ($lista as $il){

                $marca = self::popularMarca($il);
            }

            return $marca;

        }catch (PDOException $e){
            print "Ocorreu um erro ao executar a consulta";
        }
    }

    private static function popularMarca($itemLista){
        $marca = new Marca();
        $marca->setId($itemLista['id']);
        $marca->setDescricao($itemLista['descricao']);
        return $marca;
    }
}