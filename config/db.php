<?php
    define('DB_HOST', 'localhost' );
    define('DB_USER', 'dbuser' );
    define('DB_PASSWORD', '123456' );
    define('DB_NAME', 'feedback_db' );

    $conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

    if($conn->connect_error){
        die('Not connected' . $conn->connect_error);

    }
?>