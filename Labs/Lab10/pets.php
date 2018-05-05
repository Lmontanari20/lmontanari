<?php
    include 'inc/header.php';
    include '../../dbConn.php';
    $conn = getDatabaseConnection("pets");
    
    
    function getAllPets() {
        global $conn;
        $sql = "SELECT * FROM pets ORDER BY name";
        
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $records;
    }
    
    
?>

<script>
    
    $(document).ready(function(){
        
        $(".petLink").click(function(){
            $("#petModal").modal("show");
            $("#petInfo").append("<img src='img/loading.gif'>");
            $.ajax({

                type: "GET",
                url: "api/getPetInfo.php",
                dataType: "json",
                data: { "id": $(this).attr("id") },
                success: function(data,status) {
                //alert(data.breed);
                //log.console(data.pictureURL);
                $("#petInfo").html("<h1>" + data.name + "</h1>");
                $("#petInfo").append("<img src='img/" + data.pictureURL + "'> <br>");
                $("#petInfo").append("Age: " + data.age + "<br>");
                $("#petInfo").append("Breed: " + data.breed + "<br>");
                $("#petInfo").append(data.description + "<br>");
                },
                complete: function(data,status) { //optional, used for debugging purposes
                //alert(status);
                }
                
                });//ajax
            
        });
        
    });
    
</script>

<?php
    $petList = getAllPets();
    //print_r($petList);
    
    foreach ($petList as $pet) {
        echo "Name: <a href='#' class='petLink' id='" . $pet['id'] . "' > " . $pet['name'] . " </a> <br>";
        echo "Type: " .$pet['type'] . "<br> <br>";
    }
?>


<!-- Modal -->
<div class="modal fade" id="petModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Adopt?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="petInfo" >
            
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<div id="petInfo">
</div>



<?php
    include 'inc/footer.php';
?>