<?php

namespace App\Models\Entidades;

use App\Abstractions\Entity;

class Contrato extends Entity
{

    public ?int $id;
    public string $cnpjContratante;
    public string $cnpjContratado;
    public string $dataAssinatura;
    public string $dataVencimento;
    public int $idTipoContrato;
    public int $idTipoRenovacao;
    public int $idTipoCobranca;
    public int $idIndice;
    public int $multa;
    public int $avisoPrevio;
    public string $anexo;
    public int $situacao;
    public int $idDepartamento;

    public function __construct(array $contrato)
    {
        $this->setId($contrato['id']);
        $this->setCnpjContratante($contrato['cnpjContratante']);
        $this->setCnpjContratado($contrato['cnpjContratado']);
        $this->setDataAssinatura($contrato['dataAssinatura']);
        $this->setDataVencimento($contrato['dataVencimento']);
        $this->setIdTipoContrato($contrato['idTipoContrato']);
        $this->setIdTipoRenovacao($contrato['idTipoRenovacao']);
        $this->setIdTipoCobranca($contrato['idTipoCobranca']);
        $this->setIdIndice($contrato['idIndice']);
        $this->setMulta($contrato['multa']);
        $this->setAvisoPrevio($contrato['avisoPrevio']);
        $this->setAnexo($contrato['anexo']);
        $this->setSituacao($contrato['situacao']);
        $this->setIdDepartamento($contrato['idDepartamento']);
    }

    public function getId(): ?int
    {
        return $this->id;
    }
    
    public function getCnpjContratante(): string
    {
        return $this->cnpjContratante;
    }
    
    public function getCnpjContratado(): string
    {
        return $this->cnpjContratado;
    }
    
    public function getDataAssinatura(): string
    {
        return $this->dataAssinatura;
    }
    
    public function getDataVencimento(): string
    {
        return $this->dataVencimento;
    }
    
    public function getIdTipoContrato(): int
    {
        return $this->idTipoContrato;
    }
    
    public function getIdTipoRenovacao(): int
    {
        return $this->idTipoRenovacao;
    }
    
    public function getIdTipoCobranca(): int
    {
        return $this->idTipoCobranca;
    }
    
    public function getIdIndice(): int
    {
        return $this->idIndice;
    }
    
    public function getMulta(): bool
    {
        return $this->multa;
    }
    
    public function getAvisoPrevio(): bool
    {
        return $this->avisoPrevio;
    }
    
    public function getAnexo(): string
    {
        return $this->anexo;
    }
    
    public function getSituacao(): bool
    {
        return $this->situacao;
    }

    public function getIdDepartamento(): int
    {
        return $this->idDepartamento;
    }

    private function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    private function setCnpjContratante(string $cnpjContratante): self
    {
        $this->cnpjContratante = $cnpjContratante;

        return $this;
    }

    private function setCnpjContratado(string $cnpjContratado): self
    {
        $this->cnpjContratado = $cnpjContratado;

        return $this;
    }

    private function setDataAssinatura(string $dataAssinatura): self
    {
        $this->dataAssinatura = $dataAssinatura;

        return $this;
    }

    private function setDataVencimento(string $dataVencimento): self
    {
        $this->dataVencimento = $dataVencimento;

        return $this;
    }

    private function setIdTipoContrato(int $idTipoContrato): self
    {
        $this->idTipoContrato = $idTipoContrato;

        return $this;
    }

    private function setIdTipoRenovacao(int $idTipoRenovacao): self
    {
        $this->idTipoRenovacao = $idTipoRenovacao;

        return $this;
    }

    private function setIdTipoCobranca(int $idTipoCobranca): self
    {
        $this->idTipoCobranca = $idTipoCobranca;

        return $this;
    }

    private function setIdIndice(int $idIndice): self
    {
        $this->idIndice = $idIndice;

        return $this;
    }

    private function setMulta(bool $multa): self
    {
        $this->multa = $multa;

        return $this;
    }

    private function setAvisoPrevio(bool $avisoPrevio): self
    {
        $this->avisoPrevio = $avisoPrevio;

        return $this;
    }

    private function setAnexo(string $anexo): self
    {
        $this->anexo = $anexo;

        return $this;
    }

    private function setSituacao(bool $situacao): self
    {
        $this->situacao = $situacao;

        return $this;
    }

    private function setIdDepartamento(int $idDepartamento): self
    {
        $this->idDepartamento = $idDepartamento;

        return $this;
    }
}
