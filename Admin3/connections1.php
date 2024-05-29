<?php
    $con = mysqli_connect ("localhost: 3307","root","", "logindb");
        if(!$con){
            die('Connection Failed'. mysqli_connect_error());
        }
?>