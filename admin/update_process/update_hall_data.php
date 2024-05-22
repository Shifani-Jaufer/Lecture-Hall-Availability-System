<?php


@include '../../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
        
        $hallid = $_POST['hallid'];
        $data_hallid = $_POST['data_hallid'];
        $hallname = $_POST['hallname'];
        $capacity = $_POST['capacity'];

       


        
        $update_query = "UPDATE hall SET hall_id = '$data_hallid', hall_name = '$hallname', capacity = '$capacity' WHERE hall_id = '$hallid'";
        
        
        $result = mysqli_query($conn, $update_query);

        if (!$result) {
            
            echo "Update failed: " . mysqli_error($conn);
        } else {
            
            echo "Update successful";
        }
   
}
?>
