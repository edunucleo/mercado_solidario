<?php

namespace app\model;

class Cadastro
{

    private $id, $nome, $email, $endereco, $auxilio, $data_nasc, $telefone, $renda, $moradores, $termos, $data_cadastro, $data_aprovacao, $pontos;

    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        return $this->id;
    }

    public function getNome()
    {
        return $this->nome;
    }
    public function setNome($nome)
    {
        return $this->nome;
    }

    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email)
    {
        return $this->email;
    }

    public function getEndereco()
    {
        return $this->endereco;
    }
    public function setEndereco($endereco)
    {
        return $this->endereco;
    }

    public function getAuxilio()
    {
        return $this->auxilio;
    }
    public function setAuxilio($auxilio)
    {
        return $this->auxilio;
    }

    public function getDataNasc()
    {
        return $this->nome;
    }
    public function setDataNasc($data_nasc)
    {
        return $this->data_nasc;
    }

    public function getTelefone()
    {
        return $this->telefone;
    }
    public function setTelefone($telefone)
    {
        return $this->telefone;
    }

    public function getRenda()
    {
        return $this->renda;
    }
    public function setRenda($renda)
    {
        return $this->renda;
    }

    public function getMoradores()
    {
        return $this->moradores;
    }
    public function setMoradores($moradores)
    {
        return $this->moradores;
    }

    public function getTermos()
    {
        return $this->termos;
    }
    public function setTermos($termos)
    {
        return $this->termos;
    }

    public function getDataCadastro()
    {
        return $this->data_cadastro;
    }
    public function setDataCadastro($data_cadastro)
    {
        return $this->data_cadastro;
    }

    public function getDataAprovacao()
    {
        return $this->data_aprovacao;
    }
    public function setDataAprovacao($data_aprovacao)
    {
        return $this->nome;
    }

    public function getPontos()
    {
        return $this->pontos;
    }
    public function setPontos($pontos)
    {
        return $this->pontos;
    }
}
