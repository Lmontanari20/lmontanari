<?php>

    function getRandomColor() {
        
        echo "rgba(".rand(0,255).",".rand(0,255).",".rand(0,255).",".rand(0,100)/100.";"
    }

?>



<!DOCTYPE html>
<html>
    
    <head>
        <title>Random Color</title>
        <style>
        
            body {
                <?php
                    $red = rand(0,255);
                    $green = rand(0,255);
                    $blue = rand(0,255);
                    $a = rand(0,100) / 100;
                echo "background-color: rgba($red,$green,$blue,$a);";
                ?>
                
            }
            h1 {
                color: <?php getRandomColor() ?>;
                
            }
        </style>
    </head>
    <body>
        
        <h1>Welcome!</h1>
        
        <h2>Random Background Color!</h2>
    </body>
    
</html>