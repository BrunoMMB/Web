<?php
    $servername = "localhost";
    $database = "reserva_de_salas";
    $username = "root";
    $password = "";

    $sala = $_POST['sala'];
    $nomsal = $_POST['nomsal'];
    
    $con = mysqli_connect($servername, $username, $password, $database) or trigger_error(mysql_error(),E_USER_ERROR); 
    echo $sql = "DELETE FROM `salas` WHERE numsal = '$sala'";
    $dados = mysqli_query($con, $sql) or die(mysqli_error());
    mysqli_close($con);
    header("Location: agendamento.php"); 
    exit();
?>
