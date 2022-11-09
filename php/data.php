<?php
    header('Access-Control-Allow-Origin: *');
    $json = file_get_contents('https://ramnav.westeurope.cloudapp.azure.com/js/music.json');
    echo $json
?>