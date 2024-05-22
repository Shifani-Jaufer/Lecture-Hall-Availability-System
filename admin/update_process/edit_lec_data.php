<?php
// Include your database connection code here

@include '../../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
        // Update operation
        $lectureId = $_POST['lectureId'];
        $lecId = $_POST['lecId'];
        $lecName = $_POST['lecName'];
        $lecDepartment = $_POST['lecDepartment'];

        echo $lectureId;
        echo $lecId;
        echo $lecName;
        echo $lecDepartment;



        // Perform the update operation in your database using the provided data
        $update_query = "UPDATE lecture SET lecture_id = '$lecId', lecture_name = '$lecName', department_id = '$lecDepartment' WHERE lecture_id = '$lectureId'";
        
        // Execute the SQL query
        $result = mysqli_query($conn, $update_query);

        if (!$result) {
            // Handle the error if the query fails
            echo "Update failed: " . mysqli_error($conn);
        } else {
            // Send a success response to the client
            echo "Update successful";
        }
   
}
?>
