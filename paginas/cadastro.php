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
                    <a href="cadastro.php" class="button" target="_self">Voltar</a>
                    </div>
                <?php
                } else {
                    echo "Erro ao executar a query.";
                }
            }else {
        ?>
        <form class="formulario" action="cadastro.php" method="post" onsubmit="ValidaCampos()">
            <h2>Cadastrar</h2>

            <fieldset><legend><label for="nome">Usuário</label></legend>
            <input type="text" name="nome" id="nome" required placeholder="Nome de usuário" autocomplete="username" maxlength="40"></fieldset>

            <fieldset><legend><label for="data">Data de Nascimento</label></legend>
            <input type="date" name="data" id="data" required></fieldset>

            <fieldset><legend><label for="email">E-mail</label></legend>
            <input type="text" name="email" id="email" required placeholder="Seu e-mail" autocomplete="email" maxlength="50" aria-describedby="emailHelp"></fieldset>

            <fieldset><legend><label for="senha">Senha</label></legend><input type="password" name="senha1" id="senha1" required placeholder="Nova senha" autocomplete="new-password" maxlength="30"></fieldset>

            <fieldset><legend><label for="senha2">Confirmação de Senha</label></legend><input type="password" name="senha2" id="senha2" required placeholder="Mesma senha novamente" maxlength="30"></fieldset>

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