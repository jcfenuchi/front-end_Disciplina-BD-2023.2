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
    <link rel="stylesheet" href="assets/css/style-chamada.css">
    <title>Chamada</title>
</head>
<body>
    <?php
        include "autentication/includes/navbar.php";
    ?>

    <div class="conteudo" id="conteudo">
        
        
        <ul>
            <li class="campoInicio">
            <?php
                echo "<h3>CHAMADA ELETRÔNICA<br>({$_SESSION['container']})</h3>"
            ?>
            </li>
            <li>
                <span class="campo01">Turma</span>
                <span class="campo02">Início da aula</span>
                <span class="campo03">Fim da aula</span>
                <span class="campo04">Ação</span>
            </li>
            <?php
            include "autentication/bd_connect.php";
            $container_num = (int)substr($_SESSION["container"], -2);
            $ip = $_SERVER['REMOTE_ADDR'];

            $result = $bd->query("call processachamada($container_num,0,$ip)");
            $row = $result->fetch_assoc();

            $return_code = $row['codigo'];
            $siglaturma = $row['siglaturma'];
            $inicio_aula = $row['inicioAula'];
            $fim_aula = $row['fimAula'];
            echo "
            <li>
                <span class=\"campo01\">$siglaturma</span>
                <span class=\"campo02\">$inicio_aula</span>
                <span class=\"campo03\">$fimaula</span>
            ";

            if ($return_code == 1) {
            echo "
            <form action=\"autentications/actions_chamada/entrada.php\" method=\"POST\">
                <span class=\"campo04\">
                    <button class=\"button\" type=\"submit\">Entrada</button>
                </span>
            </form>"; 
            } elseif ($return_code == 2) {
                echo "
            <form action=\"autentications/actions_chamada/saida.php\" method=\"POST\">
                <span class=\"campo04\">
                    <button class=\"button\" type=\"submit\">Saida</button>
                </span>
            </form>"; 
            } else {
                echo "
            <form action=\"chamada.php\" method=\"POST\">
                <span class=\"campo04\">
                    <button class=\"button\" type=\"submit\">Tenta Novamente</button>
                </span>
            </form>";
            $msg = $row['msg'];
                echo "
            <li class=\"campoFim\">
                <p>Estado da última operação:&nbsp;<p><p class=\"statusOperação\">$msg</p>
            </li>";
            }
            ?>
            <form action="relatorio_chamada.php" method="POST">
                <button class="button" type="submit">Relatório da chamada</button>
            </form>
        </ul>

    </div>
    

    
</body>
</html>