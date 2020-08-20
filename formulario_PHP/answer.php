<!DOCTYPE html> 
	<html lang = "pt-br">     
	
	<head>       
        <meta charset = "UTF-8">       
        <link rel="stylesheet" type="text/css" href="styles.css">
        <title> Página 3 </title>     
	</head>     
	
	<body> 
        <form action="answer.php" method = "post">   
            <?php
                $name = $_POST["name"];
                $born = $_POST["born"];
                
                $correct = 0; $question1 = 0; $question2 = 0; $question3 = 0; $question4 = 0; $question5 = 0;

                ($_POST["question1"] == 1) ? $correct++ : $correct = $correct;
                ($_POST["question2"] == 2) ? $correct++ : $correct = $correct;
                ($_POST["question3"] == 4) ? $correct++ : $correct = $correct;
                ($_POST["question4"] == 4) ? $correct++ : $correct = $correct;

                foreach ($_POST['option'] as $key => $value) {
                    if(($value == 1) || ($value == 4))
                    {
                        $question5 ++;
                    }
                    else{
                        $question5 +=3;
                    }
                }
                ($question5 == 2) ? $correct ++ : $correct = $correct;
                
                $result = ($correct * 100)/5;

                $message1 = "Parabéns " . $name . " você acertou " . $result . "% da prova. </br></br>";
                $message2 = "Você "      . $name . " acertou "      . $result . "% da prova. </br></br>";

                /* Define o local para Brasil */
                setlocale (LC_ALL, 'pt_BR');
                date_default_timezone_set('UTC');
                $currentDate = date("d/m/Y");
                
                $born = explode("-", $born, 4);
                $currentYear = explode("/", $currentDate, 3);
                
                $yearsOld = $currentYear[2] - $born[0];
                $message3 = " Idade: " . $yearsOld . " </br>";

                echo ($result >= 60) ? $message1 : $message2;
                echo "</br>Data atual: " . $currentDate . $message3; 

                echo "</br>Resumo da prova: </br >";
                
                echo "Quem enfrenta Balrog na série Senhor dos Aneis? :";
                echo ($_POST["question1"] == 1) ? " Correta </br>" : " Errada </br>";

                echo "Em qual jogo da série Final Fantasy é possível encontrar a lança Zodiac Speare? :";
                echo ($_POST["question2"] == 2) ? " Correta </br>" : " Errada </br>";
                
                echo "Qual destes filmes tem a data de lançamento mais recente? :";
                echo ($_POST["question3"] == 4) ? " Correta </br>" : " Errada </br>";
                
                echo "Qual dessas séries você considera boa? :";
                echo ($_POST["question4"] == 4) ? " Correta </br>" : " Errada </br>";
                
                echo "Quais desses insetos não deveriam existir? :";
                echo ($question5 == 2) ? " Correta </br>" : " Errada </br>";
    
            ?>
        </form>
        </body> 
</html>
