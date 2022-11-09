<?php
include $_SERVER['DOCUMENT_ROOT'].'/partials/header.php';
require 'rooms.php';

$room = [
    'roomID' => '',
    'name' => '',
    'roomNum' => '',
    'roomLvl' => '',
    'keyword1' => '',
    'keyword2' => '',
    'keyword3' => '',
];

$errors = [
    'roomID' => "",
    'name' => "",
    'roomNum' => "",
    'roomLvl' => "",
    'keyword1' => "",
    'keyword2' => "",
    'keyword3' => "",
];
$isValid = true;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $room = array_merge($room, $_POST);

    //$isValid = validateUser($user, $errors);

    if ($isValid) {
        $room = createRoom($_POST);

        uploadImage($_FILES['picture'], $room);

        header("Location: https://ramnav.westeurope.cloudapp.azure.com/admin/index.php");
    }
}

?>
<?php include '_form.php' ?>