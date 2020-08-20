<?php
    session_start();
    $nomuti = $_SESSION["nome"];
    error_reporting(0);
    ini_set(“display_errors”, 0 );
    if(!$_SESSION["nome"]){
        header("Location: autenticacao.php"); 
        exit();
    }

    $servername = "localhost";
    $database = "prova";
    $username = "root";
    $password = "";
    
    $conn = new mysqli($servername, $username, $password, $database);
    
    if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT `id`, `pergunta`, `resposta` FROM `questoes`";
    
    $result = $conn->query($sql);
    
    mysqli_close($conn);

?>
<!DOCTYPE html> 
	<html lang = "pt-br">     
	
	<head>       
	<meta charset = "UTF-8">
	<link rel="stylesheet" type="text/css" href="styles.css"> 
		<title> Prova 1 </title>     
        <h1> Prova 1 </h1>     
	</head>
	
	<body> 
    <form action="resposta.php" method = "post">   
    <style>
            button{
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
            button:hover {background-color: #87fc59;}
        </style>
        <?php
        $array = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "Questão" . $row["id"].":". "<br>";
                    echo $row["pergunta"]. "<br>";
                    echo "<input type='radio' name='".$row['id']."' value='a' unchecked> A <br>";
                    echo "<input type='radio' name='".$row['id']."' value='b' unchecked> B <br>";
                    echo "<input type='radio' name='".$row['id']."' value='c' unchecked> C <br>";

                    array_push($array, $row["resposta"]);
                    echo "<br>";
                }
            } else {
                echo "0 results";
            }
            echo "<button type='submit'>Corrigir</button>"
        ?>
    </form>   
	</body> 
</html>
