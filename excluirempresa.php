<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <title> Exluir Empresa </title>
</head>

<body>
    <center><h2> Excluir Empresa </h2>

    <?php

        if (Empty($_GET['sim']))

        {

                $DB_Servidor = "localhost";
                $DB_Login = "root";
                $DB_Senha = "";
                $DB_NomeBanco = "empresa";
                $DB_charset = "UTF8";


                $conexaoBanco = mysqli_connect($DB_Servidor, $DB_Login, $DB_Senha, $DB_NomeBanco) or die(mysqli_error($conexaoBanco));
                mysqli_set_charset($conexaoBanco, $DB_charset) or die(mysqli_error($conexaoBanco));


                $CNPJ = $_GET['codigo'];
                $comandoSQL = "select * from empresa where CNPJ = '".$CNPJ."'";
                $res = mysqli_query($conexaoBanco, $comandoSQL) or die(mysqli_error($conexaoBanco));

                $linha = mysqli_fetch_assoc($res);
                if ($linha != NULL) {
                    echo "Empresa que será apagada:<br><br>";
                    echo "CNPJ: ".$linha['CNPJ'];
                    echo "<br>Empresa: ".$linha['Empresa'];
                    echo "<br>Setores: ".$linha['Setores'];
                    echo "<br>Funcionários: ".$linha['Funcionários'];
                    echo "<br>CodFuncionario: ".$linha['CodFuncionario'];
                    echo "<br>Patrimonio: ".$linha['Patrimonio'];
                    echo "<br><br><h3>Deseja continuar a exclusão?</h3> ";


                    echo "<form action='' method='GET'>".
                            "<input type='submit' name='sim' value='Sim'>".
                            "<input type='hidden' name='codigo' value='".$linha['CNPJ']."'>".
                            "<a href='gerenciarempresas.php'> <input type='button' name='nao' value='Não'> </a>".
                         "</form>";
                    //echo "<a href='gerenciaralunos.php'> <input type='button' name='nao' value='Não'> </a>";
                }

                //<input type='button' name='nao' value='Não'>
                mysqli_close($conexaoBanco) or die(mysqli_error($conexaoBanco));
        }
        else {


            $DB_Servidor = "localhost";
            $DB_Login = "root";
            $DB_Senha = "";
            $DB_NomeBanco = "empresa";
            $DB_charset = "UTF8";


            $conexaoBanco = mysqli_connect($DB_Servidor, $DB_Login, $DB_Senha, $DB_NomeBanco) or die(mysqli_error($conexaoBanco));
            mysqli_set_charset($conexaoBanco, $DB_charset) or die(mysqli_error($conexaoBanco));

            $CNPJ = $_GET['codigo'];
            $comandoSQL = "delete from empresa where CNPJ = '".$CNPJ."'";
            $res = mysqli_query($conexaoBanco, $comandoSQL) or die(mysqli_error($conexaoBanco));
            echo "<br>Empresa Excluida<br><br>";
            echo "<a href='gerenciarempresas.php'> [Retornar ao Index] </a>";

            mysqli_close($conexaoBanco) or die(mysqli_error($conexaoBanco));

        }

    ?>

</body>
</html>