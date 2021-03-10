<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <title> Cadastrar Nova Empresa </title>
</head>

<body>
    <center><h2> Cadastrar Nova Empresa </h2>

    <?php
        if ( !Empty( $_GET['novo'] ))
        {
    ?>
                <form action="" method="GET">
                        <table border="0">
                            <tr>
                                <td align="right" width="80px">CNPJ:</td>
                                <td>
                                    <input type="text" name="iCNPJ" size="7">
                                </td>
                            </tr>
                            <tr>
                                <td align="right">Empresa:</td>
                                <td>
                                    <input type="text" name="iEmpresa" size="30">
                                </td>
                            </tr>
                            <tr>
                                <td align="right">Setores: </td>
                                <td>
                                    <input type="text" name="iSetores" size="30">
                                </td>
                            </tr>
                            <tr>
                                <td align="right">Funcionário:</td>
                                <td>
                                    <input type="text" name="iFuncionário" size="30">
                                </td>
                            </tr>
                            <tr>
                                <td align="right">CodFuncionario:</td>
                                <td>
                                    <input type="text" name="iCod" size="30">
                                </td>
                            </tr>
                            <tr>
                                <td align="right">Patrimonio:</td>
                                <td>
                                    <input type="text" name="iPatrimonio" size="30">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" align="center">
                                    <input type="submit" value="Cadastrar" name="cadastrar">
                                </td>
                            </tr>
                        </table>
                </form>

    <?php
        }
        else {
            if (!Empty($_GET['cadastrar']))
            {
                $CNPJ = $_GET['iCNPJ'];
                $Empresa = $_GET['iEmpresa'];
                $Setores = $_GET['iSetores'];
                $Funcionário = $_GET['iFuncionário'];
                $Cod = $_GET['iCod'];
                $Patrimonio = $_GET['iPatrimonio'];
                
                echo "...".$CNPJ."...".$Empresa."...".$Setores."...".$Funcionário."...".$Cod."...".$Patrimonio;

                $DB_Servidor = "localhost";
                $DB_Login = "root";
                $DB_Senha = "";
                $DB_NomeBanco = "empresa";
                $DB_charset = "UTF8";


                $conexaoBanco = mysqli_connect($DB_Servidor, $DB_Login, $DB_Senha, $DB_NomeBanco) or die(mysqli_error($conexaoBanco));
                mysqli_set_charset($conexaoBanco, $DB_charset) or die(mysqli_error($conexaoBanco));

                $comandoSQL = "insert into empresa values('".$CNPJ."','".$Empresa."','".$Setores."','".$Funcionário."','".$Cod."','".$Patrimonio."')";
                $res = mysqli_query($conexaoBanco, $comandoSQL) or die(mysqli_error($conexaoBanco));
                echo "<br><br><h3>Empresa Cadastrada</h3>";
                
                mysqli_close($conexaoBanco) or die(mysqli_error($conexaoBanco));
            }
            echo "<br><br><br><a href='gerenciarempresas.php'>[ Voltar ]</a>";
        }
    ?>
    </center>
</body>
</html>









