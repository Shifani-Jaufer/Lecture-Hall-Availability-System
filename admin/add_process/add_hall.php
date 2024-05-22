<?php 

@include '../../config.php';


session_start();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
        
    $hallId = $_POST['hallId'];
    $hallName = $_POST['hallName'];
    $capacity = $_POST['capacity'];

   


    
    $insert_query = "INSERT INTO hall (hall_id, hall_name, capacity,is_deleted) VALUES ('$hallId', '$hallName', '$capacity',0)";
    
    
    $result = mysqli_query($conn, $insert_query);

    if (!$result) {
        
        echo "0";
    } else {
        
        echo "Hall add sucessfully to System";
    }

}











?>


