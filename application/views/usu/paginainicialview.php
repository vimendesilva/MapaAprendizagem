<section>
    <div class="container">
        <?php echo _mensagem_flashdata(); ?>
        <div class="row">
            <div class="col-sm-6">
                <div class="row">
                    <div class="col-sm-12">
                        <h1 class="page-header">Sobre</h1>  
                        <p>
                            Esta é uma ferramenta web de apoio à validação de Mapas de Aprendizagem para MOOCs. Planejada e desenvolvida para professores interessados e que precisam de apoio e orientação para construir e validar Mapas de Aprendizagem que atendam às necessidades requeridas para cursos nessa modalidade.
                        </p>
                        <br>
                        <p>A ferramenta permite ao professor/instrutor de MOOC validar o Mapa de Aprendizagem, considerando dimensões e questões que representam características desejadas para projetos de MOOCs.
                        </p>
                    </div>

                </div>

            </div>   
            <div class="col-sm-6">

                <h1 class="page-header">Login</h1>  

                <form class="form-signin" action="<?= base_url('admin/acesso/logar') ?>" method="post">
                    <?php if (isset($alert)) { ?>
                        <div class="alert alert-<?php
                        $a = explode('-', isset($alert) ? $alert : '');
                        echo $a[0];
                        ?>">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <?php
                            $a = explode('-', isset($alert) ? $alert : '');
                            echo $a[1];
                            ?>
                        </div>
                    <?php } ?>


                    <label for="inputEmail" class="sr-only">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Email" required autofocus>
                    <br>
                    <label for="inputPassword" class="sr-only">Senha</label>
                    <input type="password" class="form-control" placeholder="Senha" name="senha" required>
                    <br>
                    <button class="btn btn-lg btn-default btn-block" type="submit">Acessar</button>
                </form>
                
                <a href="<?= base_url('usu/usuario') ?>" >Não possui conta? Inscreva-se!</a>
                
            </div>
        </div>
    </div>
</section>