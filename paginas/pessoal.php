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
    <link rel="stylesheet" href="../styles/pessoal.css">
    <link rel="shortcut icon" href="../images/Logo.png" type="image/x-icon">
</head>
<header>
        <img src="../images/Logo-50.png" alt="Logo MazzAlpha">
        <a class="button" href="../index.php">Logoff</a>
    </header>
<body>
    <div class="subheader">
        <div class="background"></div>
        <div class="imguser"><img src="../images/perfil.jpg" alt="Imagem Perfil Usuario"></div>
        <div class="nameuser"><h1>Juan Mazzaro</h1></div>
    </div>
    <main>
        <div class="posts">
            <input class="into" type="text" name="txtarea" id="txtarea">
            <input class="buttonpost" type="button" value="enviar">
        </div>
    </main>    
</body>
<footer>
    <p>© MazzAlpha</p>
</footer>
</html>