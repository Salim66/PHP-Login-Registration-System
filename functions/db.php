<?php 

    // Database connection
    $con = mysqli_connect('localhost', 'root', '', 'login_db');

    // create row count function
    function rowCount($result){
        return mysqli_num_rows($result);
    }

    // Create escape string function
    function escapeString($string){
        global $con;
        return mysqli_real_escape_string($con, $string);
    }

    // Create query function 
    function query($query){
        global $con;
        return mysqli_query($con, $query);
    }

    // Create confirm function
    function confirm($result){
        global $con;
        if(!$result) {
            die("Query Failed " . mysqli_error($con));
        }
    }

    // Create fetch function
    function fetchArray($result){
        global $con;
        return mysqli_fetch_array($result);
    }


?>