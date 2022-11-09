<?php
    require('dbConn.php');
    require('reports.php');

    if (!isset($_POST['reportID'])) {
        include $_SERVER['DOCUMENT_ROOT']."partials/not_found.php";
        exit;
    }else{
        $id = $_POST['reportID'];
        deleteReport($id);
        header("Location: https://ramnav.westeurope.cloudapp.azure.com/admin/index.php");
    }
?>