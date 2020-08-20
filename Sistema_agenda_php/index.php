<?php
    session_start();
    if(!$_SESSION["user"]){
        header("Location: confirmation.php"); 
        exit();
    }else{
?>
<!DOCTYPE html> 
	<html lang = "pt-br">     
	
	<head>       
	<meta charset = "UTF-8">
	<link rel="stylesheet" type="text/css" href="styles.css"> 
		<h1> Menu </h1>     
	</head>
	
	<body> 
        <form action="" method = "post">
            <button type="submit" formaction="./cadastro.php">Cadastro</button>
            <button type="submit" formaction="./agendamento.php">Agenda</button>
            <button type="submit" formaction="./reserva.php">Reservas</button>
            <button type="submit" formaction="./area_usuario.php">Área do Usuário</button>
            <button type="submit" formaction="./minhas_reservas.php">Minhas Reservas</button>
            <button type="submit" formaction="./todas_reservas.php">Todas as reservas</button>
            <button type="submit" formaction="./logout.php">Logout</button>
        </form> 

	</body> 
</html>
<?php
    }
?>