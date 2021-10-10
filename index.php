<?php
include_once 'model/Conexao.php';

session_start();
?>

<!DOCTYPE html>
<html>
<head>
<?php include_once 'public/dependencias.php' ?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Prova DEV</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <h3>Login</h3>
            </div>
        </div>
        
        <div class="row">
            <div class="col">
            </div>
            <div class="col">
                <?php
                    if(isset($_SESSION['nao_autenticado'])):
                ?>
                <div class="alert alert-danger">
                    <p>ERRO: CPF ou senha inválidos.</p>
                </div>
                <?php
                    endif;
                    unset($_SESSION['nao_autenticado']);
                ?>

                <form action="login.php" method="POST">
                    <div class="form-group">
                        CPF: <i class="fa fa-address-card"></i>
                        <input class="form-control" type="text" name="cpf" required id="cpf">
                    </div>
                    <div class="form-group">
                        Senha: <i class="fa fa-senha"></i>
                        <input type="password" class="form-control"  name="senha" required>
                    </div>
                    <div class="form-group">
                        
                    </div>
                    <input type="submit" value="Submit">
                </form>
            </div>
            <div class="col">
            </div>
        </div>
    </div>
             
</body>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>

<script type="text/javascript">
    $(document).ready(function (){
        $("#cpf").mask("000.000.000-00");
    });
</script>
