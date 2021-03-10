<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <title> Gerenciar Empresas</title>
</head>
<body>
    <center><h2>Gerenciar Empresas</h2></center>

    <table border='0' width='1200' height='100' align='center'>
        <tr>
            <td width='400'> 

                <?php
                    for ($letra='A'; $letra!='AA'; $letra++){
                        echo "<a href='gerenciarempresas.php?filtro=".$letra."'>".$letra." </a>";
                    }
                ?>            
                <a href='gerenciarempresas.php'> [Todos]</a>
                <br>
                <form action="" method="GET">
                    Digite a empresa que quer procurar:
                    <input type="text" name="filtro" size ="20">
                    <input type='submit' name='procurar' value="Procurar">

                </form>
               
            </td>
            <td align='right'> <form action='novaempresa.php'> <input type="submit" name='novo' value='NOVO'> </form> </td>
        </tr>
    </table>
    </center>

    <?php
        $DB_Servidor = "localhost";
        $DB_Login = "root";
        $DB_Senha = "";
        $DB_NomeBanco = "empresa";
        $DB_charset = "UTF8";


        $conexaoBanco = mysqli_connect($DB_Servidor, $DB_Login, $DB_Senha, $DB_NomeBanco) or die(mysqli_error($conexaoBanco));
        mysqli_set_charset($conexaoBanco, $DB_charset) or die(mysqli_error($conexaoBanco));



        $comandoSQL = "select * from empresa";
        if (!Empty($_GET['filtro'])){

            $filtro = $_GET['filtro'];
            $comandoSQL = "select * from empresa where Empresa like '".$filtro."%' ";
        }

        $res = mysqli_query($conexaoBanco, $comandoSQL) or die(mysqli_error($conexaoBanco));

    ?>
    <center>
    <table border='1' cellpadding='3' cellspacing='0'>
        <tr bgcolor='#5F9EA0'>
            <td width='100' align='center'><b>CNPJ</b></td>
            <td width='200' align='center'><b>Empresas</b></td>
            <td width='200' align='center'><b>Setores</b></td>
            <td width='200' align='center'><b>Funcionários</b></td>
            <td width='200' align='center'><b>CodFuncionario</b></td>
            <td width='200' align='center'><b>Patrimonio</b></td>
            <td colspan='2'></td>
        </tr>


        <?php
        $contL = 1;
        $linha = mysqli_fetch_assoc($res);
        while ($linha != null){
            if ($contL == 2) {
                echo "<tr bgcolor='lightblue'>";
                $contL = 1;
            }
            else{
                echo "<tr bgcolor='gray'>";
                $contL++;
            }
            echo "<td>".$linha['CNPJ']."</td>";
            echo "<td>".$linha['Empresa']."</td>";
            echo "<td>".$linha['Setores']."</td>";
            echo "<td>".$linha['Funcionários']."</td>";
            echo "<td>".$linha['CodFuncionario']."</td>";
            echo "<td>".$linha['Patrimonio']."</td>";
            echo "<td>".
                    "<a href='alterarempresa.php?codigo=".$linha['CNPJ']."'>".
                        "<img src='alterar.png' width='25' height='25'>".
                    "</a>".
                  "</td>";
            echo "<td>".
                    "<a href='excluirempresa.php?codigo=".$linha['CNPJ']."'>".
                        "<img src='excluir.png' width='25' height='25'>".
                    "</a>".
                "</td>";
            echo "</tr>\n";

            $linha = mysqli_fetch_assoc($res);
        }
        ?>
    </table>
    </center>
    <?php

     mysqli_close($conexaoBanco) or die(mysqli_error($conexaoBanco));

    ?>

</body>    
</html>