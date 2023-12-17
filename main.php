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
    <link rel="stylesheet" href="assets/css/style-main.css">

    <title>Main Menu</title>
</head>
<body>
    <?php
        include "autentication/includes/navbar.php";
    ?>
    
    <div class="conteudo" id="conteudo">
        
        
        <ul>
            <li class="campoInicio">
            <?php
                echo "<h3>BEM VINDO!<br>({$_SESSION['container']})</h3>"
            ?> 
            </li>
            <li>
                <span class="campo01">Turma</span>
                <span class="campo02">Início da aula</span>
                <span class="campo03">Fim da aula</span>
                <span class="campo04">Ação</span>
            </li>
            <li>
                <span class="campo01">info</span>
                <span class="campo02">info2</span>
                <span class="campo03">info3</span>
                <span class="campo04"><button class="button" type="button">Outro</button></span>
            </li>
            <li class="campoFim">
                <p>Estado da última operação:&nbsp;<p><p class="statusOperação">Sem aulas para marcacao de chamada neste horario!</p>
            </li>
        </ul>

    </div>
    

    
</body>
</html>