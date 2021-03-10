<hmtl lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <title>Alterar Empresa</title>
</head>

<body>
    <center><h2>Alterar Empresa</h2>
    
    <?php
        if (Empty( $_GET['confirmar']))
        {
                if (Empty($_GET['codigo'])){
                    echo "Erro ao selecionar a Empresa... <br><br>";
                    echo "<a href='gerenciarempresas.php'> [Voltar] </a>";
                }
                else{
                    $empalterar = $_GET['codigo'];

                    $DB_Servidor = "localhost";
                    $DB_Login = "root";
                    $DB_Senha = "";
                    $DB_NomeBanco = "empresa";
                    $DB_charset = "UTF8";

                    $conexaoBanco = mysqli_connect($DB_Servidor, $DB_Login, $DB_Senha, $DB_NomeBanco) or die(mysqli_error($conexaoBanco));
                    mysqli_set_charset($conexaoBanco, $DB_charset) or die(mysqli_error($conexaoBanco));    
                    
                    $comandoSQL = "select * from empresa where CNPJ = '".$empalterar."'";

                    $res = mysqli_query($conexaoBanco, $comandoSQL) or die(mysqli_error($conexaoBanco));

                    $linha = mysqli_fetch_assoc($res);
                    if ($linha == NULL){
                        echo "Empresa não encontrada <br><br>";
                        echo "<a href='gerenciarempresas.php'> [Retornar ao Index]</a>";
                    }
                    else{
    ?>
                            <form action="" method="GET">
                                <table border="0">
                                        <tr>
                                            <td align="right" width="80px">CNPJ:</td>
                                            <td>
                                                <strong><?php echo $linha['CNPJ'];?></strong>
                                                <input type="hidden" name="iCNPJ" size="20" value='<?php echo $linha['CNPJ']; ?>'>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="right">Empresa:</td>
                                            <td>
                                                <input type="text" name="iEmpresa" size="30" value='<?php echo $linha['Empresa'];?>'>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="right">Setores: </td>
                                            <td>
                                                <input type="text" name="iSetores" size="30" value='<?php echo $linha['Setores'];?>'>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="right">Funcionário:</td>
                                            <td>
                                                <input type="text" name="iFuncionários" size="30" value='<?php echo $linha['Funcionários'];?>'>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="right">CodFuncionario:</td>
                                            <td>
                                                <input type="text" name="iCod" size="30" value='<?php echo $linha['CodFuncionario'];?>'>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="right">Patrimonio:</td>
                                            <td>
                                                <input type="text" name="iPatrimonio" size="30" value='<?php echo $linha['Patrimonio'];?>'>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" align="center">
                                                <input type="submit" value="Confirmar" name="confirmar" >
                                            </td>
                                        </tr>
                                    </table>
                            </form>
    <?php
                    }
                    mysqli_close($conexaoBanco) or die(mysqli_error($conexaoBanco));
                }
        }
        else {

                $CNPJ = $_GET['iCNPJ'];
                $Empresa = $_GET['iEmpresa'];
                $Setores = $_GET['iSetores'];
                $Funcionário = $_GET['iFuncionários'];
                $Cod = $_GET['iCod'];
                $Patrimonio = $_GET['iPatrimonio'];
                        

                $DB_Servidor = "localhost";
                $DB_Login = "root";
                $DB_Senha = "";
                $DB_NomeBanco = "empresa";
                $DB_charset = "UTF8";

                $conexaoBanco = mysqli_connect($DB_Servidor, $DB_Login, $DB_Senha, $DB_NomeBanco) or die(mysqli_error($conexaoBanco));
                mysqli_set_charset($conexaoBanco, $DB_charset) or die(mysqli_error($conexaoBanco));

                $comandoSQL = "update empresa ".
                    "set Empresa = '".$Empresa."', Setores = '".$Setores."', Funcionários = '".$Funcionário."', CodFuncionario = '".$Cod."', Patrimonio = '".$Patrimonio."'".
                    " where CNPJ = '".$CNPJ."'";

                $res = mysqli_query($conexaoBanco, $comandoSQL) or die(mysqli_error($conexaoBanco));
                  
                echo "Empresa Alterada";
                echo "<br><br><br><a href='gerenciarempresas.php'>[Voltar] </a>";
            }

    ?>


</center>
</body>
</html>
