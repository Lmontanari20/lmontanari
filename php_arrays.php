<?php 

$cards = array("ace", "jack", 2);
$suits = array("clubs", "spades", "hearts", "diamonds");
//print_r($cards); //for debugging purposes, shows all elements in the array.

echo $cards[1]; 
echo "<br />";
//adding new element on the end of the array
$cards[] = "queen"; 
//can add multiple elements and also add arrays to another array
array_push($cards, "ten");
//changing index two to the value ten
$cards[2] = "king";
$suitnum = rand(0, 3);
$suit = $suits[$suitnum];
$cardnum = rand(0, 4);
$card = $cards[$cardnum];
   
    
function displayCard($card) {
    global $suit;

    echo "<img src='img/cards/$suit/$card.png' alt='jack' />";
}

displayCard($card);
echo "<hr>";
$cardnum = rand(0, count($cards)-1);
$card = $cards[$cardnum];
displayCard($card);
echo "<br />";

$lastCard = array_pop($cards);


unset($cards[1]);
echo "<hr>";
print_r($cards);

$cards = array_values($cards);
echo "<hr>";
print_r($cards);

?>




<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body>

    </body>
</html>