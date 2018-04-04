<?php 
$francepics = array();
$mexicopics = array();
$usapics = array();
$francepics[] = "1.png";
$francepics[] = "2.png";
$francepics[] = "3.png";
$francepics[] = "4.png";
$francepics[] = "5.png";
$francepics[] = "6.png";

$mexicopics[] = "acapulco.png";
$mexicopics[] = "cabos.png";
$mexicopics[] = "cancun.png";
$mexicopics[] = "chichenitza.png";
$mexicopics[] = "huatulco.png";
$mexicopics[] = "mexico_city.png";

$usapics[] = "chicago.png";
$usapics[] = "hollywood.png";
$usapics[] = "las_vegas.png";
$usapics[] = "ny.png";
$usapics[] = "washington_dc.png";
$usapics[] = "yosemite.png";

function display_picture() {
    global $days;
    global $junk; 
    if($_GET['country'] == "France") {
        global $francepics;
        $picarray= $francepics;
    }elseif($_GET['country'] == "USA") {
        global $usapics;
        $picarray= $usapics;
    }elseif($_GET['country'] == "Mexico") {
        global $mexicopics;
        $picarray= $mexicopics;
    }
    $pic_dates = array();
    for($ii = 0; $ii < $_GET['visits']; $ii++) {
        $pic_dates[] = rand(1, $days);
        if($pic_dates[$ii] == $junk) {
            echo "<img src=img/". array_rand($picarray).">";
        }    
        
    }
    
    
}
function display_table() {
    
    if(!isset($_GET['month'])) {
        echo "<h2>Select a month to visit</h2>";
    }elseif (!isset($_GET['visits'])) {
        echo "<h2>Select the number of Locations you want to visit</h2>";
    }
    elseif(!isset($_GET['country'])) {
        echo "<h2>Select a country to visit</h2>";
    } elseif(isset($_GET['submit'])) {
        if($_GET['month'] == 'November') {
            $days = 30;
        }elseif($_GET['month'] == 'February') {
            $days = 28;
        }else {
            $days = 31;
        }
        echo "<table>";
        $junk = 1;
            for($ii = 1; $ii <= 6; $ii++) {
                echo "<tr>";
                for($i = 1; $i <= 7;$i++){
                    if($junk <= $days){
                        echo "<td>$junk". display_picture() ."</td>";
                        $junk++;
                    }
                }
                echo "</tr>";
            }
        
        echo "</table>";
    }
    
}






?>

<!DOCTYPE html>
<html>
    <head>
        <title> Winter Vacation </title>
        <meta charset="utf-8"/>
    </head>
    <body>
        <h1>Winter Vacation</h1>
        <form>
            
            <h3>Select a Month</h3>
            <input type="radio" name="month" value="November">November <br />
            <input type="radio" name="month" value="December">December <br />
            <input type="radio" name="month" value="January">January <br />
            <input type="radio" name="month" value="February">February <br />
            
            <h3>How many Locations do you want to visit?</h3>
            <input type="radio" name="visits" value="three">Three <br />
            <input type="radio" name="visits" value="four">Four <br />
            <input type="radio" name="visits" value="five">Five <br />
            
            
            <h3>Which Country would you like to visit?</h3>
            <input type="radio" name="country" value="France">France <br />
            <input type="radio" name="country" value="Mexico">Mexico <br />
            <input type="radio" name="country" value="USA">USA <br />
        
            <br />
            <input type="submit" name="submit" value="submit"><br />
        
            <?=display_table()?>
        </form>
    </body>
</html>