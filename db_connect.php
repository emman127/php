<?php 

    $conn = mysqli_connect('localhost', 'emman', 'emman123', 'school_record');

    if(!$conn){
        echo 'Connection status: ' . mysqli_connect_error();
    }

?>