<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/controller/UsuariosController.php';
$usuarios = (array)visualizar($_GET['id']);



include_once CABECALHO;
?>

<main class="container mt-5 mb-5">
<div class="row">

<div class="col-sm-9 mx-auto">

    <h3 class="text-center mt-4">Usuario</h3>

    <table class="table table-striped mt-3">
        <tr>
            <th width="180">Nome</th>
            <td><?=$usuarios['nome']?></td>
        </tr>
        <tr>
            <th width="100">Email</th>
            <td>
                <?=$usuarios['email']?>
            </td>
        </tr>
        <tr>
            <th width="100">Senha</th>
            <td>
                <?=$usuarios['senha']?>
            </td>
        </tr>
        <tr>
            <th width="100">Token</th>
            <td>
                <?=$usuarios['token']?>
            </td>
        </tr>
        <tr>
            <th width="100">CPF</th>
            <td>
                <?=$usuarios['cpf']?>
            </td>
        </tr>
        <tr>
            <th width="100">RA</th>
            <td>
                <?=$usuarios['ra']?>
            </td>
        </tr>
        <tr>
            <th width="100">Foto</th>
            <td>
                <?=$usuarios['foto']?>
            </td>
        </tr>
        <tr>
            <th width="100">Data de Nascimento</th>
            <td>
                <?=$usuarios['dtnascimento']?>
            </td>
        </tr>
        <tr>
            <th width="100">Data de Cadastro</th>
            <td>
                <?=$usuarios['dtcadastro']?>
            </td>
        </tr>
        <tr>
            <th width="100">Nível</th>
            <td>
                <?=$usuarios['nivel']?>
            </td>
        </tr>
        <tr>
            <th width="100">Situação</th>
            <td>
                <?=$usuarios['situacao']?>
            </td>
        </tr>
    </table>

    <div class="row">
        <div class="col-12 p-3">
            <a class="btn btn-primary" href="/admin/usuarios/editar?id=<?=$usuarios['id']?>">Editar</a>
            <a class=" btn btn-light" href="/admin/usuarios/index.php">Cancelar</a>
        </div>
    </div>
</div>
</div>
</main>


<?php
include_once RODAPE;
?>