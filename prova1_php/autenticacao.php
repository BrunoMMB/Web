<?php
        session_start();
        error_reporting(0);
        ini_set(“display_errors”, 0 );

        function connection($login,$senha){
                //criptografia
                $senha = md5($senha);
                
                $servername = "localhost";
                $database = "prova";
                $username = "root";
                $password = "";
                
                $conn = new mysqli($servername, $username, $password, $database);
                
                if (!$conn) {
                        die("Connection failed: " . mysqli_connect_error());
                }

                $sql = "SELECT * FROM `usuarios` WHERE nome = '$login' and senha = '$senha'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                        $row = mysqli_fetch_assoc($result);
                        $_SESSION["user"] = $row["nome"];
                        $_SESSION["senha"] = $row["senha"];
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

        <style>
            input[type="submit"]{
                border-radius: 5px;
                border: 2px solid black;
                color: white;
                padding: 5px 13px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                margin: 4px 2px;
                transition-duration: 0.4s;
                cursor: pointer; 

                /* cor da fonte  */
                background-color: white;
                color: rgb(2, 71, 2);
                font-weight: bold;
                border: 2px solid black;
            }
            
            /* cor de transição do botao */
            input[type="submit"]:hover {background-color: #87fc59;}
           
            input{
                border-radius: 5px;
                border: 2px solid black;
                color: white;
                padding: 5px 13px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                margin: 4px 2px;
                transition-duration: 0.4s;
                cursor: pointer; 

                /* cor da fonte  */
                background-color: white;
                color: rgb(2, 71, 2);
                font-weight: bold;
                border: 2px solid black;
            }
        </style>

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
            <input type="text" name = "login" placeholder="Nome"></br>
            <input type="text" name = "senha" placeholder="Senha"></br>
            <input type="submit"></br>
        </form>
	</body> 
</html>
