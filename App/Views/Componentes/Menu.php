<body class="bg-light">
    <nav class="navbar bg-white shadow">
        <div class="container-fluid">
            <div class="d-flex align-items-center">
                <button class="navbar-toggler bg-white me-2 shadow" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand fw-bold fs-4 m-0 d-flex align-middle" href="<?= URL ?>"><img src="<?= PATH_IMG ?>cama-inbox-icon.png" width="150px"></a>
            </div>
            <div class="d-flex align-items-center">
                <div class="btn-group">
                    <button type="button" class="d-flex align-items-center btn border-0 p-0 text-dark" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle fs-4 me-1 text-dark-blue"></i> <?= 'João Junior' ?>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a href="<?= PATH ?>user/update.php" class="dropdown-item text-end" type="button">
                                Usuário<i class="bi bi-person-gear ms-1"></i>
                            </a>
                            <a href="?logout" class="dropdown-item text-end" type="button">
                                Sair<i class="bi bi-box-arrow-right ms-1"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="offcanvas offcanvas-start bg-light" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header shadow">
                    <h5 class="offcanvas-title text-dark-blue" id="offcanvasNavbarLabel">Menu</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div>
                    <ul class="navbar-nav justify-content-end flex-grow-1">
                        <li class="nav-item">
                            <a class="nav-link px-3 border-bottom" aria-current="page" href="<?= URL ?>"><i class="text-dark-blue bi bi-bar-chart me-2"></i>Dashboard</a>
                        </li>                        
                        <li class="nav-item">
                            <a class="nav-link px-3 border-bottom" aria-current="page" href="<?= URL ?>contrato/cadastrar"><i class="text-dark-blue bi bi-journal-plus me-2"></i>Cadastrar Contrato</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-3 border-bottom" aria-current="page" href="<?= URL ?>contrato"><i class="text-dark-blue bi bi-journals me-2"></i>Contratos</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div class="bg-white div-content rounded shadow-lg">