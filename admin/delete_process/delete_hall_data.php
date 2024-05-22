<?php 
@include '../../config.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $hallid = $_POST['hallid'];
    

    

    $update_query = "UPDATE hall SET is_deleted = 1 WHERE hall_id = '$hallid'";
    $result = mysqli_query($conn, $update_query);

    

    if (!$result) {
        echo "Delete failed: " . mysqli_error($conn);
    } else {
        echo "one Lecture Hall Delete successful";
    }

}

?>