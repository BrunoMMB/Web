<?php
    $servername = "localhost";
    $database = "reserva_de_salas";
    $username = "root";
    $password = "";

    $sala = $_POST['sala'];
    $nomsal = $_POST['nomsal'];
    $nomuti = $_POST['nomuti'];
    $datuso = $_POST['datuso'];
    $horuso = $_POST['horuso'];
    
    $con = mysqli_connect($servername, $username, $password, $database) or trigger_error(mysql_error(),E_USER_ERROR); 
    echo $sql = "DELETE FROM `reservas` WHERE sala = $sala and horuso = '$horuso' and datuso = '$datuso'";
    $dados = mysqli_query($con, $sql) or die(mysqli_error());
    mysqli_close($con);
    header("Location: minhas_reservas.php"); 
    exit();

?>