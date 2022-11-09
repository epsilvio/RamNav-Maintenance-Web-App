<?php
    require $_SERVER['DOCUMENT_ROOT'].'/php/dbConn.php';

    function redirect($url, $statusCode = 303){
        header('Location: '. $url, true, $statusCode);
        die();
    }
    function loginCookie($name, $pwd){
        $name_cookie = $name;
        $pw_cookie = $pwd;
        setcookie("uname", $name_cookie);
        setCookie("pass", $pw_cookie);
    }

    $uname = $_GET["adminUname"];
    $pass = $_GET["adminPass"];

    
    $sql = "SELECT * FROM `admins` WHERE `username` = '{$uname}' AND `pass` = '{$pass}';";

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        $conn->close();
    }else{
        $result = mysqli_query($conn,$sql);
        $numrows = mysqli_num_rows($result);

        if ($numrows > 0) {
            loginCookie($uname, $pass);
            $conn->close();
            redirect("index.php");
        } else {
            $conn->close();
            redirect("login.php");
        }
    } 
?>