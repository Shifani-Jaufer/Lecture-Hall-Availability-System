<?php
@include '../config.php';

session_start();

if (isset($_SESSION['success_message'])) {
    $successMessage = $_SESSION['success_message'];
    unset($_SESSION['success_message']);}


if (!isset($_SESSION['lecture_name'])) {
    header('location:../admin.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $errors = array();

    
    $lecture_name = $_SESSION['lecture_name'];

   
    $batch = $_POST['subject'];
    if (empty($batch)) {
        $errors['batch'] = "Batch is required.";
    }

    
    $course_id = $_POST['course'];
    if (empty($course_id)) {
        $errors['course'] = "Course is required.";
    }

   
    $hall_id = $_POST['hall'];
    if (empty($hall_id)) {
        $errors['hall'] = "Hall is required.";
    }

    
    $day_id = $_POST['day'];
    if (empty($day_id)) {
        $errors['day'] = "Day is required.";
    }

    
    $date = $_POST['date'];
    if (empty($date)) {
        $errors['date'] = "Date is required.";
    }

    
    $time = $_POST['time'];
    if (empty($time)) {
        $errors['time'] = "Time is required.";
    }

  
    if (empty($errors)) {
        
        $sql = "INSERT INTO booking_lec_hall (lecture_name, batch_id, course_id, hall_id, day_id, date, time) 
                VALUES ('$lecture_name', '$batch', '$course_id', '$hall_id', '$day_id', '$date', '$time')";

        if (mysqli_query($conn, $sql)) {
            header('location: about.php?success=1');
        } else {
            echo "Error: " . mysqli_error($conn);
        }

        mysqli_close($conn);
    } else {
        foreach ($errors as $error) {
            echo "<p>Error: $error</p>";
        }
    }
} else {
    echo "Invalid request method.";
}
?>
