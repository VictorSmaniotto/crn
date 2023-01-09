<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/controller/UsuariosController.php';

 if(isset($_GET['deletar'])){
    deletar($_GET['deletar']);
 }else{
    $usuarios = (array)index();
 }


include_once CABECALHO;
?>

<main class="container mt-5 mb-5">

<div class="row">

            <div class="col-sm-9 mx-auto">

                <h3 class="text-center mt-4">Usuarios</h3>

                <div class="row">
                    <div class="col-12 text-end p-3">
                        <a class="btn btn-primary" href="cadastrar.php"><i class="fas fa-plus"></i>
                            Adicionar</a>
                    </div>
                </div>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Email</th>
                            <th scope="col">CPF</th>
                            <th scope="col">RA</th>
                            <th scope="col" width="140" class="text-center">Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Linha do Registro -->
                        <?php foreach($usuarios as $user) : ?>
                        <tr>
                            <th scope="row"><?= $user['id']?></th>
                            <td><?= $user['nome']?></td>
                            <td><?=$user['email']?> </td>
                            <td><?=$user['cpf']?></td>
                            <td><?=$user['ra']?> </td>
                            <td class="text-center">
                                <a class="btn btn-sm btn-light" href="/admin/usuarios/visualizar?id=<?=$user['id']?>">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a class="btn btn-sm btn-primary" href="/admin/usuarios/editar?id=<?=$user['id']?>">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a class="btn btn-sm btn-danger" href="index?deletar=<?=$user['id']?>">
                                    <i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                        <?php endforeach;?>
                        <!-- Final Linha do Registro -->
                    </tbody>
                </table>


            </div>
        </div>

</main>


<?php
include_once RODAPE;
?>