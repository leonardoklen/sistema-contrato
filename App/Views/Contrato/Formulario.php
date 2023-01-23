<div class="h2 text-center mb-3 fw-bold text-dark-blue">Contrato</div>

<div class="mt-2 p-2">
    <div class="bg-light px-4 py-2 border rounded shadow mb-3">
        <form action="<?= URL ?>contrato/salvar" enctype="multipart/form-data" method="POST">
            <div class="row">
                <h3 class="fw-bold col-xl-12 mt-3 text-dark-blue">Contratante</h3>
                <hr>
                <div class="form-group col-xl-4 mt-2 mb-3">
                    <label class="mb-2 fw-bold">Empresa</label>
                    <select class="form-select" type="integer" name="cnpjEmpresa" required>
                        <option selected disabled>Selecione</option>
                        <option value='29149966000258'>CAMA INBOX INDUSTRIA E COMERCIO DE MOVEIS LTDA - 29149966000258</option>
                    </select>
                </div>

                <div class="form-group col-xl-4 mt-2 mb-3">
                    <label class="mb-2 fw-bold">Filial</label>
                    <select class="form-select" type="integer" name="cnpjContratante" required>
                        <option selected disabled>Selecione</option>
                        <option value='90263242000160'>FL 1 - Umuarama-PR</option>
                        <option value='56716075000128'>FL 2 - Cianorte-PR</option>
                    </select>
                </div>

                <div class="form-group col-xl-4 mt-2 mb-3">
                    <label class="mb-2 fw-bold">Departamento</label>
                    <select class="form-select" type="integer" name="idDepartamento" required>
                        <option selected disabled>Selecione</option>
                        <option value='1'>Financeiro - CC 25001</option>
                        <option value='2'>Cobrança - CC 26001</option>
                    </select>
                </div>

                <h3 class="fw-bold col-xl-12 mt-4 text-dark-blue">Contratado</h3>
                <hr>
                <div class="form-group col-xl-4 mt-2 mb-3">
                    <label class="mb-2 fw-bold">Empresa</label>
                    <select class="form-select" type="integer" name="cnpjContratado" required>
                        <option selected disabled>Selecione</option>
                        <option value='78467576000150'>FK Sistemas - 78467576000150</option>
                    </select>
                </div>

                <h3 class="fw-bold col-xl-12 mt-4 text-dark-blue">Informações</h3>
                <hr>
                <div class="form-group col-xl-4 col-lg-6 mt-2 mb-3">
                    <label class="mb-2 fw-bold">Data de Assinatura</label>
                    <input type="date" class="form-control" name="dataAssinatura" required>
                </div>

                <div class="form-group col-xl-4 col-lg-6 mt-2 mb-3">
                    <label class="mb-2 fw-bold">Data de Vencimento</label>
                    <input type="date" class="form-control" name="dataVencimento" required>
                </div>

                <div class="form-group col-xl-4 col-lg-6 mt-2 mb-3">
                    <label class="mb-2 fw-bold">Tipo de Contrato</label>
                    <select class="form-select" type="integer" name="idTipoContrato" required>
                        <option selected disabled>Selecione</option>
                        <option value='1'>Tempo determinado</option>
                        <option value='2'>Tempo indeterminado</option>
                    </select>
                </div>

                <div class="form-group col-xl-4 col-lg-6 mt-2 mb-3">
                    <label class="mb-2 fw-bold">Tipo de Renovação</label>
                    <select class="form-select" type="integer" name="idTipoRenovacao" required>
                        <option selected disabled>Selecione</option>
                        <option value='1'>Anual</option>
                        <option value='2'>Semestral</option>
                    </select>
                </div>

                <div class="form-group col-xl-4 col-lg-6 mt-2 mb-3">
                    <label class="mb-2 fw-bold">Tipo de Cobrança</label>
                    <select class="form-select" type="integer" name="idTipoCobranca" required>
                        <option selected disabled>Selecione</option>
                        <option value='1'>Assessoria jurídica</option>
                        <option value='2'>E-mail</option>
                    </select>
                </div>

                <div class="form-group col-xl-4 col-lg-6 mt-2 mb-3">
                    <label class="mb-2 fw-bold">Indíce</label>
                    <select class="form-select" type="integer" name="idIndice" required>
                        <option selected disabled>Selecione</option>
                        <option value='1'>IGP-M</option>
                        <option value='2'>IPCA</option>
                    </select>
                </div>

                <div class="form-group col-xl-4 col-lg-6 mt-2 mb-3">
                    <label class="mb-2 fw-bold">Multa</label>
                    <select class="form-select" type="integer" name="multa" required>
                        <option selected disabled>Selecione</option>
                        <option value='1'>Ativo</option>
                        <option value='0'>Inativo</option>
                    </select>
                </div>

                <div class="form-group col-xl-4 col-lg-6 mt-2 mb-3">
                    <label class="mb-2 fw-bold">Aviso Prévio</label>
                    <select class="form-select" type="integer" name="avisoPrevio" required>
                        <option selected disabled>Selecione</option>
                        <option value='1'>Ativo</option>
                        <option value='0'>Inativo</option>
                    </select>
                </div>

                <div class="col-xl-4"></div>

                <div class="form-group col-xl-3 col-lg-6 mt-4 mb-4">
                    <label class="mb-2 fw-bold">Anexar Contrato</label>
                    <input type="file" class="form-control" name="anexoContrato" required>
                </div>

                <div class="form-group col-xl-2 col-lg-6 mt-4 mb-4">
                    <label class="mb-2 fw-bold">Situação</label>
                    <select class="form-select" type="integer" name="situacao" required>
                        <option selected disabled>Selecione</option>
                        <option value='1'>Ativo</option>
                        <option value='0'>Inativo</option>
                    </select>
                </div>

                <hr class="mt-4">

                <div class="d-flex align-items-end col-xl-12 mt-2 mb-3">
                    <button type="submit" class="btn btn-success fw-bold">
                        Cadastrar
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>