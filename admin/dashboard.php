<?php

@include '../config.php';

session_start();

if(!isset($_SESSION['name'])) {
    header('location:../admin.php');
    exit();
}


//get all booking details

$query = "SELECT * FROM `booking_lec_hall`";

$result = mysqli_query($conn, $query);

if(!$result) {
    echo "Error in executing the query: ".mysqli_error($conn);
    exit();
}

$booking_details = array();


while ($row = mysqli_fetch_assoc($result)) {
    $lec_name = $row['lecture_name'];
    $batch = $row['batch_id'];
    $course_id = $row['course_id'];
    $hall_id = $row['hall_id'];
    $day_id = $row['day_id'];
    $date = $row['date'];
    $time = $row['time'];

    // Fetch course name based on course_id
    $course_name_query = "SELECT course_name FROM course WHERE course_id = '$course_id'";
    $course_name_result = mysqli_query($conn, $course_name_query);

    if (!$course_name_result) {
        echo "Error in executing the query: " . mysqli_error($conn);
        exit();
    }

    $course_name_row = mysqli_fetch_array($course_name_result);
    $course_name = $course_name_row['course_name'];

   
    $day_name_query = "SELECT day_name FROM lecture_day WHERE day_id = '$day_id'";
    $day_name_result = mysqli_query($conn, $day_name_query);

    if (!$day_name_result) {
        echo "Error in executing the query: " . mysqli_error($conn);
        exit();
    }

    $day_name_row = mysqli_fetch_array($day_name_result);
    $day_name = $day_name_row['day_name'];

    $hall_name_query = "SELECT hall_name FROM hall WHERE hall_id = '$hall_id'";
    $hall_name_result = mysqli_query($conn, $hall_name_query);

    if (!$hall_name_result) {
        echo "Error in executing the query: " . mysqli_error($conn);
        exit();
    }

    $hall_name_row = mysqli_fetch_array($hall_name_result);
    $hall_name = $hall_name_row['hall_name'];


    $booking_details[] = array(
        'lecture_name' => $lec_name,
        'batch_id' => $batch,
        'course_id' => $course_name,
        'hall_id' => $hall_name,
        'day_id' => $day_name,
        'date' => $date,
        'time' => $time
    );
}

 
// get notification count

$notification_count_query = "SELECT COUNT(*) AS count FROM student_comment;";

$notification_count_result = mysqli_query($conn, $notification_count_query);

if (!$notification_count_result) {
    echo "Error in executing the query: " . mysqli_error($conn);
    exit();
}

$notification_count_row = mysqli_fetch_array($notification_count_result);

$notification_count = $notification_count_row['count'];


if ($notification_count !== null && $notification_count !== 0) {
    $notificationHtml = "<a href='student_comments.php'><i class='fa fa-bell'><span><sup>$notification_count</sup></span></i></a>";
} else {
    $notificationHtml = "<a href='#'><i class='fa fa-bell'></i></a>";
}




?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../static/css/admindashboard.css">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
        crossorigin="anonymous"></script>
    <title>Admin Dashboard</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">

</head>

<body>
    <div>
        <header>
            <a href="#" class="brand">SUSL</a>
            <div class="menu">
                <div class="btn">
                    <i class="fas fa-times close-btn"></i>
                </div>
                <?php echo $notificationHtml; ?>
                <!-- <a href="https://www.sab.ac.lk/geo/">Home</a>
                <a href="https://vle.sab.ac.lk/login/index.php">VLE</a> -->
                <a href="logout.php">Logout</a>
                <a href="https://vle.sab.ac.lk/login/index.php">VLE</a>
                <!-- <a href="add_data.php">Add data</a>
                <a href="update_data.php">Update data</a> -->
                
                
            </div>

            <div class="btn">
                <i class="fas fa-bars menu-btn"></i>
            </div>
        </header>
    </div>

    <!--HEADER-->
    <div class="header">
        <div class="left-section">
            <img class="uni-logo" src="../static/images/unilogo.png" alt="">
        </div>

        <div class="right-section">
            <p><span class="facname">FACULTY OF GEOMATICS</span><br>
                <span class="uniname">SABARAGAMUWA UNIVERSITY OF SRI LANKA</span><br>
                <span class="topic">LECTURE&nbspHALL&nbspALLOCATION&nbspSYSTEM</span>
            </p>
        </div>
    </div>


    <!-- ADDING OR UPDATING -->
    <div class="addupdate">
        <a class="addupdatebtn" href="add_data.php"><button class="btnbtn">Add a new Lecturer/Lecture Hall</button></a>
        <a class="addupdatebtn" href="update_data.php"><button class="btnbtn">Update Existing Lecturers/Lecture Halls</button></a>
    </div>

    <div class="text1">
        <p>All the Bookings made by Lecturers are shown below!</p>
    </div>


    <div class="table1">
        <table class="table table-bordered firsttable">
            <thead>
                <tr>
                    <th>Lecture Name</th>
                    <th>Batch</th>
                    <th>Course</th>
                    <th>Hall</th>
                    <th>Day</th>
                    <th>Date</th>
                    <th>Time</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($booking_details as $booking) { ?>
                <tr>
                    <td>
                        <?php echo $booking['lecture_name']; ?>
                    </td>
                    <td>
                        <?php echo $booking['batch_id']; ?>
                    </td>
                    <td>
                        <?php echo $booking['course_id']; ?>
                    </td>
                    <td>
                        <?php echo $booking['hall_id']; ?>
                    </td>
                    <td>
                        <?php echo $booking['day_id']; ?>
                    </td>
                    <td>
                        <?php echo $booking['date']; ?>
                    </td>
                    <td>
                        <?php echo $booking['time']; ?>
                    </td>
                    <td><button class="book-now">book now</button></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>

    </div>
    <?php if (!empty($booking_details)) { ?>

    <?php } else { ?>
    <p>No booking details available.</p>
    <?php } ?>







    <div class="footer">
        <p class="contact-info">Tel: +94 (0)45 - 3453009 (General) | Email: dean@geo.sab.ac.lk</p>
        <p class="copyrights-text">© Copyright SUSL 2023. All Rights Reserved.</p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
        crossorigin="anonymous"></script>

    <script src="../static/js/admin/admin.js"></script>
</body>

</html>