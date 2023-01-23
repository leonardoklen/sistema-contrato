<?php

namespace App\Controllers;

use App\Abstractions\Controller;
use App\Lib\Sessao;
use App\Models\DAO\AditivoDAO;
use App\Models\Entidades\Aditivo;
use Exception;

class AditivoController extends Controller
{
    public function index(): void
    {
        if (empty($_GET['idContrato'])) {
            throw new Exception("Contrato não encontrado!", 400);
        }

        $idContrato = $_GET['idContrato'];

        $aditivoDAO = new AditivoDAO();

        self::setViewParam('aditivos', $aditivoDAO->listar($idContrato));

        $this->render('Aditivo/Index');
    }

    public function salvar(): void
    {
        if (empty($_POST['idContrato'])) {
            throw new Exception("Contrato não encontrado!", 400);
        }

        $idContrato = intval($_POST['idContrato']);

        $nomeAnexoAditivo = $this->uploadAditivo();

        $aditivo = new Aditivo([
            'idContrato' => $idContrato,
            'data' => strval($_POST['data']),
            'observacao' => strval($_POST['observacao']),
            'anexo' => $nomeAnexoAditivo
        ]);

        $aditivoDAO = new AditivoDAO();

        try {
            $idAditivo = $aditivoDAO->salvar($aditivo);

            Sessao::gravaSucesso("Aditivo cadastrado com sucesso!");
        } catch (Exception $e) {
            Sessao::gravaErro("Erro ao cadastrar aditivo.");
        }

        $this->redirect('aditivo', '?idContrato=' . $idContrato);
    }

    private function uploadAditivo(): string
    {
        $extensao = strtolower(substr($_FILES['anexo']['name'], -4));

        $nomeArquivo = uniqid() . $extensao;

        if (!move_uploaded_file($_FILES['anexo']['tmp_name'], PATH_ADDITIONS . $nomeArquivo)) {
            throw new Exception("Erro ao salvar o aditivo.", 500);
        }

        return $nomeArquivo;
    }
}
