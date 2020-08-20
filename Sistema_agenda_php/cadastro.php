<?php
    session_start();
    $nomuti = $_SESSION["nome"];
    error_reporting(0);
    ini_set(“display_errors”, 0 );
    if(!$_SESSION["user"]){
        header("Location: confirmation.php"); 
        exit();
    }

    $numsal = $_POST["NumSala"];
    $nomsal = $_POST["NomSala"];
    $ativo  = $_POST["ativo"];
    $horuso = $_POST["horuso"];
    $horuso = $horuso . ":00";

    $servername = "localhost";
    $database = "reserva_de_salas";
    $username = "root";
    $password = "";
    
    $conn = new mysqli($servername, $username, $password, $database);
    
    if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "INSERT INTO `salas`(`numsal`, `nome`, `nomuti`, `ativo`, `horuso`) "
    ."VALUES ($numsal,'$nomsal','$nomuti',$ativo,'$horuso')";
    
    $result = $conn->query($sql);
    
    mysqli_close($conn);
?>

<!DOCTYPE html> 
	<html lang = "pt-br">     
	
	<head>       
	<meta charset = "UTF-8">
    <link rel="stylesheet" type="text/css" href="styles.css"> 
        <h1>Cadastro de Salas</h1>
	</head>

	<body> 
        <form action="./cadastro.php" method="post">
            <input type="text" name = "NumSala" placeholder="Número da sala"></br>
            <input type="text" name = "NomSala" placeholder="Nome da sala"></br>
            
            </br>Ativo:<br>
            <select id="ativo" name="ativo">
                <option value="" selected>Selecione</option>
                <option value="1">ativo</option>
                <option value="0">inativo</option>
            </select></br></br>

            Horário:<br>
                <select name="horuso">
                    <option value="" selected>Escolha</option>
                    <?php 
                        $contador = 9;
                        while($contador < 18) {
                            echo "<option value='" .$contador."'> das ".$contador." ás ".($contador+1)."</option>";
                            $contador++;
                        } 
                    ?>
                </select>
            <input type="submit" value = "Cadastrar"></br>
        </form>
	</body> 
</html>