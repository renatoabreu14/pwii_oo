<?php
/**
 * Created by PhpStorm.
 * User: renato
 * Date: 03/07/18
 * Time: 19:50
 */

require_once "../models/Produto.class.php";
require_once "Conexao.php";

class ControllerProduto{

    public static function salvar(Produto $produto){
        if ($produto->getId() <= 0){
            return self::inserir($produto);
        }else{
            return self::alterar($produto);
        }
    }

    private static function alterar(Produto $produto){
        try{
            $sql = "UPDATE produto SET descricao = :descricao, estoque = :estoque, valorunit = :valorunit, ";
            $sql .= "fkIdMarca = :marca, fkIdCategoria = :categoria WHERE id = :id";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":descricao", utf8_encode($produto->getDescricao()));
            $p_sql->bindValue(":estoque", $produto->getEstoque());
            $p_sql->bindValue(":valorunit", $produto->getValorUnit());
            $p_sql->bindValue(":marca", $produto->getMarca()->getId());
            $p_sql->bindValue(":categoria", $produto->getCategoria()->getId());
            $p_sql->bindValue(":id", $produto->getId());

            return $p_sql->execute();
        }catch (PDOException $e){
            print "Ocorreu erro ao executar a alteração";
        }
    }

    private static function inserir(Produto $produto){

        try {
            $sql = "INSERT INTO produto (descricao, estoque, valorunit, fkIdMarca, fkIdCategoria) VALUES (";
            $sql .= ":descricao,";
            $sql .= ":estoque,";
            $sql .= ":valorunit,";
            $sql .= ":marca,";
            $sql .= ":categoria)";

            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":descricao", utf8_encode($produto->getDescricao()));
            $p_sql->bindValue(":estoque", $produto->getEstoque());
            $p_sql->bindValue(":valorunit", $produto->getValorUnit());
            $p_sql->bindValue(":marca", $produto->getMarca()->getId());
            $p_sql->bindValue(":categoria", $produto->getCategoria()->getId());

            return $p_sql->execute();
        }catch (Exception $e){
            print "Ocorreu erro ao executar a inserção";
        }
    }

    public static function excluir($id){
        try{
            $sql = "DELETE FROM produto WHERE id = :id";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":id", $id);
            return $p_sql->execute();
        }catch (Exception $e){
            print "Ocorreu erro ao executar a exclusão";
        }
    }

    public static function buscarTodos(){
        try{
            $sql = "SELECT p.*, m.descricao marca, c.descricao categoria FROM produto p INNER JOIN marca m ON m.id = p.fkIdMarca INNER JOIN categoria c ON c.id = p.fkIdCategoria ORDER BY p.descricao";
            $resultado = Conexao::getInstance()->query($sql);
            $lista = $resultado->fetchAll(PDO::FETCH_ASSOC);

            $v_lista = array();
            foreach ($lista as $il){
                $v_lista[] = self::popularProduto($il);
            }

            return $v_lista;

        }catch (Exception $e){
            print "Ocorreu um erro ao executar a consulta";
        }
    }

    public static function buscarProduto($id){
        try{
            $sql = "SELECT p.*, m.descricao marca, c.descricao categoria FROM produto p INNER JOIN marca m ON m.id = p.fkIdMarca INNER JOIN categoria c ON c.id = p.fkIdCategoria WHERE p.id = :id";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":id", $id);
            $p_sql->execute();
            $lista = $p_sql->fetchAll(PDO::FETCH_ASSOC);

            $produto = new Produto();
            foreach ($lista as $il){

                $produto = self::popularProduto($il);
            }

            return $produto;

        }catch (PDOException $e){
            print "Ocorreu um erro ao executar a consulta";
        }
    }

    private static function popularProduto($itemLista){
        $produto = new Produto();
        $produto->setId($itemLista['id']);
        $produto->setDescricao($itemLista['descricao']);
        $produto->setEstoque($itemLista['estoque']);
        $produto->setValorUnit($itemLista['valorunit']);
        $produto->getMarca()->setId($itemLista['fkIdMarca']);
        $produto->getMarca()->setDescricao($itemLista['marca']);
        $produto->getCategoria()->setId($itemLista['fkIdCategoria']);
        $produto->getCategoria()->setDescricao($itemLista['categoria']);
        return $produto;
    }
}