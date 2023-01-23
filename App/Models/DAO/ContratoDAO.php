<?php

namespace App\Models\DAO;

use App\Abstractions\DAO;
use App\Models\Entidades\Contrato;

class ContratoDAO extends DAO
{
    public function listar(): array
    {
        $sql = $this->getSqlListarContratos();

        $resultado = $this->select($sql);

        return $resultado->fetchAll();
    }

    public function salvar(Contrato $contrato): bool
    {
        return $this->insert(
            'contrato',
            ":cnpj_contratante, :cnpj_contratado, :data_assinatura, :data_vencimento, :id_tipo_contrato, 
            :id_tipo_renovacao, :id_tipo_cobranca, :id_indice, :multa, :aviso_previo, :anexo, :situacao, :id_departamento",
            $contrato->toArray(true, ['id'])
        );
    }

    private function getSqlListarContratos(): string
    {
        return "SELECT 
            c.id,
            CONCAT(e.nome, ' - ', e.cnpj) AS empresa,
            CONCAT(f.nome, ' - ', f.cnpj) AS filial,
            CONCAT(e2.nome, ' - ', e2.cnpj) AS contratado,
            d.nome AS departamento,
            c.data_assinatura,
            c.data_vencimento,
            tc.descricao AS tipo_contrato,
            tr.descricao AS tipo_renovacao,
            tc.descricao AS tipo_cobranca,
            i.descricao AS indice,
            c.multa,
            c.aviso_previo,
            c.anexo,
            c.situacao
        FROM 
            contrato c
            INNER JOIN filial f ON c.cnpj_contratante = f.cnpj 
            INNER JOIN empresa e ON e.cnpj = f.cnpj_empresa
            INNER JOIN empresa e2 ON e2.cnpj = c.cnpj_contratado 
            INNER JOIN departamento d ON d.id = c.id_departamento 
            INNER JOIN tipo_contrato tc ON tc.id = c.id_tipo_contrato 
            INNER JOIN tipo_renovacao tr ON tr.id = c.id_tipo_renovacao 
            INNER JOIN tipo_cobranca tc2 ON tc2.id = c.id_tipo_cobranca
            INNER JOIN indice i ON i.id = c.id_indice 
        ORDER BY
            c.data_vencimento DESC";
    }
}
