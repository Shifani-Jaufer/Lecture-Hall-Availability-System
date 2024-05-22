<?php

@include '../config.php';

session_start();

if (!isset($_SESSION['lecture_name'])) {
    header('location:../admin.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $hallId = $_POST['hallId'];
    $dayId = $_POST['dayId'];

    $query = "SELECT a.*, c.course_name, d.day_name, l.hall_name
    FROM `allocation` AS a
    INNER JOIN `course` AS c ON a.course_id = c.course_id
    INNER JOIN `lecture_day` AS d ON a.day_id = d.day_id
    INNER JOIN `hall` AS l ON a.hall_id = l.hall_id 
    WHERE a.hall_id = '$hallId' AND a.day_id = '$dayId'
    LIMIT 0, 25;
    ";

    $result = mysqli_query($conn, $query);

    if (!$result) {
        echo "Error in executing the query: " . mysqli_error($conn);
        exit();
    }

    $rows = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    header('Content-Type: application/json');
    echo json_encode($rows);
}

?>
