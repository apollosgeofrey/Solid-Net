<?php

//date_default_timezone_set("");
if(!isset($_SESSION['email'])){

    $dater = DATE("D(d)-M-Y");
    $timer = DATE("h-i-s, a");
    $ipaddr = $_SERVER['REMOTE_ADDR'];
    $Browser_OS = $_SERVER['HTTP_USER_AGENT'];
    $name = "Not Gotten";
    $pics = "Not Gotten";
  
    $sqlq = "INSERT INTO visitedmembers(id, dater, timer, ipaddr, browser_os, name, pics) VALUES (NULL, '$dater', '$timer', '$ipaddr', '$Browser_OS', '$name', '$pics')"; 
    mysqli_query($conn, $sqlq);

    }
    ?>
