<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Cadastro Usuário</title>

    <!-- Bootstrap core CSS -->
    <link href="<?= base_url() ?>dist/css/bootstrap.min.css" rel="stylesheet">
    

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?= base_url() ?>dist/css/signin.css" rel="stylesheet">
    

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

   <div class="container">
       <?php echo _mensagem_flashdata(); ?>
            <form class="form-signin" action="<?= base_url('usu/usuario/cadastrar') ?>" method="post">
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
                <center><h2 class="form-signin-heading">Cadastre-se</h2></center>
                <label for="inputNome" class="sr-only">Nome</label>
                <input type="text" class="form-control" name="nome" placeholder="Nome Completo" required autofocus>
                <label for="inputEmail" class="sr-only">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Email" required autofocus>
                <label for="inputPassword" class="sr-only">Senha</label>
                <input type="password" class="form-control" placeholder="Senha" name="senha" required>
                <button class="btn btn-lg btn-default btn-block" type="submit">Salvar</button>
            </form>
   </div>



    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
