<?php

function grade_quiz() {
    $grade = 0;
    
    if(isset($_GET['answer0'])) {
        if($_GET['answer0'] == 3) {
            $grade += 1;
        }
    }
    
    if(isset($_GET['answer1'])) {
        if($_GET['answer1'] == "Ash") {
            $grade += 1;
        }
    }
    
    if(isset($_GET['answer2'])) {
        if($_GET['answer2'] == "Fire") {
            $grade += 1;
        }
    }
    
    if(isset($_GET['answer3'])) {
        if($_GET['answer3'] == "dragon") {
            $grade++;
        }
    }
    
    if(isset($_GET['answer4'])) {
        if($_GET['answer4'] == "Mew") {
            $grade++;
        }
    }
    
    if(isset($_GET['submit'])) {
        echo "<h3>Your score is " . $grade . " out of 5</h3>";
    }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Pokemon Master</title>
        <meta charset="utf-8"/>
        <link href="styles.css" rel="stylesheet" type="text/css"/>
    </head>
        <header>
        <h1>Pokemon Quiz</h1>
        <hr>
        </header>
    <body>
        <br />
        <ol>
            <br />
            <li>
                <h3>How many Evolutions does a starter Pokemon have?</h3>
                <form>
                    <input type="text" name="answer0" value="<?=$_GET['answer0']?>" />
                    <br />       
                    <br />
            </li>
            <br />
            <li>
                <h3>Who is the Pokemon Master?</h3>
                
                    <input type="radio" name="answer1" id="Ash" value="Ash" <?= ($_GET['answer1']=="Ash")?"checked":"" ?>>
                    <label for="Ash">Ash Catch'em</label><br />
                    <input type="radio" name="answer1" id="Trash" value="Trash" <?= ($_GET['answer1']=="Trash")?"checked":"" ?>>
                    <label for="Trash">Trash Drop'em</label><br />
                    <input type="radio" name="answer1" id="Brock" value="Brock" <?= ($_GET['answer1']=="Brock")?"checked":"" ?>>
                    <label for="Brock">Brock Obama</label><br />
                    <br />
            </li>
            <br />
            <li>
                <h3>Which Statement is True?</h3>
                
                    <input type="checkbox" name="answer2" id="Fire"value="Fire" <?= ($_GET['answer2']=="Fire")?"checked":"" ?>>
                    <label for="Fire">Fire beats Water</label><br />
                    <input type="checkbox" name="answer2" id="Water" value="Water" <?= ($_GET['answer2']=="Water")?"checked":"" ?>>
                    <label for="Water">Water beats Electric</label><br />
                    <input type="checkbox" name="answer2" id="Electric" value="Electric" <?= ($_GET['answer2']=="Electric")?"checked":"" ?>>
                    <label for="Electric">Electric beats Sand</label><br />
                    <br />
            </li>
            <br />
            <li>
                <h3>Which type of Pokemon is Dratini</h3>
                
                    <input type="text" name="answer3" value="<?=$_GET['answer3']?>"/>
                    <br /><br />
            </li>
            <br />
            <li>
                <h3>Which Pokemon is the most rare</h3>
                
                    <input type="checkbox" name="answer4" id="Squirtle" value="Squirtle" <?= ($_GET['answer4']=="Squirtle")?"checked":"" ?>>
                    <label for="Squirtle">Squirtle</label><br />
                    <input type="checkbox" name="answer4" id="Mew" value="Mew"<?= ($_GET['answer4']=="Mew")?"checked":"" ?>>
                    <label for="Mew">Mew</label><br />
                    <input type="checkbox" name="answer4" id="Snorlax" value="Snorlax" <?= ($_GET['answer4']=="Snorlax")?"checked":"" ?>>
                    <label for="Snorlax">Snorlax</label><br />
                    <br />
            </li>
            <br />
        </ol>
        <input id="submit" type="submit" name="submit" value="Submit" size="50"/>
        
        </form>
        <?php 
            grade_quiz()
        ?>
    </body>
</html>