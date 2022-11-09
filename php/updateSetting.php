<?php
    require $_SERVER['DOCUMENT_ROOT'].'/php/reports.php';
    $setting = getSettings();
    $setting = $setting[0];
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $setting = array_merge($setting, $_POST);
        $isValid = true;

        if ($isValid) {
            $setting = updateSettings($_POST,'General');
            echo 'New Settings are: '.json_encode($setting, true);
            //header("Location: https://ramnav.westeurope.cloudapp.azure.com/admin/index.php");
        }
    }
?>