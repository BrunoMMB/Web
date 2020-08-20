<?php
        session_start();
        error_reporting(0);
        ini_set(“display_errors”, 0 );

        function connection($login,$senha){
                //criptografia
                $senha = md5($senha);
                
                $servername = "localhost";
                $database = "reserva_de_salas";
                $username = "root";
                $password = "";
                
                $conn = new mysqli($servername, $username, $password, $database);
                
                if (!$conn) {
                        die("Connection failed: " . mysqli_connect_error());
                }

                $sql = "SELECT * FROM `usuarios` WHERE login = '$login' and senha = '$senha'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                        $row = mysqli_fetch_assoc($result);
                        echo $_SESSION["user"] = $row["login"];
                        $_SESSION["isAdmin"] = $row["admin"];
                        $_SESSION["nome"] = $row["nome"];
                        return true;
                } else {
                        echo "<p style='color:red;'>*login ou senha incorretos</p>";
                        return false;
                }
                mysqli_close($conn);
        }
?>

<!DOCTYPE html> 
	<html lang = "pt-br">     
	
	<head>       
	<meta charset = "UTF-8">
        <link rel="stylesheet" type="text/css" href="styles.css"> 
        <h1>Tela de login</h1>
	</head>

	<body> 
        <form action="" method="post">
                <?php
                        if($_POST["login"] != null){
                                $login = $_POST["login"];
                                $senha = $_POST["senha"];
                                $isTrue = connection($login,$senha);
                                if($isTrue != false){
                                        header("Location: index.php"); 
                                        exit();
                                }
                        }
                ?>
            <input type="text" name = "login" placeholder="Identificação"></br>
            <input type="text" name = "senha" placeholder="Senha"></br>
            <input type="submit"></br>
        </form>
	</body> 
</html>
