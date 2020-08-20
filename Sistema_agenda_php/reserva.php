<?php
    $servername = "localhost";
    $database = "reserva_de_salas";
    $username = "root";
    $password = "";
    
    $con = mysqli_connect($servername, $username, $password, $database) or trigger_error(mysql_error(),E_USER_ERROR); 
    
    $query = "SELECT * FROM reservas";
    $dados = mysqli_query($con, $query) or die(mysqli_error());
    $linha = mysqli_fetch_assoc($dados);
    $total = mysqli_num_rows($dados);
?>

<!DOCTYPE html> 
	<html lang = "pt-br">     
	
	<head>       
	<meta charset = "UTF-8">
    <link rel="stylesheet" type="text/css" href="styles.css"> 
		<h1> Salas </h1>     
	</head>
	
	<body> 
        <form method="POST">
            <table>
                <tr>
                    <th>N° da sala</th>
                    <th>Nome da Sala</th>
                    <th>Utilizador</th>
                    <th>Data</th>
                    <th>Horario</th>
                    <th>Deletar</th>
                </tr>
                    <?php
                        if($total > 0) {
                            do {
                    ?>
                            <tr>
                                <?php
                                    echo "<td> ".$linha['sala']."   <input type='hidden' value= ".$linha['sala']."      name = 'sala'>  </td>" ;
                                    echo "<td> ".$linha['nomsal']." <input type='hidden' value= '".$linha['nomsal']."'    name = 'nomsal'>  </td> ";
                                    echo "<td> ".$linha['nomuti']." <input type='hidden' value= '".$linha['nomuti']."'    name = 'nomuti'>  </td>";
                                    echo "<td> ".$linha['datuso']." <input type='hidden' value= '".$linha['datuso']."'    name = 'datuso'>  </td>";
                                    echo "<td> ".$linha['horuso']." <input type='hidden' value= '".$linha['horuso']."'    name = 'horuso'>  </td>";
                                ?>
                                <?php 
                                    echo "<td><button type='submit' formaction='./deleta_reserva.php'>Deletar</button></td>"
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