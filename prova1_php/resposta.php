<?php 
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
    $rowcount=mysqli_num_rows($result);
    mysqli_close($conn);

?>
<!DOCTYPE html> 
	<html lang = "pt-br">     
	
	<head>       
        <meta charset = "UTF-8">       
        <link rel="stylesheet" type="text/css" href="styles.css">
        <title> Respostas </title>     
	</head>     
	
	<body> 
        <form action="" method = "post">   
        <style>
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
            
            /* cor de transição do botao */
            input:hover {background-color: #87fc59;}
        </style>
            <?php
            $porcentagem = 0;
            $quantidade = 0;
            if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        $num = $row["id"];
                        
                        echo "Questão" . $row["id"].":". "<br>";
                        echo $row["pergunta"];
                        if($_POST["$num"] == $row["resposta"]){
                            echo " <b>Acertou!!</b>";
                            $porcentagem++;
                        }else{
                            echo " <b>Errou!</b>";
                        }
                        echo "<br><br>";
                        $quantidade++;
                    }
                } else {
                    echo "0 results";
                }
                echo "<br>";
                echo "A porcentagem de acertos foi de: <b>" . ((100 * $porcentagem)/$quantidade)."%</b>";
    
            ?>
        </form>
        </body> 
</html>