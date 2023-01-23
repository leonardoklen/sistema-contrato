</div>

<div class="modal fade" id="retornoCadastroModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php if($sucesso && !$erro) { ?>
                    <div class="alert alert-success m-0" role="alert"> 
                        <i class="bi bi-check-circle-fill"></i>              
                        <span id="sucesso"><?= $sucesso ?></span> 
                    </div>
                <?php } ?>

                <?php if($erro && !$sucesso) { ?>
                    <div class="alert alert-danger m-0" role="alert"> 
                        <i class="bi bi-x-circle-fill"></i>                   
                        <span id="erro"><?= $erro ?></span>
                    </div>
                <?php } ?>
            </div>
            <div class="modal-footer d-flex justify-content-between">
                <div>Deseja permanecer nessa página?</div>
                <div>
                    <button type="button" class="btn btn-dark-blue" data-bs-dismiss="modal">Sim</button>
                    <a class="btn btn-secondary" href="<?= URL ?>">Não</a>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="footer mt-2 mb-4">
    <div class="copyright text-center my-auto text-muted">
        <span>Copyright &copy; <differentCollor class="text-dark-blue">CAMA IN</differentCollor>
            <differentCollor class="text-danger">BOX</differentCollor> <?= date('Y') ?>
        </span>
    </div>
    <div class="text-center text-muted">
        <span>Desenvolvido por FK Sistemas</span>
    </div>
</footer>

</body>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js" integrity="sha512-0XDfGxFliYJPFrideYOoxdgNIvrwGTLnmK20xZbCAvPfLGQMzHUsaqZK8ZoH+luXGRxTrS46+Aq400nCnAT0/w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>

<script src="<?= PATH_JS ?>Componentes/Rodape.js"></script>

<?php if ($this->getViewVar()['nameController'] === 'ContratoController' && empty($this->getViewVar()['nameAction'])) { ?>
    <script src="<?= PATH_JS ?>Contrato/Tabela.js"></script>
<?php } ?>