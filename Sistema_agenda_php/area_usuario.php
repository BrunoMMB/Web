<?php
    $sval = $_POST['sub'];
    error_reporting(0);
    ini_set(“display_errors”, 0 );
    session_start();
    if(!$_SESSION["user"]){
        header("Location: confirmation.php"); 
        exit();
    }
    $servername = "localhost";
    $database = "reserva_de_salas";
    $username = "root";
    $password = "";

    $conn = new mysqli($servername, $username, $password, $database);

    if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT `numsal` FROM `salas` group by numsal ";
    $result = $conn->query($sql);
    mysqli_close($conn);
    
    function checa_disponibilidade($nro, $dat){
        $servername = "localhost";
        $database = "reserva_de_salas";
        $username = "root";
        $password = "";

        $conn = new mysqli($servername, $username, $password, $database);

        if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "select * from `reservas` where `sala` = $nro and `datuso` = '$dat'";
        $result = $conn->query($sql);
        
        $i = 9;
        do{
            if(0 != mysqli_num_rows ($result)){
                    $row = $result->fetch_assoc();
                    while($i <= 18) {
                        $hora = $row['horuso'];
                        if($i != $hora){
                            echo "<input type='checkbox' name='option[]' value='$i'>";
                            echo "<label for='option".$i."'> Das $i às ". ($i+1) ."</label><br>";
                        }
                        if($row['horuso'].next($row) != NULL){
                            $row['horuso'].next($row);
                        }
                        $i++;
                    }
                
            }else{
                echo "<input type='checkbox' name='option[]' value='$i'>";
                echo "<label for='option".$i."'> Das $i às ". ($i+1) ."</label><br>";
            }
            $i++;
        }while($i <= 18);
        mysqli_close($conn);
    }
?>

<!DOCTYPE html> 
	<html lang = "pt-br">     
	
	<head>       
	<meta charset = "UTF-8">
	<link rel="stylesheet" type="text/css" href="styles.css"> 
		<h1> Area de usuário </h1>     
	</head>
	
	<body> 
        <form action="" method = "post">
        <div>
        Número Sala:<br>
            <select name="nomeSala">
                <option value="" selected>Escolha</option>
                <?php 
                    $contador = $result->num_rows;
                    while($contador > 0) {
                        $row = mysqli_fetch_assoc($result);
                        echo "<option value='" .$row['numsal']."'>".$row['numsal']."</option>";
                        $contador--;
                    } 
                ?>
            </select>
        </div>
        <div>
        <br>Horário:<br>
                <?php
                    if($_POST['sub'] == 'escolher'){
                        $nro = $_POST['nomeSala'];
                        $dat = $_POST['datsal'];
                        checa_disponibilidade($nro, $dat);
                    }else{
                        $i = 9;
                        do{
                            echo "<input type='checkbox' name='option[]' value='$i'>";
                            echo "<label for='option".$i."'> Das $i às ". ($i+1) ."</label><br>";
                            $i++;
                        }while($i <= 18);
                    }
                ?>
        </div><br>
            <input type="date" name = "datsal" placeholder="Data">
            <input type="text" name = "descri" placeholder="Descrição"><br><br>

            <button name = "sub" value = "escolher" formaction="./area_usuario.php">Escolher</button>
            <button name = "sub" value = "reservar" formaction="./data_area_usuario.php">Reservar</button>
        </form>
	</body> 
</html>