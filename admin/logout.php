<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        require 'admin.php';
        logout();
    }
?>