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
    <link rel="stylesheet" href="assets/css/style-relatorio_chamada.css">
    <title>Relatorio da chamada</title>
</head>
<body>
    <?php
        include "autentication/includes/navbar.php";
    ?>
    
    <div class="conteudo" id="conteudo">
        <ul>

            <li class="campoInicio">
            <?php
                echo "<h3>RELATORIO DA CHAMADA ELETRÔNICA<br>({$_SESSION['container']})</h3>"
            ?>
            </li>
            <li>
                <span class="campo01">Data da Aula</span>
                <span class="campo02">Aulas</span>
                <span class="campo03">Dia Semana</span>
                <span class="campo04">Conteúdo</span>
                <span class="campo05">Marcação de Entrada</span>
                <span class="campo06">Marcação de Saída</span>
                <span class="campo07">Presenças</span>
                <span class="campo08">Faltas</span>
            </li>
            
        <?php
            include "autentication/bd_connect.php";
            $container_num = (int)substr($_SESSION["container"], -2);
            $ip = $_SERVER['REMOTE_ADDR'];

            $result = $bd->query("call processachamada($container_num,3,$ip)");
            $row = $result->fetch_assoc();

            $total_aula = 0;
            $total_presenca = 0;
            $total_faltas = 0;
            while ($row = mysql_fetch_array($result)){
            echo "
            <li>
                <span class=\"campo01\">{$row['DataAula']}</span>
                <span class=\"campo02\">{$row['NumAulas']}</span>
                <span class=\"campo03\">{$row['Semana']}</span>
                <span class=\"campo04\">{$row['conteudo']}</span>
                <span class=\"campo05\">{$row['entrada']}</span>
                <span class=\"campo06\">{$row['saida']}</span>
                <span class=\"campo07\">{$row['presenca']}</span>
                <span class=\"campo08\">{$row['faltas']}</span>
            </li>";
            $total_aula += $row['NumAulas'];
            $total_presenca += $row['presenca'];
            $total_faltas += $row['faltas'];
            } 
            $percent = ($total_aula > 0) ? ($total_presenca / $total_aula * 100) : 0;
            
            echo "
            <li class=\"total-fim\">
                <span>TOTAIS</span>
                <span>$total_aula</span>
                <span></span>
                <span>$total_presenca</span>
                <span>$total_faltas</span>
            </li>
            <li class=\"campoFim\">
                <p>PERCENTUAL DE FALTAS ATÉ ONTEM:&nbsp;<p><p class=\"statusOperação\">$percent%</p>
            </li>";
        ?>
        </ul>

    </div>
    

    
</body>
</html>