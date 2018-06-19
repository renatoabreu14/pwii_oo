<?php

require_once "../models/Cliente.class.php";
require_once "Conexao.php";

class ControllerCliente{

    public static function salvar(Cliente $cliente){
        if ($cliente->getId() <= 0){
            return self::inserir($cliente);
        }else{
            return self::alterar($cliente);
        }
    }

    private static function alterar(Cliente $cliente){
        try{
            $sql = "UPDATE cliente SET nome = :nome, email = :email, telefone = :telefone, ";
            $sql .= "endereco = :endereco, sexo = :sexo, profissao = :profissao, fkIdEstCivil=:estcivil WHERE id = :id";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":nome", $cliente->getNome());
            $p_sql->bindValue(":email", $cliente->getEmail());
            $p_sql->bindValue(":telefone", $cliente->getTelefone());
            $p_sql->bindValue(":endereco", $cliente->getEndereco());
            $p_sql->bindValue(":sexo", $cliente->getSexo());
            $p_sql->bindValue(":profissao", $cliente->getProfissao());
            $p_sql->bindValue(":estcivil", $cliente->getEstCivil()->getId());
            $p_sql->bindValue(":id", $cliente->getId());

            return $p_sql->execute();
        }catch (PDOException $e){
            print "Ocorreu erro ao executar a alteração";
        }
    }

    private static function inserir(Cliente $cliente){

        try {
            $sql = "INSERT INTO cliente (nome, email, telefone, endereco, sexo, profissao, fkIdEstCivil) VALUES (";
            $sql .= ":nome,";
            $sql .= ":email,";
            $sql .= ":telefone,";
            $sql .= ":endereco,";
            $sql .= ":sexo,";
            $sql .= ":profissao,";
            $sql .= ":estcivil)";

            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":nome", $cliente->getNome());
            $p_sql->bindValue(":email", $cliente->getEmail());
            $p_sql->bindValue(":telefone", $cliente->getTelefone());
            $p_sql->bindValue(":endereco", $cliente->getEndereco());
            $p_sql->bindValue(":sexo", $cliente->getSexo());
            $p_sql->bindValue(":profissao", $cliente->getProfissao());
            $p_sql->bindValue(":estcivil", $cliente->getEstCivil()->getId());

            return $p_sql->execute();
        }catch (Exception $e){
            print "Ocorreu erro ao executar a inserção";
        }
    }

    public static function excluir($id){
        try{
            $sql = "DELETE FROM cliente WHERE id = :id";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":id", $id);
            return $p_sql->execute();
        }catch (Exception $e){
            print "Ocorreu erro ao executar a exclusão";
        }
    }

    public static function buscarTodos(){
        try{
            $sql = "SELECT c.*, ec.descricao FROM cliente c INNER JOIN est_civil ec ON ec.id = c.fkIdEstCivil ORDER BY nome";
            $resultado = Conexao::getInstance()->query($sql);
            $lista = $resultado->fetchAll(PDO::FETCH_ASSOC);

            $v_lista = array();
            foreach ($lista as $il){
                $v_lista[] = self::popularCliente($il);
            }

            return $v_lista;

        }catch (Exception $e){
            print "Ocorreu um erro ao executar a consulta";
        }
    }

    public static function buscarCliente($id){
        try{
            $sql = "SELECT c.*, ec.descricao FROM cliente c INNER JOIN est_civil ec ON ec.id = c.fkIdEstCivil WHERE c.id = :id";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":id", $id);
            $p_sql->execute();
            $lista = $p_sql->fetchAll(PDO::FETCH_ASSOC);

            $cliente = new Cliente();
            foreach ($lista as $il){

                $cliente = self::popularCliente($il);
            }

            return $cliente;

        }catch (PDOException $e){
            print "Ocorreu um erro ao executar a consulta";
        }
    }

    private static function popularCliente($itemLista){
        $cliente = new Cliente();
        $cliente->setId($itemLista['id']);
        $cliente->setNome($itemLista['nome']);
        $cliente->setEmail($itemLista['email']);
        $cliente->setTelefone($itemLista['telefone']);
        $cliente->setEndereco($itemLista['endereco']);
        $cliente->setSexo($itemLista['sexo']);
        $cliente->setProfissao($itemLista['profissao']);
        $cliente->getEstCivil()->setId($itemLista['fkIdEstCivil']);
        $cliente->getEstCivil()->setDescricao($itemLista['descricao']);
        return $cliente;
    }

}