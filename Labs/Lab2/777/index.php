<?php
  include 'inc/functions.php'
?>
<!DOCTYPE html>
<html>
    <head>
        <title> Lab 2: 777 Slot Machine </title>
        <meta charset="utf-8" />
        <style>
          @import url(css/styles.css);
        </style>
    </head>
    <body>
        
        <div id="main">
          
          <?php
              play();
          ?>
          <form>
            <input type="submit" value="Spin!" />
          </form>
          
        </div>
        
  <!--      
        <img src="img/cherry.png" alt="Cherry" title="Cherry" />
        <img src="img/lemon.png" alt="Lemon" title="Lemon" />
        <img src="img/orange.png" alt="Orange" title="Orange" />
-->            
    </body>
</html>