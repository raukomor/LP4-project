<?php
    
    // read the .ini file and create an associative array
    
    $db = parse_ini_file("config.ini");
    
    /* reading .ini */
    
    $user = $db['user'];
    $pass = $db['pass'];
    $name = $db['name'];
    $host = $db['host'];
    $type = $db['type'];

    /* Connect to a MySQL database using driver invocation */
    try {
        //echo $type.":dbname=".$name.";host=".$host.",".$user.",".$pass;
        //$con = new PDO($type.":dbname=".$name.";host=".$host,$user,$pass);
        $con = new PDO("mysql:dbname=school;host=localhost","root","usbw");
    } catch (PDOException $e) {
        echo 'Connection failed: ' .$e->getMessage() ;
    }
    
    
?>