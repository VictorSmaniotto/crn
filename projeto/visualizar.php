<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/controller/ProjetoController.php';
$projeto = visualizar($_GET['ID']);



include_once CABECALHO;
?>

<main class="container mt-5 mb-5">
<div class="row">

<div class="col-sm-9 mx-auto">

    <h3 class="text-center mt-4">Projeto</h3>

    <table class="table table-striped mt-3">
        <tr>
            <th width="180">Título</th>
            <td><?=$projeto['titulo']?></td>
        </tr>
        <tr>
            <th width="100">Descrição</th>
            <td>
                <?=$projeto['descricao']?>
            </td>
        </tr>
        <tr>
            <th width="100">Data da Publicação</th>
            <td>
                <?=$projeto['dtpublicacao']?>
            </td>
        </tr>
        <tr>
            <th width="100">Status</th>
            <td>
                <?=$plano['status']?>
            </td>
        </tr>
    </table>

    <div class="row">
        <div class="col-12 p-3">
            <a class="btn btn-primary" href="/projeto/editar?id=<?= $projeto['id'] ?>">Editar</a>
            <a class=" btn btn-light" href="index.php">Cancelar</a>
        </div>
    </div>
</div>
</div>
</main>


<?php
include_once RODAPE;
?>