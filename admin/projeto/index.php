<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/controller/ProjetoController.php';

 $projetos = (array)index();


include_once CABECALHO;
?>

<main class="container mt-5 mb-5">

<div class="row">

            <div class="col-sm-9 mx-auto">

                <h3 class="text-center mt-4">Projetos</h3>

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
                            <th scope="col">Titulo</th>
                            <th scope="col">Descrição</th>
                            <th scope="col">Data da Publicado</th>
                            <th scope="col">Status</th>
                            <th scope="col" width="140" class="text-center">Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Linha do Registro -->
                        <?php foreach($projetos as $pro) : ?>
                        <tr>
                            <th scope="row"><?= $pro['id']?></th>
                            <td><?= $pro['titulo']?></td>
                            <td><?=$pro['descricao']?> </td>
                            <td><?=$pro['dtpublicacao']?></td>
                            <td><?=$pro['status']?> </td>
                            <td class="text-center">
                                <a class="btn btn-sm btn-light" href="/admin/projeto/visualizar?id=<?=$pro['id']?>">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a class="btn btn-sm btn-primary" href="/admin/projeto/editar?id=<?=$pro['id']?>">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a class="btn btn-sm btn-danger" href="index.php">
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