
<?php
@include '../config.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $batch = mysqli_real_escape_string($conn, $_POST['batch']);
    $comment = mysqli_real_escape_string($conn, $_POST['comment']);

    if (empty($batch) || empty($comment)) {
        echo "Both batch and comment are required.";
        exit();
    }

    $query = "INSERT INTO student_comment (batch_id, std_comment) VALUES ('$batch', '$comment')";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        echo "Error in executing the query: " . mysqli_error($conn);
        exit();
    }

    echo "Comment added successfully";
}
?>
