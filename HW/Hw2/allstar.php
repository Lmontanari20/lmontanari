<?php
    //This is the array for team Lebron
    $TLebron = array(
            "Lebron James", 
            "DeMarcus Cousins",
            "Anthony Davis",
            "Kevin Durant",
            "Kyrie Irving",
            "LaMarcus Aldridge",
            "Bradley Beal",
            "Goran Dragic",
            "Andre Drummond",
            "Paul George",
            "Kevin Love",
            "Victor Oladipo",
            "Kristap Porzingis",
            "Kemba Walker",
            "John Wall",
            "Russel Westbrook"
        );
    //This is the array for team Stephen    
    $TSteph = array(
            "Giannis Antetokounmpo",
            "Stephen Curry",
            "DeMar DeRozan",
            "Joel Embiid",
            "James Harden",
            "Jimmy Butler",
            "Draymond Green",
            "Al Horford", 
            "Damian Lillard",
            "Kyle Lowry",
            "Klay Thompson",
            "Karl-Anthony Towns"
        );
    //This function will return an array of the starting five for Team Lebron    
    function LebronStart5($TLebron) {
        $LStart5 = [];
        $size = 15;
        for($ii = 0; $ii < 5; $ii++) {
            $Index = rand(0,$size);
            array_push($LStart5, $TLebron[$Index]);
            unset($TLebron[$Index]);
            $TLebron = array_values($TLebron);
            $size--;
        }
        return $LStart5;
    }  
    
    function StephStart5($TSteph) {
        $SStart5 = [];
        $size = 11;
        for($ii = 0; $ii < 5; $ii++) {
            $Index = rand(0,$size);
            array_push($SStart5, $TSteph[$Index]);
            unset($TSteph[$Index]);
            $TSteph = array_values($TSteph);
            $size--;
        }
        return $SStart5;
    }    
?>

<!DOCTYPE html>
<html>
    <head>
        <title>NBA 2017/2018 AllStar Generator</title>
        <link href="styles.css" rel="stylesheet" type="text/css" />
        <meta charset="utf-8"; />
    </head>
    <body>
        <Header>
            <h1>NBA ALLSTAR Starting 5 Generator</h1>
            <hr>
        </Header>
        <main id="main">
            <table id="Lebron">
                <tr><th>TEAM LEBRON</th></tr>
                <tr><td>Lebron James</td></tr>
                <tr><td>DeMarcus Cousins</td></tr>
                <tr><td>Anthony Davis</td></tr>
                <tr><td>Kevin Durant</td></tr>
                <tr><td>Kyrie Irving</td></tr>
                <tr><td>LaMarcus Aldridge</td></tr>
                <tr><td>Bradley Beal</td></tr>
                <tr><td>Goran Dragic</td></tr>
                <tr><td>Andre Drummond</td></tr>
                <tr><td>Paul George</td></tr>
                <tr><td>Kevin Love</td></tr>
                <tr><td>Victor Oladipo</td></tr>
                <tr><td>Kristap Porzingis</td></tr>
                <tr><td>Kemba Walker</td></tr>
                <tr><td>John Wall</td></tr>
                <tr><td>Russel Westbrook</td></tr>
            </table>
            <?php
                echo '<table id="start5">';
                echo '<tr><th>Team Lebron Starting 5</th><th>Team Stephen Starting 5</th></tr>';
                
                $SStart5 = StephStart5($TSteph);
                $LStart5 = LebronStart5($TLebron);
    
                for($ii = 0; $ii < 5; $ii++) {
                    echo '<tr><td>';
                    print $LStart5[$ii];
                    echo '</td><td>';
                    print $SStart5[$ii];
                    echo '</td></tr>';
                
                }
                echo '</table>';
            ?>
            <table id="Steph">
                <tr><th>TEAM STEPHEN</th></tr>
                <tr><td>Giannis Antetokounmpo</td></tr>
                <tr><td>Stephen Curry</td></tr>
                <tr><td>DeMar Derozan</td></tr>
                <tr><td>Joel Embiid</td></tr>
                <tr><td>James Harden</td></tr>
                <tr><td>Jimmy Butler</td></tr>
                <tr><td>Draymond Green</td></tr>
                <tr><td>Al Horford</td></tr>
                <tr><td>Damian Lillard</td></tr>
                <tr><td>Kyle Lowry</td></tr>
                <tr><td>Klay Thompson</td></tr>
                <tr><td>Karl-Anthony Towns</td></tr>
            </table>
        </main>
        <a href="https://www.si.com/nba/2018/02/19/nba-all-star-game-lebron-james-kevin-durant-stephen-curry-adam-silver-los-angeles">
            <img src="http://www.khwebgraphicdesign.com/sportinggoodsstores/nba_subpages/nba_logo.gif" alt="NBA Allstar Scores" />
        </a>
    </body>
    <footer>
        <hr>
        <p>CST 336 Internet Programming.2018&copy; Montanari</p> <br />
    </footer>
</html>