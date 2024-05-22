<?php
@include '../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $batch = $_POST['batch'];
    $day = $_POST['day'];
    
    $query = "SELECT * FROM allocation WHERE batch_id = '$batch' AND day_id = '$day'";
    $result = mysqli_query($conn, $query);
    
    if (!$result) {
        echo "Error in executing the query: " . mysqli_error($conn);
        exit();
    }

    $data = array();
    
    while ($row = mysqli_fetch_assoc($result)) {
        $batchId = $row['batch_id'];
        $courseId = $row['course_id'];
        $hallId = $row['hall_id'];
        $startTime = $row['start_time'];
        $endTime = $row['end_time'];
    
        
        $courseName = "No course";
        $hallName = "No hall";
    
       
        if ($courseId !== null) {
            $courseNameQuery = "SELECT course_name FROM course WHERE course_id = '$courseId'";
            $courseNameResult = mysqli_query($conn, $courseNameQuery);
            if ($courseNameRow = mysqli_fetch_assoc($courseNameResult)) {
                $courseName = $courseNameRow['course_name'];
            }
        }
    
       
        if ($hallId !== null) {
            $hallNameQuery = "SELECT hall_name FROM hall WHERE hall_id = '$hallId'";
            $hallNameResult = mysqli_query($conn, $hallNameQuery);
            if ($hallNameRow = mysqli_fetch_assoc($hallNameResult)) {
                $hallName = $hallNameRow['hall_name'];
            }
        }
    
       
        $data[] = array(
            'batch_id' => $batchId,
            'course_id' => $courseName,
            'hall_id' => $hallName,
            'start_time' => $startTime,
            'end_time' => $endTime
        );
    }
    
    

    echo json_encode($data);
    mysqli_close($conn);
} else {
    echo "Invalid request method.";
}
?>
