<?php include_once '../public/dependencias.php'?>

<h2 class="text-center">
    Inserir Usuário <i class="fa fa-users"></i>
</h2>

<form method="post" action="../controller/insert_user.php">
    <div class="container">
            <div class="form-group">
                Nome: <i class="fa fa-user"></i>
                <input class="form-control" type="text" name="nome" required autofocus>
            </div>
            <div class="form-group">
                E-Mail: <i class="fa fa-envelope"></i>
                <input class="form-control" type="email" name="email" required>
            </div>
            <div class="form-group">
                Senha: <i class="fa fa-senha"></i>
                <input type="password" class="form-control" type="senha" name="senha" required>
            </div>
            <div class="form-group">
                Repita a senha: <i class="fa fa-rep_senha"></i>
                <input type="password" class="form-control" type="senha" name="senha" required>
            </div>            
            <div class="form-group">
                CPF: <i class="fa fa-address-card"></i>
                <input class="form-control" type="text" name="cpf" required id="cpf">
            </div>
            <div class="form-group">
                Dt. de Nascimento: <i class="fa fa-calendar"></i>
                <input class="form-control" type="date" name="dtnascimento" required>
            </div>
            <div class="form-group">
                Telefone: <i class="fab fa-whatsapp"></i>
                <input class="form-control" type="text" name="Telefone" required id="phone">
            </div>
            <div class="form-group">
                Endereço: <i class="fa fa-map"></i>
                <input class="form-control" type="text" name="Endereco" required><br>
                <div class="form-group">
                Certificado: <i class="certificado.php"></i>
                <input class="form-control" type="file" name="Certificado" required id="fileToUpload">
            </div>
            <div class="form-group">
                <a class="btn btn-success btn-lg" href="../index.php">
                    Voltar <i class="fa fa-arrow-circle-left"></i>
                </a>
                <button class="btn btn-primary btn-lg">
                    Inserir Usuário <i class="fa fa-user-plus"></i>
                </button>
            
            </div>
    </div>
</form>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>

<script type="text/javascript">
    $(document).ready(function (){
        $("#cpf").mask("000.000.000-00");
        $("#phone").mask("(00) 00000-0000");
    });
</script>
