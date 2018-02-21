<?php
            function displaySymbol($randomValue, $pos) {
            
              switch($randomValue) {
                case 0: $symbol = "seven";
                        break;
                case 1: $symbol = "orange";
                        break;
                case 2: $symbol = "cherry";
                        break;
                case 3: $symbol = "lemon";
              }
              
              echo "<img id='reel$pos' src='img/$symbol.png' alt='$symbol' title='$symbol' />"; 
                
            }
            
            function displayPoints($randomValue1, $randomValue2, $randomValue3) {
                if($randomValue1 == $randomValue2 && $randomValue2 == $randomValue3) {
                  if($randomValue1 == 0) {
                    echo "<br /><h2 id='output'>You Win 1000 Points</h2>";
                  } else if($randomValue1 == 1) {
                    echo "<br /><h2 id='output'>You Win 500 Points</h2>";
                  } else if($randomValue1 == 2) {
                    echo "<br /><h2 id='output'>You Win 250 Points</h2>";
                  } else if($randomValue1 == 3) {
                    echo "<br /><h2 id='output'>Your Win 900 Points</h2>";
                  }
                }else {
                    echo "<br /><h3 id='output'>Try Again</h3>";
                }
                
            }
            
            function play() {
                for($ii = 1; $ii < 4; $ii++) {
                    ${"randomValue" . $ii} = rand(0,3);
                    displaySymbol(${"randomValue" . $ii}, $ii);
                }
                displayPoints($randomValue1,$randomValue2,$randomValue3);
            }
?>