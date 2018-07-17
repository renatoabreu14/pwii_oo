<?php
/**
 * Created by PhpStorm.
 * User: renato
 * Date: 03/07/18
 * Time: 19:50
 */

require_once "../models/Marca.class.php";
require_once "../models/Categoria.class.php";

class Produto{

    private $id;
    private $descricao;
    private $estoque;
    private $valorUnit;
    private $marca;
    private $categoria;

    /**
     * Produto constructor.
     * @param $id
     */
    public function __construct()
    {
        $this->id = 0;
        $this->marca = new Marca();
        $this->categoria = new Categoria();
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * @param mixed $descricao
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    /**
     * @return mixed
     */
    public function getEstoque()
    {
        return $this->estoque;
    }

    /**
     * @param mixed $estoque
     */
    public function setEstoque($estoque)
    {
        $this->estoque = $estoque;
    }

    /**
     * @return mixed
     */
    public function getValorUnit()
    {
        return $this->valorUnit;
    }

    /**
     * @param mixed $valorUnit
     */
    public function setValorUnit($valorUnit)
    {
        $this->valorUnit = $valorUnit;
    }

    /**
     * @return mixed
     */
    public function getMarca()
    {
        return $this->marca;
    }

    /**
     * @param mixed $marca
     */
    public function setMarca($marca)
    {
        $this->marca = $marca;
    }

    /**
     * @return mixed
     */
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * @param mixed $categoria
     */
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;
    }

}