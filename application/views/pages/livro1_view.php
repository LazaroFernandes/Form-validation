<h1 class="text-center title">LIVRO 1</h1>
<div class="texto">
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam soluta labore autem eveniet, eligendi adipisci exercitationem ab omnis. Rem cupiditate ea eos quis, velit deserunt tempora fuga eius consequatur nisi!</p>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam soluta labore autem eveniet, eligendi adipisci exercitationem ab omnis. Rem cupiditate ea eos quis, velit deserunt tempora fuga eius consequatur nisi!</p>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam soluta labore autem eveniet, eligendi adipisci exercitationem ab omnis. Rem cupiditate ea eos quis, velit deserunt tempora fuga eius consequatur nisi!</p>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam soluta labore autem eveniet, eligendi adipisci exercitationem ab omnis. Rem cupiditate ea eos quis, velit deserunt tempora fuga eius consequatur nisi!</p>
</div>

<!-- -----------------------------------------------------------------------------------------------------------
<div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <video id="video" width="1460px" height="674px" controls="controls">
                    <source src="<?= base_url('assets/img/Consulta Popular Uso e Ocupação do Solo.mp4') ?>" type="video/mp4">
                    <object data="" width="1460px" height="674px">
                        <embed width="100%" height="100%" src="<?= base_url('assets/img/Consulta Popular Uso e Ocupação do Solo.mp4') ?>">
                    </object>
                </video>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div> -->
<!-- ----------------------------------------------------------------------------------------------------------- -->
<form method="post" class="form-center" name="formlivro">
    <div class="stage_1">
        <div class="formdesign">
            <select class="form" name="livro" hidden>
                <option value="<?= $livro->idlivro ?>" id="livro"><?= $livro->nomelivro ?></option>
            </select>
            <input type="text" id="nome" name="nome" class="form required" placeholder="Nome completo *">
            <br>
            <input type="text" id="endereco" name="endereco" class="form required" placeholder="Endereço *">
            <br>
            <span id="error_cpf" class="small errors">( CPF inválido )</span>
            <input type="text" id="cpf" name="cpf" class="form required" placeholder="CPF *" autocomplete="off" maxlength="14">
            <br>
            <label class="form-label">Qual o genero do filme?</label>
            <select class="form required" id="relacao" name="relacao">
                <option value="">---</option>
                <?php foreach ($relacao as $relacao) : ?>
                    <option value="<?= $relacao->idrelacao ?>"><?= $relacao->nomerelacao ?> </option>
                <?php endforeach; ?>
            </select>
            <br>
            <label class="form-label" name="opiniao">Registre aqui sua opnião</label>
            <textarea name="opiniao" id="opiniao" cols="30" rows="10" class="form"></textarea><br>

        </div>
    </div>
</form>
<div class="buttondiv">
    <button id="button_send" class="button">Enviar</button>
</div>