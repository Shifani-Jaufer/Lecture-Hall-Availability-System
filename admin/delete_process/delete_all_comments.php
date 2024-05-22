<?php
@include '../../config.php';
session_start();

$delete_query = "DELETE FROM `student_comment`";

$result = mysqli_query($conn, $delete_query);

if (!$result) {
    echo "Error: " . mysqli_error($conn);
} else {
    echo "All comments deleted successfully";
}
?>
