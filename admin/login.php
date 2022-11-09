<?php
    function redirect($url, $statusCode = 303){
        header('Location: '. $url, true, $statusCode);
        die();
    }

    if(count($_COOKIE) > 0) {
        redirect("index.php");
    }

?>

<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Scripts -->
        <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

        
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <title>RamNav Maintenance WebApp - Login</title>
    </head>
    <body style="background-image: url('/images/admin/bg.png');">
        <div class="card" style="width: 18rem; 
                                margin: auto; 
                                position: absolute;
                                top: 50%;
                                left: 50%;
                                transform: translate(-50%, -50%);">
            <img src="https://picsum.photos/1080" class="card-img-top" alt="...">
            <div class="card-body">
                <form method="GET" action="admin_login.php">
                    <div class="form-group">
                        <label for="inputUsername">Admin Username</label>
                        <input type="username" class="form-control" name="adminUname">
                    </div>
                    <div class="form-group">
                        <label for="inputPassword">Admin Password</label>
                        <input type="password" class="form-control" name="adminPass">
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
            </div>
        </div>
    </body>
</html>