<?php 
@include '../../config.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $lectureId = $_POST['lectureId'];
    

    

    $update_query = "UPDATE lecture SET is_deleted = 1 WHERE lecture_id = '$lectureId'";
    $result = mysqli_query($conn, $update_query);

    

    if (!$result) {
        echo "Delete failed: " . mysqli_error($conn);
    } else {
        echo "one Lecture Delete successful";
    }

}

?>