<?php
    $connections = mysqli_connect ("localhost: 3307", "root", "", "logindb");
        if(mysqli_connect_error()){
            echo "Failed to connect to Mysql: " .mysqli_connect_error();
        }
?>