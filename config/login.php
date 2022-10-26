<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php
        include_once "conexao.php";
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dados</title>
    <link rel="stylesheet" href="../styles/style.css">
</head>
<body>
    <div>
        <?php
            ;
        ?>
    </div>
    <?php if(isset($con)){ mysqli_close($con); } ?>
</body>
</html>