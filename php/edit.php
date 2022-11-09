<?php
include $_SERVER['DOCUMENT_ROOT'].'/partials/header.php';
require $_SERVER['DOCUMENT_ROOT'].'/php/rooms.php';

if (!isset($_GET['roomID'])) {
    include $_SERVER['DOCUMENT_ROOT']."/partials/not_found.php";
    exit;
}
$roomId = $_GET['roomID'];

$room = getRoomById($roomId);
if (!$room) {
    include $_SERVER['DOCUMENT_ROOT']."/partials/not_found.php";
    exit;
}

$errors = [
    'name' => "",
    'username' => "",
    'email' => "",
    'phone' => "",
    'website' => "",
];
$isValid = true;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $room = array_merge($room, $_POST);

    //$isValid = validateUser($user, $errors);

    if ($isValid) {
        $room = updateRoom($_POST, $roomId);
        uploadImage($_FILES['picture'], $room);
        header("Location: https://ramnav.westeurope.cloudapp.azure.com/admin/index.php");
    }
}

?>

<?php include '_form.php'; ?>