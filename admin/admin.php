<?php    
    function redirect($url, $statusCode = 303){
        header('Location: '. $url, true, $statusCode);
        die();
    }

    function getAdmin($uname, $pass){
        require $_SERVER['DOCUMENT_ROOT'].'/php/dbConn.php';

        $sql = "SELECT * FROM `admins` WHERE `username` = '{$uname}' AND `pass` = '{$pass}';";

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            $conn->close();
        }else{
            $result = mysqli_query($conn,$sql);
            $row = $result->fetch_assoc();
            $conn->close();
            return $row;
        } 
    }

    function checkAdminCookie(){
        if(count($_COOKIE) == 0) {
            redirect("login.php");
        }else{
            return $_COOKIE;
        }
    }

    function logout($uname, $pass){
        setcookie("uname", "", time() - 3600);
        setCookie("pass", "", time() - 3600);
        header("Refresh:0; url=index.php");
    }

    function viewAdmins(){

    }

    function addAdmin(){

    }

    function deleteAdmin(){

    }

    function editAdmin(){
        
    }

?>