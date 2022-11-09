<?php
include $_SERVER['DOCUMENT_ROOT'].'partials/header.php';
require 'rooms.php';


if (!isset($_POST['roomID'])) {
    include $_SERVER['DOCUMENT_ROOT']."partials/not_found.php";
    exit;
}
$roomId = $_POST['roomID'];
deleteRoom($roomId);

header("Location: https://ramnav.westeurope.cloudapp.azure.com/admin/index.php");
