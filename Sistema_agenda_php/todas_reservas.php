<?php
    session_start();
    error_reporting(0);
    ini_set(“display_errors”, 0 );
    if(!$_SESSION["user"]){
        header("Location: confirmation.php"); 
        exit();
    }
    $user = $_SESSION["nome"];
    $sala = $_POST['sala'];
    $data = $_POST['data'];
    $hora = $_POST['horario'];

    $servername = "localhost";
    $database = "reserva_de_salas";
    $username = "root";
    $password = "";
    
    $con = mysqli_connect($servername, $username, $password, $database) or trigger_error(mysql_error(),E_USER_ERROR); 
    
    $query = "SELECT `sala`, `nomsal`, `nomuti`, `datuso`, `horuso`, `descri` FROM `reservas` ";
    if(($sala != null) || ($data != null) || ($hora != null)){
        $sala = $_POST['sala'];
        $data = $_POST['data'];
        $hora = $_POST['horario'];
        $str = "WHERE ";
        $contador = 0;
        if(($sala != null)||($data != null)||($hora != null)){
            if($sala != null){
                if($contador >= 1){
                    $str = $str . " AND ";
                }
                $contador++;
                $str = $str ." sala = ".$sala;
            }
            if($data != null){
                if($contador >= 1){
                    $str = $str . " AND ";
                }
                $contador++;
                $str = $str ." datuso = '".$data."'";
            }
            if($hora != null){
                if($contador >= 1){
                    $str = $str . " AND ";
                }
                $contador++;
                $str = $str ." horuso = '".$hora.":00'";
            }
            $query = $query.$str;
        }
    }
    $dados = mysqli_query($con, $query) or die(mysqli_error());
    $linha = mysqli_fetch_assoc($dados);
    $total = mysqli_num_rows($dados);
?>

<!DOCTYPE html> 
	<html lang = "pt-br">     
	
	<head>       
	<meta charset = "UTF-8">
    <link rel="stylesheet" type="text/css" href="styles.css"> 
		<h1> Todas as Reservas </h1>     
	</head>
	
	<body> 
        <form method="POST">
            <input type="text" name = "sala" placeholder="Sala"></br>
            <input type="date" name="data">
            
            Horário:<br>
            <select name="horario">
                <option value="" selected>Escolha</option>
                <?php 
                    $contador = 9;
                    while($contador < 18) {
                        echo "<option value='" .$contador."'> das ".$contador." ás ".($contador+1)."</option>";
                        $contador++;
                    } 
                ?>
            </select></br>
            
            <button name = "sub" value = "escolher" formaction="./todas_reservas.php">Filtrar</button>
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
                                <td><?=$linha['sala']?></td> 
                                <td><?=$linha['nomsal']?></td>  
                                <td><?=$linha['nomuti']?></td>
                                <td><?=$linha['datuso']?></td>
                                <td><?=$linha['horuso']?></td>
                                <?php 
                                    echo "<td><button type='submit' formaction='./'>Deletar</button></td>"
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