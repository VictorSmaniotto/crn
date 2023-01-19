<?php


require_once 'helpers/Config.php';

include_once CABECALHO;
?>

<main class="container">
    <h1 class="text-primary text-center mt-5">Galeria de Projetos</h1>

    <p>texto .....</p>

    <form action="" method="POST" class="search-bar">
        <div class="col-6 mx-auto">
            <input type="text" name="buscarProjeto" id="buscarProjeto" placeholder="Procurar Projeto..." class="form-control">
            <button type="submit" ><img src="/assets/img/icons/search.svg" alt=""></button>
        </div>
    </form>




</main>

<?php include_once RODAPE;?>