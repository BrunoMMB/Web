<?php
    $nro =      $_POST['sala'];
    $nome =     $_POST['nomsal'];
    $ativo =    $_POST['ativo'];
?>

<!DOCTYPE html> 
	<html lang = "pt-br">     
	
	<head>       
	<meta charset = "UTF-8">
	<link rel="stylesheet" type="text/css" href="styles.css"> 
		<h1>Atualizar</h1>
	</head>
	
	<body> 
	    <form method="post">
        <?php 
            echo "<input type='hidden' name='oldsala'      value='".$nro."'     '>";
            echo "<input type='hidden' name='oldnomsal'    value='".$nome."'    '>";
            echo "<input type='hidden' name='oldativo'     value='".$ativo."'   '>";

            echo "Numero da sala:<br>";
            echo "<input type='text' name='sala'      value='".$nro."' '><br><br>";
            echo "Nome da sala:<br>";
            echo "<input type='text' name='nomsal'    value='".$nome."' '><br><br>";
            echo "Ativo:<br>";
            echo "<input type='text' name='ativo'     value='".$ativo."' '><br><br>";
            echo "<input type='submit' formaction='./atualiza_agenda.php'>";
        ?>
        </form>
	</body> 
</html>