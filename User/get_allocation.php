<?php
@include '../config.php';
session_start();

$batchid = $_SESSION['b_id'];

if (isset($_POST['date'])) {
    $selectedDate = $_POST['date'];

    // Replace with your actual query
    $query = "SELECT * FROM allocation WHERE day_id = ? AND batch_id = ?";
    
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $selectedDate, $batchid);
    $stmt->execute();
    $result = $stmt->get_result();

    $html = '<table>';
    $html .= '<tr><th>Start Time</th><th>End Time</th><th>Course Code</th><th>Lecture Hall</th></tr>';
    
    while ($data = $result->fetch_assoc()) {
        $html .= '<tr>';
        $html .= '<td>' . $data['start_time'] . '</td>';
        $html .= '<td>' . $data['end_time'] . '</td>';
        $html .= '<td>' . $data['course_id'] . '</td>';
        $html .= '<td>' . $data['batch_id'] . '</td>';
        $html .= '</tr>';
    }
    
    $html .= '</table>';

    echo $html;
}
?>
