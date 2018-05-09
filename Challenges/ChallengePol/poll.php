<?php
    include '../../dbConn.php';
    $conn = getDatabaseConnection("challenge");
    
    
    function getAllAnswers() {
        global $conn;
        $sql = "SELECT * FROM answers WHERE 1";
        
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $records;
    }
    
    
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Challenge Poll</title>
       
        
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>
        <script src="https://code.jquery.com/jquery-3.1.0.js"></script>

        <script>
        
        
        
        function updatePoll() {
            // $("#container").html("<img src='img/loading.gif' />");
            //  if($(".answer").val() == "yes") {
                 
            //      //update yes column
                 
            //  }else if ($(".answer").val() == "maybe") {
                 
            //  }else if ($(".answer").val() == "no") {
                 
            //  }
             
             $.ajax({

                type: "GET",
                url: "updatePollAPI.php",
                dataType: "json",
                data: { "id": $(this).attr("id") },
                success: function(data,status) {
                //alert(data.breed);
                //log.console(data.pictureURL);
                data.yes++;
                
                },
                complete: function(data,status) { //optional, used for debugging purposes
                //alert(status);
                }
                
                });//ajax
             
            //Include here the AJAX call 
            //on Success, call the 'updatePollChart' function passing the percentages of the three choices, for example:
            updatePollChart(25,40,35);
        }
        
        //You can change the choice names if different from "yes", "maybe", and "no"
        function updatePollChart(yes, maybe, no) {
            Highcharts.chart('container', {
                    chart: {
                        plotBackgroundColor: null,
                        plotBorderWidth: null,
                        plotShadow: false,
                        type: 'pie'
                    },
                    title: {
                        text: ''
                    },
                    tooltip: {
                        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                    },
                    plotOptions: {
                        pie: {
                            allowPointSelect: true,
                            cursor: 'pointer',
                            dataLabels: {
                                enabled: true,
                                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                                style: {
                                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                                }
                            }
                        }
                    },
                    series: [{
                        name: 'Choices',
                        colorByPoint: true,
                        data: [{
                            name: 'Yes',
                            y: yes
                        }, {
                            name: 'Maybe',
                            y: maybe,
                            sliced: true,
                            selected: true
                        }, {
                            name: 'No',
                            y: no
                        }]
                    }]
                });
        }//endFunction
        
        </script>
        
    </head>
    <body>

      <h1> Are you having a good day? </h1>
      <form>
          <input type="radio" class="answer" id = "yes" name="answer" value="yes" checked> Yes<br>
          <input type="radio" class="answer" id = "maybe" name="answer" value="maybe"> Maybe <br>
          <input type="radio" class="answer" id = "no" name="answer" value="no"> No
       </form>
      <button onclick="updatePoll()">Submit!</button>
      <div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>

    </body>
</html>