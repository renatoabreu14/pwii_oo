<?php
/**
 * Created by PhpStorm.
 * User: renato
 * Date: 03/07/18
 * Time: 18:48
 */
require_once "../models/Categoria.class.php";
require_once "Conexao.php";

class ControllerCategoria{


    public static function salvar(Categoria $categoria){
        if ($categoria->getId() <= 0){
            return self::inserir($categoria);
        }else{
            return self::alterar($categoria);
        }
    }

    private static function alterar(Categoria $categoria){
        try{
            $sql = "UPDATE categoria SET descricao = :descricao";
            $sql .= " WHERE id = :id";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":descricao", utf8_encode($categoria->getDescricao()));
            $p_sql->bindValue(":id", $categoria->getId());

            return $p_sql->execute();
        }catch (PDOException $e){
            print "Ocorreu erro ao executar a alteração";
        }
    }

    private static function inserir(Categoria $categoria){

        try {
            $sql = "INSERT INTO categoria (descricao) VALUES (";
            $sql .= ":descricao)";

            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":descricao", utf8_encode($categoria->getDescricao()));

            return $p_sql->execute();
        }catch (Exception $e){
            print "Ocorreu erro ao executar a inserção";
        }
    }

    public static function excluir($id){
        try{
            $sql = "DELETE FROM categoria WHERE id = :id";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":id", $id);
            return $p_sql->execute();
        }catch (Exception $e){
            print "Ocorreu erro ao executar a exclusão";
        }
    }

    public static function buscarTodos(){
        try{
            $sql = "SELECT * FROM categoria ORDER BY descricao";
            $resultado = Conexao::getInstance()->query($sql);
            $lista = $resultado->fetchAll(PDO::FETCH_ASSOC);

            $v_lista = array();
            foreach ($lista as $il){
                $v_lista[] = self::popularCategoria($il);
            }

            return $v_lista;

        }catch (Exception $e){
            print "Ocorreu um erro ao executar a consulta";
        }
    }

    public static function buscarCategoria($id){
        try{
            $sql = "SELECT * FROM categoria WHERE id = :id";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":id", $id);
            $p_sql->execute();
            $lista = $p_sql->fetchAll(PDO::FETCH_ASSOC);

            $categoria = new Categoria();
            foreach ($lista as $il){

                $categoria = self::popularCategoria($il);
            }

            return $categoria;

        }catch (PDOException $e){
            print "Ocorreu um erro ao executar a consulta";
        }
    }

    private static function popularCategoria($itemLista){
        $categoria = new Categoria();
        $categoria->setId($itemLista['id']);
        $categoria->setDescricao($itemLista['descricao']);
        return $categoria;
    }
}