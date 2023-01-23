<?php

namespace App\Lib;

class Sessao
{
    public static function gravaSucesso($mensagem)
    {
        $_SESSION['sucesso'] = $mensagem;
    }

    public static function retornaSucesso()
    {

        $mensagem = !empty($_SESSION['sucesso']) ? $_SESSION['sucesso'] : "";

        unset($_SESSION['sucesso']);

        return $mensagem;
    }

    public static function gravaErro($mensagem)
    {
        $_SESSION['erro'] = $mensagem;
    }

    public static function retornaErro()
    {
        $erro = !empty($_SESSION['erro']) ? $_SESSION['erro'] : "";

        unset($_SESSION['erro']);

        return $erro;
    }
}
