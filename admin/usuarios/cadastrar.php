<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/controller/UsuariosController.php';

$usuarios = cadastrar();

include_once CABECALHO;
?>

<main class="container mt-5 mb-5">
    <div class="col-sm-9 mx-auto">

        <h3 class="text-center m-4">Cadastrar Projeto</h3>

        <form action="/admin/usuarios/cadastrar.php" method="post" class="row g-3">

            <?php include_once '_formulario.php' ?>

        </form>

        </div>
    </div>
</main>


<?php
include_once RODAPE;
?>