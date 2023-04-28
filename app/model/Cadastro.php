<?php

namespace app\model;

class Cadastro
{

    private $id, $nome, $email, $endereco, $auxilio, $data_nasc, $telefone, $renda, $moradores, $nomes_moradores, $data_cadastro, $data_aprovacao, $pontos;

    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        return $this->id = $id;
    }

    public function getNome()
    {
        return $this->nome;
    }
    public function setNome($nome)
    {
        return $this->nome = $nome;
    }

    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email)
    {
        return $this->email = $email;
    }

    public function getEndereco()
    {
        return $this->endereco;
    }
    public function setEndereco($endereco)
    {
        return $this->endereco = $endereco;
    }

    public function getAuxilio()
    {
        return $this->auxilio;
    }
    public function setAuxilio($auxilio)
    {
        return $this->auxilio = $auxilio;
    }

    public function getDataNasc()
    {
        return $this->data_nasc;
    }
    public function setDataNasc($data_nasc)
    {
        return $this->data_nasc = $data_nasc;
    }

    public function getTelefone()
    {
        return $this->telefone;
    }
    public function setTelefone($telefone)
    {
        return $this->telefone = $telefone;
    }

    public function getRenda()
    {
        return $this->renda;
    }
    public function setRenda($renda)
    {
        return $this->renda = $renda;
    }

    public function getMoradores()
    {
        return $this->moradores;
    }
    public function setMoradores($moradores)
    {
        return $this->moradores = $moradores;
    }

    public function getNomesMoradores()
    {
        return $this->nomes_moradores;
    }
    public function setNomesMoradores($nomes_moradores)
    {
        return $this->nomes_moradores = $nomes_moradores;
    }

    public function getDataCadastro()
    {
        return $this->data_cadastro;
    }
    public function setDataCadastro($data_cadastro)
    {
        return $this->data_cadastro = $data_cadastro;
    }

    public function getDataAprovacao()
    {
        return $this->data_aprovacao;
    }
    public function setDataAprovacao($data_aprovacao)
    {
        return $this->data_aprovacao = $data_aprovacao;
    }

    public function getPontos()
    {
        return $this->pontos;
    }
    public function setPontos($pontos)
    {
        return $this->pontos = $pontos;
    }
}

