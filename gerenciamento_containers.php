<?php
Session_start();
if (!($_SESSION["autenticado"]))
        header("Location: index.php");
?>

<!DOCTYPE html>
<html lang="pt-BR>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style-gerenciamento_containers.css">

    <title>Gerenciamento dos containers</title>
</head>
<body>
    <?php
        include "autentication/includes/navbar.php";
    ?>
    
    <div class="conteudo" id="conteudo">
        
        
        <ul>
            <li class="campoInicio">
            <?php
                echo "<h3>ADMINISTRAÇÃO DOS CONTAINERS<br>({$_SESSION['container']})</h3>"
            ?>
            </li>
            <li>
                <span class="campo01">Container</span>
                <span class="campo02">Estado</span>
                <span class="campo03">Condição</span>
                <span class="campo04">Internet</span>
                <span class="campo05">Operação</span>
            </li>
            <?php
            $container_num = (int)substr($_SESSION["container"], -3);
            echo "
            <li>
                <span class=\"campo01\">$container_num</span>
                <span class=\"campo02\">PARADO</span>
                <span class=\"campo03\">NORMAL</span>
                <span class=\"campo04\">SEM INTERNET</span>
                <span class=\"campo05\">
                    <button class=\"button\" type=\"button\">Iniciar</button>
                    <button class=\"button\" type=\"button\">Backup</button>
                    <button class=\"button\" type=\"button\">Apagar</button>
                </span>
            </li>";
            ?>
        </ul>

    </div>
    

    
</body>
</html>