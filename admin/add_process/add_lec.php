<?php 

@include '../../config.php';


session_start();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
        
    $lectureid = $_POST['lectureID'];
    $lecturename = $_POST['lectureName'];
    $department = $_POST['departmentID'];

    $insert_query = "INSERT INTO lecture (lecture_id, lecture_name, department_id,password,is_deleted) VALUES ('$lectureid', '$lecturename', '$department','123456',0)";
    
    
    $result = mysqli_query($conn, $insert_query);

    if (!$result) {
        
        echo "0";
    } else {
        
        echo "Lecture Added successful";
    }

}


?>


