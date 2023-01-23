<?php

namespace App\Models\Entidades;

use App\Abstractions\Entity;

class Aditivo extends Entity
{
    public int $idContrato;
    public string $data;
    public string $observacao;
    public string $anexo;

    public function __construct(array $aditivo)
    {
        $this->setIdContrato($aditivo['idContrato']);
        $this->setData($aditivo['data']);
        $this->setObservacao($aditivo['observacao']);
        $this->setAnexo($aditivo['anexo']);
    }

    public function getIdContrato(): int
    {
        return $this->idContrato;
    }

    public function getData(): string
    {
        return $this->data;
    }

    public function getObservacao(): string
    {
        return $this->observacao;
    }

    public function getAnexo(): string
    {
        return $this->anexo;
    }
    
    private function setIdContrato(int $idContrato): self
    {
        $this->idContrato = $idContrato;

        return $this;
    }
    
    private function setData(string $data): self
    {
        $this->data = $data;

        return $this;
    }
    
    private function setObservacao(string $observacao): self
    {
        $this->observacao = $observacao;

        return $this;
    }

    private function setAnexo(string $anexo): self
    {
        $this->anexo = $anexo;

        return $this;
    }
}
