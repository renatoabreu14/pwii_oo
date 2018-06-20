<?php
require_once "EstCivil.class.php";
require_once "Profissao.class.php";

class Cliente{
    private $id;
    private $nome;
    private $email;
    private $telefone;
    private $endereco;
    private $sexo;
    private $estCivil;
    private $profissao;

    /**
     * Cliente constructor.
     * @param $id
     */
    public function __construct()
    {
        $this->id = 0;
        $this->estCivil = new EstCivil();
        $this->profissao = new Profissao();
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
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getTelefone()
    {
        return $this->telefone;
    }

    /**
     * @param mixed $telefone
     */
    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
    }

    /**
     * @return mixed
     */
    public function getEndereco()
    {
        return $this->endereco;
    }

    /**
     * @param mixed $endereco
     */
    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;
    }

    /**
     * @return mixed
     */
    public function getSexo()
    {
        return $this->sexo;
    }

    /**
     * @param mixed $sexo
     */
    public function setSexo($sexo)
    {
        $this->sexo = $sexo;
    }

    /**
     * @return mixed
     */
    public function getProfissao()
    {
        return $this->profissao;
    }

    /**
     * @param mixed $profissao
     */
    public function setProfissao($profissao)
    {
        $this->profissao = $profissao;
    }

    /**
     * @return EstCivil
     */
    public function getEstCivil()
    {
        return $this->estCivil;
    }

    /**
     * @param EstCivil $estCivil
     */
    public function setEstCivil($estCivil)
    {
        $this->estCivil = $estCivil;
    }


}

?>