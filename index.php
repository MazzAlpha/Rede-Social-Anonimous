<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php
        include_once "config/conexao.php";
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles/global.css">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="shortcut icon" href="images/Logo.png" type="image/x-icon">
</head>
<body>
    <div class="form">
        <?php
            if (isset($_POST['SubmitUsuario'])) {
                $login = $_POST['login'];
                $senha = $_POST['senha1'];
                $sql = "call sp_logar_usuario('$login', '$senha', @saida, @rotulo)";
                if($res=mysqli_query($con, $sql)){
                    $reg=mysqli_fetch_assoc($res);
                    $saida=$reg['saida'];
                    $rotulo=$reg['saida_rotulo'];
                    switch ($rotulo) {
                        case 'Tudo certo!':
                            $alert = 'alert-sucess';
                            break;
                        case 'ERRO!':
                            $alert = 'alert-danger';
                            break;
                    }
                    ?>
                    <div class="alert <?php echo $alert;?>" role="alert">
                    <h2><?php echo $rotulo; ?></h2>
                    <?php echo $saida; ?>
                    <a href="index.php" class="button" target="_self">Voltar</a>
                    </div>
                <?php
                } else {
                    echo "Erro ao executar a query.";
                }
            }else {
        ?>
        <h1><img src="images/Logo-50.png" alt="Logo MazzAlpha"> nonimous</h1>
        <p>Rede anônima sem viés político nem coleta de dados pessoais.</p>
        <form class="formulario" method="post">
            <fieldset><legend><label for="login">Usuário</label></legend>
            <input type="text" name="login" id="login" required placeholder="Nome de usuário" autocomplete="username"></fieldset>
            <fieldset><legend><label for="senha">Senha</label></legend><input type="password" name="senha" id="senha" required placeholder="Senha do usuário" autocomplete="current-password"></fieldset>
            <input class="button" type="submit" value="Entrar" name="SubmitUsuario">
            <a class="link" href="#">Esqueci a senha</a>
            <a href="paginas/cadastro.php"><input class="button" type="button" value="Cadastre-se"></a>
        </form>
        <?php
            }
        ?>
    </div>
    <footer>
        <p>© MazzAlpha</p>
    </footer>
    <!--Fim da conexão com banco de dados-->
    <?php if(isset($con)){ mysqli_close($con);} ?>
</body>
</html>