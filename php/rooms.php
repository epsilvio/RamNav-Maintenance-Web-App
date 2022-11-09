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

function createRoom($data)
{
    $rooms = getRooms();
    $rooms[] = $data;
    putJson($rooms);
    return $data;
}

function updateRoom($data, $id)
{
    $updateRoom = [];
    $rooms = getRooms();
    foreach ($rooms as $i => $room) {
        if ($room['roomID'] == $id) {
            $rooms[$i] = $updateRoom = array_merge($room, $data);
        }
    }

    putJson($rooms);

    return $updateRoom;
}

function deleteRoom($id)
{
    $rooms = getRooms();

    foreach ($rooms as $i => $room) {
        if ($room['roomID'] == $id) {
            array_splice($rooms, $i, 1);
        }
    }

    putJson($rooms);
}

function uploadImage($file, $room)
{
    if (isset($_FILES['picture']) && $_FILES['picture']['name']) {
        //if (!is_dir($_SERVER['DOCUMENT_ROOT']."/images/map")) {
        //    mkdir($_SERVER['DOCUMENT_ROOT']."/images/map");
        //}
        // Get the file extension from the filename
        $fileName = $file['name'];
        // Search for the dot in the filename
        $dotPosition = strpos($fileName, '.');
        // Take the substring from the dot position till the end of the string
        $extension = substr($fileName, $dotPosition + 1);

        move_uploaded_file($file['tmp_name'], $_SERVER['DOCUMENT_ROOT']."/images/map/${room['roomID']}.png");
        updateRoom($room, $room['roomID']);
    }
}

function putJson($rooms)
{
    file_put_contents($_SERVER['DOCUMENT_ROOT'].'/js/dictionary.json', json_encode($rooms, JSON_PRETTY_PRINT));
}