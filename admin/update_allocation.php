<?php
include '../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $extre_lecture_name = $_POST['lecture_name'];
    $extre_batch_id = $_POST['batch_id'];
    $extre_course_id = $_POST['course_id'];
    $extre_hall_id = $_POST['hall_id'];
    $extre_day_id = $_POST['day_id'];
    $extre_date = $_POST['date'];
    $extre_time = $_POST['time'];

    
    $select_date_query = "SELECT day_id FROM lecture_day WHERE day_name = ?";
    $date_stmt = mysqli_prepare($conn, $select_date_query);
    mysqli_stmt_bind_param($date_stmt, "s", $extre_day_id);
    
   
    mysqli_stmt_execute($date_stmt);
    $date_result = mysqli_stmt_get_result($date_stmt);

    if (!$date_result) {
        echo "Error retrieving day ID: " . mysqli_error($conn);
        exit();
    }

   
    if (mysqli_num_rows($date_result) > 0) {
        $date_id_row = mysqli_fetch_assoc($date_result);
        $day_id = $date_id_row['day_id'];
    } else {
        echo "Error: No matching day found.";
        exit();
    }

   
    $select_course_query = "SELECT course_id FROM course WHERE course_name = ?";
    $course_stmt = mysqli_prepare($conn, $select_course_query);
    mysqli_stmt_bind_param($course_stmt, "s", $extre_course_id);
    
    
    mysqli_stmt_execute($course_stmt);
    $course_result = mysqli_stmt_get_result($course_stmt);

    if (!$course_result) {
        echo "Error retrieving course ID: " . mysqli_error($conn);
        exit();
    }

    
    if (mysqli_num_rows($course_result) > 0) {
        $course_id_row = mysqli_fetch_assoc($course_result);
        $course_id = $course_id_row['course_id'];
    } else {
        echo "Error: No matching course found.";
        exit();
    }

   
    $hall_id_query = "SELECT hall_id FROM hall WHERE hall_name = ?";
    $hall_stmt = mysqli_prepare($conn, $hall_id_query);
    mysqli_stmt_bind_param($hall_stmt, "s", $extre_hall_id);
    
   
    mysqli_stmt_execute($hall_stmt);
    $hall_result = mysqli_stmt_get_result($hall_stmt);

    if (!$hall_result) {
        echo "Error retrieving hall ID: " . mysqli_error($conn);
        exit();
    }

    
    if (mysqli_num_rows($hall_result) > 0) {
        $hall_id_row = mysqli_fetch_assoc($hall_result);
        $hall_id = $hall_id_row['hall_id'];
    } else {
        echo "Error: No matching hall found.";
        exit();
    }

   
    $insert_query = "INSERT INTO extra_lecture_allocation (lecture_name, batch, course, hall, day, date, time) 
                     VALUES (?, ?, ?, ?, ?, ?, ?)";
    $insert_stmt = mysqli_prepare($conn, $insert_query);
    mysqli_stmt_bind_param($insert_stmt, "ssssiss", $extre_lecture_name, $extre_batch_id, $extre_course_id, $extre_hall_id, $day_id, $extre_date, $extre_time);

    if (mysqli_stmt_execute($insert_stmt)) {
        
        $delete_query = "DELETE FROM booking_lec_hall 
                         WHERE lecture_name = ? 
                         AND batch_id = ? 
                         AND course_id = ? 
                         AND hall_id = ? 
                         AND day_id = ? 
                         AND date = ? 
                         AND time = ?";
        $delete_stmt = mysqli_prepare($conn, $delete_query);
        mysqli_stmt_bind_param($delete_stmt, "ssssiss", $extre_lecture_name, $extre_batch_id, $course_id, $hall_id, $day_id, $extre_date, $extre_time);

        if (mysqli_stmt_execute($delete_stmt)) {
            echo "Booking updated successfully!";
        } else {
            echo "Error deleting booking: " . mysqli_error($conn);
        }
    } else {
        echo "Error inserting allocation: " . mysqli_error($conn);
    }

    
    mysqli_stmt_close($date_stmt);
    mysqli_stmt_close($course_stmt);
    mysqli_stmt_close($hall_stmt);
    mysqli_stmt_close($insert_stmt);
    mysqli_stmt_close($delete_stmt);
    mysqli_close($conn);
} else {
    echo "Invalid request method.";
}
?>
