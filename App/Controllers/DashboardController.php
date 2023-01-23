<?php

namespace App\Controllers;

use App\Abstractions\Controller;
use App\Lib\Sessao;

class DashboardController extends Controller
{
    public function index(): void
    {
        $this->render('Dashboard/Index');
    }
}
