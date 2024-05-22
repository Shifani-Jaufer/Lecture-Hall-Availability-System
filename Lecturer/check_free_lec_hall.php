<?php 

@include '../config.php';

session_start();


if (!isset($_SESSION['lecture_name'])) {
    header('location:../admin.php');
    exit();
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $DayId = $_POST['dayId'];

    $query = " SELECT h.* FROM `hall` AS h LEFT JOIN ( SELECT l.hall_id FROM `allocation` AS a INNER JOIN `lecture_day` AS d ON a.day_id = d.day_id INNER JOIN `hall` AS l ON a.hall_id = l.hall_id WHERE a.day_id = '$DayId' ) AS selected_halls ON h.hall_id = selected_halls.hall_id WHERE selected_halls.hall_id IS NULL;";
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