<?php
    function getRooms(){
        $data = file_get_contents('https://ramnav.westeurope.cloudapp.azure.com/js/dictionary.json');
        return json_decode($data, true);
    }
    
    function getRoomById($id)
    {
        $rooms = getRooms();
        foreach ($rooms as $room) {
            if ($room['roomID'] == $id) {
               return $room;
            }
         }
        return 'No Such Room!';
    }

    $id = $_GET["id"];
    $data = getRoomById($id);
    $def_img = "images/map/placeholder.png";
    $def_title = "RamNav QR Code Result Website";
?>  
<!DOCTYPE html> 
<html> 
   <head> 
      <meta charset="UTF-8" /> 
      <title>RamNav Web App</title>
      <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
      <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
      <link rel="stylesheet" href="./style.css">
   </head> 
   <body>
      <div id="root">
         <div class="jumbotron jumbotron-fluid">
            <h1 style="height: 50px;">
               <?php 
                  if(isset($id)){
                     echo "Map of " . $data['name'];
                  }else{
                     echo  $def_title;
                  }
               ?>
            </h1>
            <img src=
                     <?php
                        if(isset($id)){
                           echo "images/map/".$data['roomID'].".png";
                        }else{
                           echo  $def_img;
                        }
                     ?> 
                  alt="map-image" id="mapImg"/>
            <hr class="my-4">
            <form>
               <div class="form-group">
                  <label for="commentField">Give feedback or report a bug for system improvement</label>
                  <input type="text" class="form-control" id="commentField" placeholder="Type your comment here... ">
               </div>
            </form>
            <a class="btn btn-primary btn-lg" role="button" id="submitBtn">Submit Feedback</a>
         </div>
      </div> 
      <script src="js/index.js"></script>
   </body> 
</html>