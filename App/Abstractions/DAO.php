<?php

namespace App\Abstractions;

use App\Lib\Conexao;
use Exception;

abstract class DAO
{
    private $conexao;

    public function __construct()
    {
        $this->conexao = Conexao::getConnection();
    }

    public function select($sql)
    {
        if (!empty($sql)) {
            return $this->conexao->query($sql);
        }
    }

    public function insert(string $table, string $cols, array $values): int
    {
        try {
            if (!empty($table) && !empty($cols) && !empty($values)) {
                $parametros = $cols;
                $colunas = str_replace(":", "", $cols);

                $stmt = $this->conexao->prepare("INSERT INTO $table ($colunas) VALUES ($parametros)");

                $stmt->execute($values);

                return $this->conexao->lastInsertId();
            }
        } catch (Exception $e) {
            throw new Exception("Erro na gravação de dados. {$e->getMessage()}", 500);
        }
    }

    public function update($table, $cols, $values, $where = null)
    {
        if (!empty($table) && !empty($cols) && !empty($values)) {
            if ($where) {
                $where = " WHERE $where ";
            }

            $stmt = $this->conexao->prepare("UPDATE $table SET $cols $where");
            $stmt->execute($values);

            return $stmt->rowCount();
        } else {
            return false;
        }
    }

    public function delete($table, $pk, $id)
    {
        if (!empty($table)) {
            $stmt = $this->conexao->prepare("DELETE FROM $table WHERE $pk = {$id}");
            $stmt->execute();

            return $stmt->rowCount();
        } else {
            return false;
        }
    }
}
