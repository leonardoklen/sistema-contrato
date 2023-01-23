<?php

namespace App\Controllers;

use App\Abstractions\Controller;
use App\Lib\Sessao;
use App\Models\DAO\ContratoDAO;
use App\Models\Entidades\Contrato;
use Exception;

class ContratoController extends Controller
{
    public function index(): void
    {
        $contratoDAO = new ContratoDAO();

        self::setViewParam('contratos', $contratoDAO->listar());

        $this->render('Contrato/Tabela');
    }

    public function cadastrar(): void
    {
        $this->render('Contrato/Formulario');
    }

    public function salvar(): void
    {
        $nomeAnexoContrato = $this->uploadContrato();

        $contrato = new Contrato([
            'id' => $_POST['idContrato'] ?? null,
            'cnpjContratante' => strval($_POST['cnpjContratante']),
            'cnpjContratado' => strval($_POST['cnpjContratado']),
            'dataAssinatura' => strval($_POST['dataAssinatura']),
            'dataVencimento' => strval($_POST['dataVencimento']),
            'idTipoContrato' => intval($_POST['idTipoContrato']),
            'idTipoRenovacao' => intval($_POST['idTipoRenovacao']),
            'idTipoCobranca' => intval($_POST['idTipoCobranca']),
            'idIndice' => intval($_POST['idIndice']),
            'multa' => $_POST['multa'],
            'avisoPrevio' => $_POST['avisoPrevio'],
            'anexo' => $nomeAnexoContrato,
            'situacao' => $_POST['situacao'],
            'idDepartamento' => intval($_POST['idDepartamento'])
        ]);

        $contratoDAO = new ContratoDAO();

        try {
            $idContrato = $contratoDAO->salvar($contrato);

            Sessao::gravaSucesso("Contrato cadastrado com sucesso!");
        } catch (Exception $e) {
            Sessao::gravaErro("Erro ao cadastrar contrato.");
        }

        $this->redirect('contrato', 'cadastrar');
    }

    private function uploadContrato(): string
    {
        $extensao = strtolower(substr($_FILES['anexoContrato']['name'], -4));

        $nomeArquivo = uniqid() . $extensao;

        if (!move_uploaded_file($_FILES['anexoContrato']['tmp_name'], PATH_CONTRACTS . $nomeArquivo)) {
            throw new Exception("Erro ao salvar o contrato.", 500);
        }

        return $nomeArquivo;
    }
}
