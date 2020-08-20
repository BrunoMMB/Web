<?php
    error_reporting(0);
    ini_set(“display_errors”, 0 );
    $existe = 0;
    
    $sval = $_POST['sub'];
    session_start();
    $user = $_SESSION["nome"];
    $nro = $_POST['nomeSala'];
    $dat = $_POST['datsal'];
    $des = $_POST['descri'];
    $final = 0;
    
    foreach ($_POST['option'] as $key => $value) {
        $hor = $value;
        $hor = $hor . ":00";

        if($sval == "reservar"){
            $servername = "localhost";
            $database = "reserva_de_salas";
            $username = "root";
            $password = "";

            $conn = new mysqli($servername, $username, $password, $database);

            if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
            }

            $res = checa_cadastro($nro, $dat, $hor, $conn);
            if($res != 0){
                echo "Este horário ja foi reservado";
            }else{
                $sql = "INSERT INTO `reservas`(`sala`, `nomsal`, `nomuti`, `datuso`, `horuso`, `descri`)"
                ."VALUES ($nro,'','$user','$dat','$hor','$des')";
                $result = $conn->query($sql);
                header("Location: area_usuario.php");
                exit();
            }
            mysqli_close($conn);
        }
    }

    function checa_cadastro($nro, $dat, $hor, $conn){
        $existe = 0;
        $sql = "select * from `reservas` where `sala` = $nro and `datuso` = '$dat' and `horuso` = '$hor'";
        $result = $conn->query($sql);
        if(0 != mysqli_num_rows ($result)){
            $existe++;
        }
        return $existe;
    }

?>