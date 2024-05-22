<?php
@include '../config.php';

session_start();

if (!isset($_SESSION['lecture_name'])) {
    header('location:../admin.php');
    exit();
}

//get lecture name details

$lec_name_query = "SELECT lecture_id FROM `lecture` WHERE lecture_name = '" . $_SESSION['lecture_name'] . "'";
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

$query = "SELECT * FROM `course` WHERE lecture_id = '$lecId'";

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

if (isset($_GET['success']) && $_GET['success'] == 1) {
    $successMessage = "Booking successful!";
}






mysqli_close($conn);
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Front Page</title>

    <link rel="stylesheet" href="../static/css/lecturehome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>

<body>
    <div>
        <header>
        <a href="#" class="brand">SUSL</a>
        <div class="menu">
            <div class="btn">
            <i class="fas fa-times close-btn"></i>
            </div>
            <a href="https://www.sab.ac.lk/geo/">Home</a>
            <a href="https://vle.sab.ac.lk/login/index.php">VLE</a>
            <a href="#Login">Login</a>
            <a href="#About Us">About</a>
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
        <h3 class="hellodivtext" style="color: rgb(0, 0, 0);">Hello, <?php echo $_SESSION['lecture_name']; ?></h3>
    </div>

    <!--BODY-->
    <section id="Login">
        <div class="body-section">
            <div class="intro-text">
                <h3 class="welcometofog">Welcome to Faculty of Geomatics!</h3>
                <p class="intro-paragraph">
                        The Faculty of Geomatics offers high quality geomatics related degrees and consists of a well qualified staff 
                        and latest technological resources. It delivers highly job oriented courses and the employability of the graduates 
                        is well over 99%. The faculty was established in 2004 as the successor of the Department of Surveying Sciences, 
                        which introduced the BSc in Surveying Sciences Degree Programme in 1997. Throughout the past decades it is being 
                        greatly developed both in infrastructure and human resources. Presently, the faculty has a student population of 
                        about 350 with the aim of producing about 100 graduates annually.
                </p>
            </div>                           
        </div>

    </section>
    
    

    <div class="login-as">          
        <a href="./admin.php"><button class="admin-button">ADMIN</button></a> 
        <a href="./lecturer.php"><button class="lec-button">LECTURER</button></a>   
        <a href="./User/user.php"><button class="std-button">STUDENT</button></a>                      
    </div>

    


    <div class="footer">
        <p class="contact-info">Tel: +94 (0)45 - 3453009 (General)  |  Email: dean@geo.sab.ac.lk</p>
        <p class="copyrights-text">© Copyright SUSL 2023. All Rights Reserved.</p>
    </div>




</body>
</html>