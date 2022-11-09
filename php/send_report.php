<?php
    require('dbConn.php');

    //Get Report
    $report = $_GET['report'];
    //Get Current Date Time in PH
    date_default_timezone_set('Asia/Kuala_Lumpur');
    $date = date('m/d/Y h:i:s a', time());
    
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }else{
        $sql = "INSERT INTO reports (`comment`, `timestamp`) VALUES ('$report', '$date');";
        if ($conn->query($sql) === TRUE) {
            echo "Feedback succesfully submitted to database! Please close the browser once done.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    $conn->close();
?>  