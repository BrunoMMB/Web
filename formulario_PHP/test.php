<!DOCTYPE html> 
	<html lang = "pt-br">     
	
	<head>       
                <meta charset = "UTF-8">      
                <link rel="stylesheet" type="text/css" href="styles.css"> 
                <title> Página 2 </title>     
	</head>     
	
	<body> 
                <form action="answer.php" method = "post">         
                        <?php
                        $name = $_POST["name"];
                        $born = $_POST["born"];
                        $arrayNames = explode(' ',$name,2);

                        echo strtoupper($arrayNames[0]) . " Boa sorte na prova!!!!!!!!";
                        echo "</br></br>";
                        ?>
                        
                        <input type="text" name="name" value="<?php echo strtoupper($arrayNames[0])?>" hidden>
                        <input type="text" name="born" value="<?php echo $born?>" hidden>
                        
                        <br>Quem enfrenta Balrog na série Senhor dos Aneis?:<br>
                        <input type="radio" name="question1" value="1" unchecked> Gandalf<br>
                        <input type="radio" name="question1" value="2" unchecked> Frodo<br>
                        <input type="radio" name="question1" value="3" unchecked> Radagast<br>
                        <input type="radio" name="question1" value="4" unchecked> Passolargo<br>

                        <br>Em qual jogo da série Final Fantasy é possível encontrar a lança Zodiac Speare?:<br>
                        <input type="radio" name="question2" value="1" unchecked> Final Fantasy 1<br>
                        <input type="radio" name="question2" value="2" unchecked> Final Fantasy 12<br>
                        <input type="radio" name="question2" value="3" unchecked> Final Fantasy 15<br>
                        <input type="radio" name="question2" value="4" unchecked> Nenhuma das opções<br>

                        <br>Qual destes filmes tem a data de lançamento mais recente?:<br>
                        <input type="radio" name="question3" value="1" unchecked> John Wick<br>
                        <input type="radio" name="question3" value="2" unchecked> O irlandês<br>
                        <input type="radio" name="question3" value="3" unchecked> Vingadores<br>
                        <input type="radio" name="question3" value="4" unchecked> Sonic<br>

                        <br>Qual dessas séries você considera boa?:<br>
                        <input type="radio" name="question4" value="1" unchecked> Breaking Bad<br>
                        <input type="radio" name="question4" value="2" unchecked> Sherlock<br>
                        <input type="radio" name="question4" value="3" unchecked> The Witcher<br>
                        <input type="radio" name="question4" value="4" unchecked> Todas as opções<br>

                        <br>Quais desses insetos não deveriam existir?(Escolha duas opções):<br>
                        <input type="checkbox" name="option[]" value="1">
                        <label for="option1"> Pernilongos</label><br>

                        <input type="checkbox" name="option[]" value="2">
                        <label for="option2"> Joaninhas</label><br>
        
                        <input type="checkbox" name="option[]" value="3">
                        <label for="option3"> Tamburutacas</label><br>
        
                        <input type="checkbox" name="option[]" value="4">
                        <label for="option4"> Quaisquer outros insetos que tenham asas ou sulguem sangue</label><br>
                        <br>

                        <input id="button" type="submit" value = "Corrigir!"> 
                </form> 
        </body> 
</ html >