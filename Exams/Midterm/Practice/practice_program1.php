<?php

function displayLetter() {
    global $alphabet;
    $letter = array_rand($alphabet);
    
    if($letter == $_GET['find']) {
        foreach ($alphabet as $item) {
            if($item == $letter) {
                unset($alphabet, $item);
            }
        }    
    }
    
}
if($_GET['find'] == $_GET['omit']) {
    echo "<h3 id='error'>There was an error, pick seperate letters</h3>";
}

if(isset($_GET['submit'])) {
    
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Midterm Practice 1 </title>
        <style>
            #error {
                color:red;
            }
        </style>
    </head>
    <body>
    <form>
        <h4>Select a layout for the board</h4>
        <input type="radio" name="size" value="six"> 6x6 <br />
        <input type="radio" name="size" value="seven"> 7x7 <br />
        <input type="radio" name="size" value="eight"> 8x8 <br />
        <input type="radio" name="size" value="nine"> 9x9 <br />
        <input type="radio" name="size" value="ten"> 10x10 <br />
        
        <h4>Select a letter to find</h4>
        <select>
            <?php
                $alphabets = range("A" , "Z");
                foreach ($alphabets as $char) {
                    echo "<option name='find' value='$char'>$char</option>";
                }
            ?>
        </select>
        
        <h4>Select a letter to ommit</h4>
        <select>
            <?php
                $alphabets = range("A" , "Z");
                foreach ($alphabets as $char) {
                    echo "<option name='omit' value='$char'>$char</option>";
                }
            ?>
        </select>
        <br />
        <br />
        <input type='submit'>Submit<br />
    </form>    

    </body>
</html>