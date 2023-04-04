<?php

namespace app\model;

class Marca
{
    private $idMarca, $nome, $status;

    public function getIdMarca()
    {
        return $this->idMarca;
    }
    public function setIdMarca($idMarca)
    {
        return $this->idMarca = $idMarca;
    }

    public function getNome()
    {
        return $this->nome;
    }
    public function setNome($nome)
    {
        return $this->nome = $nome;
    }

    public function getStatus()
    {
        return $this->status;
    }
    public function setStatus($status)
    {
        return $this->status = $status;
    }


}