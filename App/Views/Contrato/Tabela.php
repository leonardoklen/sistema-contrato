<?php
use Carbon\Carbon;
?>

<div class="h2 text-center mb-3 fw-bold text-dark-blue">Contratos</div>

<div class="table-responsive mt-2">
    <table class="table table-striped table-hover" id="contratosTable">
        <thead>
            <tr>
                <th class="text-center align-middle">Empresa</th>
                <th class="text-center align-middle">Filial</th>
                <th class="text-center align-middle">Departamento</th>
                <th class="text-center align-middle">Contratado</th>
                <th class="text-center align-middle">Data Assinatura</th>
                <th class="text-center align-middle">Data Vencimento</th>
                <!--<th class="text-center align-middle">Tipo Contrato</th>
                <th class="text-center align-middle">Tipo Renovação</th>
                <th class="text-center align-middle">Tipo Cobrança</th>
                <th class="text-center align-middle">Índice</th>
                <th class="text-center align-middle">Multa</th>
                <th class="text-center align-middle">Aviso Prévio</th>-->
                <th class="text-center align-middle">Situação</th>
                <th class="text-center align-middle">Ação</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($this->getViewVar()['contratos'] as $contrato) { ?>
                <tr>
                    <td class="align-middle"><?= $contrato['empresa'] ?></td>
                    <td class="align-middle"><?= $contrato['filial'] ?></td>
                    <td class="align-middle"><?= $contrato['departamento'] ?></td>
                    <td class="align-middle"><?= $contrato['contratado'] ?></td>
                    <td class="text-center align-middle"><?= Carbon::createFromFormat('Y-m-d', $contrato['data_assinatura'])->format('d/m/Y') ?></td>
                    <td class="text-center align-middle"><?= Carbon::createFromFormat('Y-m-d', $contrato['data_vencimento'])->format('d/m/Y') ?></td>
                    <!--<td class="align-middle"> $contrato['tipo_contrato'] </td>
                    <td class="align-middle"> $contrato['tipo_renovacao'] </td>
                    <td class="align-middle"> $contrato['tipo_cobranca'] </td>
                    <td class="align-middle"> $contrato['indice'] </td>
                    <td class="text-center align-middle"> $contrato['multa'] ? 'Sim' : 'Não' </td>
                    <td class="text-center align-middle"> $contrato['aviso_previo'] ? 'Sim' : 'Não' </td>-->
                    <td class="text-center align-middle"><?= $contrato['aviso_previo'] ? 'Ativo' : 'Inativo' ?></td>
                    <td class="text-center align-middle">
                        <div class="d-flex justify-content-center">
                            <a class="btn btn-dark-blue me-1" href="<?= URL_CONTRACTS . $contrato['anexo'] ?>" download>
                                <i class="bi bi-download"></i>
                            </a>
                            <a class="btn btn-secondary me-1" href="<?= URL ?>aditivo?idContrato=<?= $contrato['id'] ?>">
                                <i class="bi bi-plus-circle"></i>
                            </a>
                            <button class="btn btn-warning">
                                <i class="bi bi-gear-fill"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>