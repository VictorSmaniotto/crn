<?php


require_once 'helpers/Config.php';

include_once CABECALHO;
?>


<section class="container mt-5 text-center text-dark">
    <h2>Página de Projetos</h2>
    <p>Aqui estão todos os projetos cadastrados no banco</p>

    <form action="" method="POST" class="search-bar">
        <div class="col-6 mx-auto">
            <input type="text" name="buscarProjeto" id="buscarProjeto" placeholder="Procurar Projeto..." class="form-control">
            <button type="submit" ><img src="/assets/img/icons/search.svg" alt=""></button>
        </div>
    </form>

    <div class="row mt-5">
        <div class="col-lg-12">
            <h4 class="text-start">Destaques</h4>
            <div class="card-horizontal row  mb-4">
                <div class="col-lg-4">
                    <div class="card-imagem ">
                        <img src="/assets/img/cards/blogger-2838945_1280.jpg" alt="" class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-5 text-start mt-3 card-corpo">

                    <h3>Título do Projeto</h3>
                   
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Debitis quo suscipit aliquam tempore praesentium atque iure dolor non neque ratione corporis a voluptatem porro maiores accusamus illo, deserunt assumenda quae. Debitis quo suscipit aliquam tempore praesentium atque iure dolor non neque ratione corporis a voluptatem porro maiores accusamus illo, deserunt assumenda quae.</p>
                    
                    <a href="" class="btn btn-primary mt-2">Visualizar Projetos</a>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-lg-4">
                    <div class="card-vertical">
                        <div class="card-imagem">
                            <img src="assets/img/cards/entrepreneur-593371_1280.jpg" alt="" class="img-fluid">
                        </div>
                        <div class="col-lg-11 text-start mt-2">
                        <h3>Título do Projeto</h3>
                        <h5>Subtitulo do Projeto</h5>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Debitis quo suscipit aliquam tempore praesentium atque iure dolor non neque ratione corporis a voluptatem porro maiores accusamus illo, deserunt assumenda quae. Debitis quo suscipit aliquam tempore praesentium atque iure dolor non neque ratione corporis a voluptatem porro maiores accusamus illo, deserunt assumenda quae.</p>
                        </div>
                        
                </div>

            </div>

            <div class="col-lg-4">
                    <div class="card-vertical">
                        <div class="card-imagem">
                            <img src="assets/img/cards/entrepreneur-593371_1280.jpg" alt="" class="img-fluid">
                        </div>
                        <div class="col-lg-11 text-start mt-2">
                        <h3>Título do Projeto</h3>
                        <h5>Subtitulo do Projeto</h5>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Debitis quo suscipit aliquam tempore praesentium atque iure dolor non neque ratione corporis a voluptatem porro maiores accusamus illo, deserunt assumenda quae. Debitis quo suscipit aliquam tempore praesentium atque iure dolor non neque ratione corporis a voluptatem porro maiores accusamus illo, deserunt assumenda quae.</p>
                        </div>
                        
                </div>
            </div>
            <div class="col-lg-4">
                    <div class="card-vertical">
                        <div class="card-imagem">
                            <img src="assets/img/cards/entrepreneur-593371_1280.jpg" alt="" class="img-fluid">
                        </div>
                        <div class="col-lg-11 text-start mt-2">
                        <h3>Título do Projeto</h3>
                        <h5>Subtitulo do Projeto</h5>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Debitis quo suscipit aliquam tempore praesentium atque iure dolor non neque ratione corporis a voluptatem porro maiores accusamus illo, deserunt assumenda quae. Debitis quo suscipit aliquam tempore praesentium atque iure dolor non neque ratione corporis a voluptatem porro maiores accusamus illo, deserunt assumenda quae.</p>
                        </div>
                        
                </div>
            </div>
        </div>
                
        </div>
    </div>
</section>


<?php include_once RODAPE;?>