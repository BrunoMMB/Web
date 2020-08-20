<?php
    $oldnro =   $_POST['oldsala'];
    $oldnome =  $_POST['oldnomsal'];
    $oldativo = $_POST['oldativo'];
    $nro =      $_POST['sala'];
    $nome =     $_POST['nomsal'];
    $ativo =    $_POST['ativo'];

    $servername = "localhost";
    $database = "reserva_de_salas";
    $username = "root";
    $password = "";

    $con = mysqli_connect($servername, $username, $password, $database) or trigger_error(mysql_error(),E_USER_ERROR); 
    echo $sql = "UPDATE `salas` SET `numsal`=$nro,`nome`='$nome',`ativo`='$ativo' WHERE `numsal`=$oldnro and`nome`='$oldnome' and `ativo`='$oldativo'";
    $dados = mysqli_query($con, $sql) or die(mysqli_error());
    mysqli_close($con);
    header("Location: agendamento.php"); 
    exit();

?>
