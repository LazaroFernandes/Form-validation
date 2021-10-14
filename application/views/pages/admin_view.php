<h1 class="text-center title">Formulários</h1>
<p class="envios"><strong> Total de envios: <?= $registers['rows'] ?></strong></p>
<div class="filtro">
    <a href="<?= base_url('home/admin/') ?>">
        <button class="btn-filtro">TODOS</button>
    </a>
    <a href="<?= base_url('home/admin/1') ?>">
        <button class="btn-filtro">LIVRO 1</button>
    </a>
    <a href="<?= base_url('home/admin/2') ?>">
        <button class="btn-filtro">LIVRO 2</button>
    </a>
</div>
<div class="table-responsive">
    <table class="table table-bordered table-hover">
        <thead>

            <tr>
                <th hidden>ID</th>
                <th>Livro</th>
                <th>Nome</th>
                <th>Endereço</th>
                <th>CPF</th>
                <th>Genero</th>
                <th>Opinião</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($registers['results'] as $register) : ?>
                <tr>
                    <td hidden><?= $register->id ?></td>
                    <td><?= $register->nomelivro ?></td>
                    <td><?= $register->nome  ?></td>
                    <td><?= $register->endereco  ?></td>
                    <td><?= $register->cpf ?></td>
                    <td><?= $register->nomerelacao ?></td>
                    <td><?= $register->opiniao ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>