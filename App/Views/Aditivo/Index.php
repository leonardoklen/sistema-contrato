<?php
use Carbon\Carbon;
?>

<div class="h2 text-center mb-3 fw-bold text-dark-blue">Aditivos</div>

<div class="mt-2 p-2">
    <div class="bg-light px-4 py-2 border rounded shadow mb-3">
        <form action="<?= URL ?>aditivo/salvar" enctype="multipart/form-data" method="POST">
            <div class="row">
                <input type="text" name="idContrato" value="<?= $_GET['idContrato'] ?>" hidden>

                <div class="form-group col-xl-2 col-lg-6 mt-2 mb-3">
                    <label class="mb-2 fw-bold">Data</label>
                    <input type="date" required class="form-control" name="data">
                </div>

                <div class="form-group col-xl-6 col-lg-6 mt-2 mb-3">
                    <label class="mb-2 fw-bold">Observação</label>
                    <input type="text" required class="form-control" name="observacao">
                </div>

                <div class="form-group col-xl-2 col-lg-6 mt-2 mb-3">
                    <label class="mb-2 fw-bold">Anexar</label>
                    <input type="file" required class="form-control" name="anexo">
                </div>

                <div class="d-flex align-items-end col-xl-2 col-lg-2 mt-2 mb-3">
                    <button type="submit" class="btn btn-success w-100 fw-bold">
                        Adicionar
                    </button>
                </div>

            </div>

            <div class="d-flex align-items-center justify-content-between mt-2" id="title">
                <table class="table table-hover">
                    <thead class="bg-grey text-dark">
                        <tr>
                            <th scope="col" class="text-center">ID</th>
                            <th scope="col" class="text-center">Data</th>
                            <th scope="col" class="text-center">Observação</th>
                            <th scope="col" class="text-center">Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($this->getViewVar()['aditivos'] as $aditivo) { ?>
                            <tr class="bg-white">
                                <td class="text-center align-middle"><?= $aditivo['id'] ?></td>
                                <td class="text-center align-middle"><?= Carbon::createFromFormat('Y-m-d', $aditivo['data'])->format('d/m/Y') ?></td>
                                <td class="text-center align-middle"><?= $aditivo['observacao'] ?></td>
                                <td class="text-center align-middle">
                                    <a class="btn btn-dark-blue" href="<?= URL_ADDITIONS . $aditivo['anexo'] ?>" download>
                                        <i class="bi bi-download"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
    </div>
</div>
</form>