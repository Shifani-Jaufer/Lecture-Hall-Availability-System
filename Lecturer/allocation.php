
<?php

@include '../config.php';

session_start();

if (!isset($_SESSION['lecture_name'])) {
    header('location:../admin.php');
    exit();
}

//get lecture name details

$lec_name_query = "SELECT lecture_name FROM `lecture` WHERE lecture_name = '" . $_SESSION['lecture_name'] . "'";
$lec_name_result = mysqli_query($conn, $lec_name_query);

if (!$lec_name_result) {
    echo "Error in executing the query: " . mysqli_error($conn);
    exit();
}

$lec_name_row = mysqli_fetch_array($lec_name_result);

if (!isset($_SESSION['lec_id'])) {
    $_SESSION['lec_id'] = $lec_name_row['lecture_id'];
}

$lecId = $_SESSION['lec_id'];

//get course details

$query = "SELECT * FROM `course`";

$result = mysqli_query($conn, $query);

if (!$result) {
    echo "Error in executing the query: " . mysqli_error($conn);
    exit();
}

$cat_course = array();
while ($row = mysqli_fetch_assoc($result)) {
    $batchId = $row['batch_id'];
    $courseName = $row['course_name'];
    $courseId = $row['course_id'];
    
    if (!isset($cat_course[$batchId])) {
        $cat_course[$batchId] = array();
    }

    $cat_course[$batchId][] = array('course_id' => $courseId, 'course_name' => $courseName);
}

//get lec hall details

$lec_hall_query = "SELECT * FROM `hall`";

$lec_hall_result = mysqli_query($conn, $lec_hall_query);

if (!$lec_hall_result) {
    echo "Error in executing the query: " . mysqli_error($conn);
    exit();
}

$lec_hall = array();

while ($row = mysqli_fetch_assoc($lec_hall_result)) {
    $hall_name = $row['hall_name'];
    $hall_id = $row['hall_id'];
    $capacity = $row['capacity'];
    $lec_hall[] = array('hall_id'=>$hall_id,'hall_name' => $hall_name, 'capacity' => $capacity);
}

//gete date details

$lec_date_query = "SELECT * FROM `lecture_day`";

$lec_date_result = mysqli_query($conn, $lec_date_query);

if (!$lec_date_result) {
    echo "Error in executing the query: " . mysqli_error($conn);
    exit();
}

$lec_date = array();

while ($row = mysqli_fetch_assoc($lec_date_result)) {
    $day_name = $row['day_name'];
    $day_id = $row['day_id'];
    $lec_date[] = array('day_name' => $day_name, 'day_id' => $day_id);
}



mysqli_close($conn);
?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../static/css/allocation.css">
    <title>Allocating a Lecture Hall</title>
</head>
<body>


    <!-- New Navigation bar-->
    <div>
        <header>
            <a href="https://www.sab.ac.lk/geo/" class="brand">SUSL</a>
            <div class="menu">
                <div class="btn">
                <i class="fas fa-times close-btn"></i>
                </div>
                <a href="dashboard.php">Dashboard</a>
                <a href="https://vle.sab.ac.lk/login/index.php">VLE</a>
                <a href="logout.php">Logout</a>
                <a href="#About Us">About</a>
                
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
                <span class="topic">LECTURE&nbspHALL&nbspALLOCATION&nbspSYSTEM</span></p>         
        </div>
    </div>

    <div class="hellodiv">
        <h3 class="hellodivtext" style="color: rgb(255, 255, 255);"><?php echo $_SESSION['lecture_name']; ?></h3>
    </div>



    <!-- REGISTRATION FORM -->
    <div class="regform">
        <h1>Allocating a Lecture Hall</h1>
    </div>

    <div class="main">
        <form action="lec_hall_booking.php" method="post">
            <!-- Lecture ID/ Name -->
            <!-- <h2 class="name">Lecture ID / Name: <h4><?php echo $_SESSION['lecture_name']; ?></h4></h2> -->

          

            <!-- Batch -->
            <h2 class="name">Batch</h2>
            <select name="subject" class="option">
                <option disabled="disabled" selected="selected">--Choose Option</option>
                <option>17GES</option>
                <option>18GES</option>
                <option>19GES</option>
                <option>20GES</option>
            </select>

            <!-- Subject -->
            <h2 class="name">Subject</h2>
            <select name="course" id="course" class="option">
            <option disabled="disabled" selected="selected">--Choose Option</option>
        <?php
        foreach ($cat_course as $batchId => $courses) {
            foreach ($courses as $course) {
                $courseId = $course['course_id'];
                $courseName = $course['course_name'];
                echo "<option value='$courseId'>$courseName</option>";
            }
        }
        ?>
    </select>

            <!-- Lecture Hall -->
            <h2 class="name">Lecture Hall</h2>
            
            <select name="hall" id="hall" class="option">
            <option disabled="disabled" selected="selected">--Choose Option</option>
        <?php
        foreach ($lec_hall as $hall) {
            echo "<option value='" . $hall['hall_id'] . "'>" . $hall['hall_name'] . " (Capacity: " . $hall['capacity'] . ")</option>";
        }
        ?>
    </select>

            <!-- Date -->
            <h2 class="name">Date</h2>
            
            <select name="day" id="day" class="option">
            <option disabled="disabled" selected="selected">--Choose Option</option>
        <?php
        foreach ($lec_date as $day) {
            echo "<option value='" . $day['day_id'] . "'>" . $day['day_name'] . "</option>";
        }
        ?>
    </select>

            <!-- Time -->
            <h2 class="name">Date </h2>
<input type="date" name="date" class="option">



<h2 class="name">Boking Date : </h2>
<input type="time" id="booking_time" name="time" class="option">

            <!-- Request Button -->
            <div class="reqbutton">
                <button type="submit" class="request">Request</button>
            </div>
            
        </form>
    </div>


    <div class="footer">
        <p class="contact-info">Tel: +94 (0)45 - 3453009 (General)  |  Email: dean@geo.sab.ac.lk</p>
        <p class="copyrights-text">© Copyright SUSL 2023. All Rights Reserved.</p>
    </div>
    
</body>
</html>