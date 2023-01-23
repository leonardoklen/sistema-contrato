<?php

namespace App\Models\DAO;

use App\Abstractions\DAO;
use App\Models\Entidades\Aditivo;

class AditivoDAO extends DAO
{
    public function listar(int $idContrato): array
    {
        $sql = $this->getSqlListarAditivoPorContrato($idContrato);

        $resultado = $this->select($sql);

        return $resultado->fetchAll();
    }

    public function salvar(Aditivo $aditivo): bool
    {
        return $this->insert(
            'aditivo',
            ':id_contrato, :data, :observacao, :anexo',
            $aditivo->toArray(true, ['id'])
        );
    }

    private function getSqlListarAditivoPorContrato(int $idContrato): string
    {
        return "SELECT 
            a.id,
            a.data,
            a.observacao,
            a.anexo 
        FROM 
            aditivo a
        WHERE 
            a.id_contrato = {$idContrato}
        ";
    }
}
