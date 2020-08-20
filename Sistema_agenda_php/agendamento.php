<?php
    session_start();
    
    $servername = "localhost";
    $database = "reserva_de_salas";
    $username = "root";
    $password = "";
    
    $con = mysqli_connect($servername, $username, $password, $database) or trigger_error(mysql_error(),E_USER_ERROR); 
    
    $query = "SELECT * FROM salas WHERE ativo = '1' group by numsal";
    $dados = mysqli_query($con, $query) or die(mysqli_error());
    $linha = mysqli_fetch_assoc($dados);
    $total = mysqli_num_rows($dados);
?>

<!DOCTYPE html> 
	<html lang = "pt-br">     
	
	<head>       
	<meta charset = "UTF-8">
    <link rel="stylesheet" type="text/css" href="styles.css"> 
		<h1> Salas Ativas </h1>     
	</head>
	
	<body> 
        <form method="POST">
            <table>
                <tr>
                    <th>N° da sala</th>
                    <th>Nome</th>
                    <th>Ativo</th>
                    <th>Atualizar</th>
                    <th>Deletar</th>
                </tr>
                    <?php
                        if($total > 0) {
                            do {
                    ?>
                            <tr>
                                <?php 
                                    echo "<td> "  .$linha['numsal']   ." <input type='hidden' value= "   .$linha['numsal']   ."  name = 'sala'>  </td>" ;
                                    echo "<td> "  .$linha['nome']     ." <input type='hidden' value= '"  .$linha['nome']     ."' name = 'nomsal'>  </td> ";
                                    echo "<td> "  .$linha['ativo']    ." <input type='hidden' value= '"  .$linha['ativo']    ."' name = 'ativo'>  </td>";
                                    echo "<td><button type='submit' formaction='./atualiza.php'>Atualizar</button></td>";
                                    echo "<td><button type='submit' formaction='./deleta_agenda.php'>Deletar</button></td>";
                                ?>
                            </tr>
                    <?php
                            }while($linha = mysqli_fetch_assoc($dados));
                        }
                    ?>
            </table>   
        </form>
	</body> 
</html>

<?php
    mysqli_free_result($dados);
?>