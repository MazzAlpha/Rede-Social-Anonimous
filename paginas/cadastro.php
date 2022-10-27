<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php
        include_once "../config/conexao.php";
    ?>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../styles/global.css">
    <link rel="stylesheet" href="../styles/style.css">
    <script type="text/javascript">
        function ValidaCampos(){
            let senha1 = document.getElementById('senha1');
            let senha2 = document.getElementById('senha2');
            let data = document.getElementById('data');
            let nome = document.getElementById('nome');
            let email = document.getElementById('email');
            let usuario = email.value.substring(0, email.value.indexOf("@"));
            let dominio = email.value.substring(email.value.indexOf("@")+ 1, email.value.length);

            if (senha1.value != senha2.value){
                alert('As senhas não correspondem!');
                senha2.focus();
                return false;
            }

            if ((senha1.value.length < 8)) {
                alert('Não utilize menos de 8 caracteres na sua senha...')
                senha1.focus();
                return false;
            }
            
            if ((usuario.length >=1) &&
                (dominio.length >=3) &&
                (usuario.search("@")==-1) &&
                (dominio.search("@")==-1) &&
                (usuario.search(" ")==-1) &&
                (dominio.search(" ")==-1) &&
                (dominio.search(".")!=-1) &&
                (dominio.indexOf(".") >=1)&&
                (dominio.lastIndexOf(".") < dominio.length - 1)) {
                    return true;
                } else {
                    alert('Email inválido!');
                    email.focus();
                    return false;
                }
            }
    </script>
</head>
<body>
    <div class="form">
        <?php
            if (isset($_POST['btnSubmitUsuario'])) {
                $nome = $_POST['nome'];
                $data = $_POST['data'];
                $email = $_POST['email'];
                $senha = $_POST['senha1'];
                $salt = '123';
                $sql = "call sp_cadastrar_usuario('$nome', '$data', '$email', '$senha', '$salt', @saida, @rotulo)";
                if($res=mysqli_query($con, $sql)){
                    $reg=mysqli_fetch_assoc($res);
                    $saida=$reg['saida'];
                    $rotulo=$reg['saida_rotulo'];
                    switch ($rotulo) {
                        case 'Tudo certo!':
                            $alert = 'alert-sucess';
                            break;
                        case 'Ops!':
                            $alert = 'alert-warning';
                        case 'ERRO!':
                            $alert = 'alert-danger';
                            break;
                    }
                    ?>
                    <div class="alert <?php echo $alert;?>" role="alert">
                    <h2><?php echo $rotulo; ?></h2>
                    <?php echo $saida; ?>
                    <a href="../index.php" class="button" target="_self">Voltar</a>
                    </div>
                <?php
                } else {
                    echo "Erro ao executar a query.";
                }
            }else {
        ?>
        <form class="formulario" name="f1" action="cadastro.php" method="post" onsubmit="return ValidaCampos()">
            <h2>Cadastrar</h2>

            <fieldset><legend><label for="nome">Usuário</label></legend>
            <input type="text" name="nome" id="nome" required placeholder="Nome de usuário" autocomplete="username" maxlength="40"></fieldset>

            <fieldset><legend><label for="data">Data de Nascimento</label></legend>
            <input type="date" name="data" id="data" required></fieldset>

            <fieldset><legend><label for="email">E-mail</label></legend>
            <input type="text" name="email" id="email" required placeholder="Seu e-mail" autocomplete="email" maxlength="50" aria-describedby="emailHelp"></fieldset>

            <fieldset><legend><label for="senha">Senha</label></legend><input type="password" name="senha1" id="senha1" required placeholder="Faça uma senha forte..." autocomplete="new-password" maxlength="30"></fieldset>

            <fieldset><legend><label for="senha2">Confirmação de Senha</label></legend><input type="password" name="senha2" id="senha2" required placeholder="Mesma senha novamente..." maxlength="30"></fieldset>

            <input class="button" type="submit" name="btnSubmitUsuario" value="Cadastrar">
            <a class="button" href="../index.php">Voltar</a>
        </form>
        <?php
            }
        ?>
    </div>
    <!--Fim da conexão com banco de dados-->
    <?php if(isset($con)){ mysqli_close($con);} ?>
</body>
</html>