<?php

namespace App\Abstractions;

use App\Lib\Sessao;

abstract class Controller
{
    protected $app;
    private $viewVar;

    public function __construct($app)
    {
        $this->setViewParam('nameController', $app->getControllerName());
        $this->setViewParam('nameAction', $app->getAction());
    }

    public function render($view)
    {
        $viewVar = $this->getViewVar();
        $sucesso = Sessao::retornaSucesso();
        $erro = Sessao::retornaErro();
        
        require_once PATH . '/App/Views/Componentes/Cabecalho.php';
        require_once PATH . '/App/Views/Componentes/Menu.php';
        require_once PATH . '/App/Views/' . $view . '.php';
        require_once PATH . '/App/Views/Componentes/Rodape.php';
    }

    public function redirect(string $controller, string $view): void
    {
        header("Location:" . URL . "{$controller}/{$view}");
    }

    public function getViewVar()
    {
        return $this->viewVar;
    }

    public function setViewParam($varName, $varValue)
    {
        if ($varName != "" && $varValue != "") {
            $this->viewVar[$varName] = $varValue;
        }
    }

    public function limpaCaracteres($valor)
    {
        $chars = array(".", "/", "-", "*", "(", ")", " ");

        return str_replace($chars, "", $valor);
    }
}
