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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../static/css/adminabout.css">
    
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <title>My Search</title>
  
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
    
  

<?php if (isset($successMessage)) { ?>
        <div id="successMessage" class="alert alert-success mt-3">
            <?php echo $successMessage; ?>
        </div>
    <?php } ?>


    <div class="hellodiv">
        <h3 class="hellodivtext" style="color: rgb(255, 255, 255);">Hello, <?php echo $_SESSION['lecture_name']; ?></h3>
    </div>






    <!-- NEW DIVISION STARTS -->
    <div class="body-section">
        <div class="intro-text">
            <h3 class="welcometofog">Welcome to Faculty of Geomatics!</h3>
            <p class="intro-paragraph">
                    Your time table for this week for relavant batch and the subject will be shown below.
                    Availability of any Lecture Hall or Free Lecture Halls at this moment can also be seen. 
            </p>
        </div>                           
    </div>
    <!-- NEW DIVISION ENDS -->

    <div class="topic1">
        <h3 class="topic1text" style="color: rgb(255, 255, 255);">Time Table for the Week</h3>
    </div>




    <div class="viewtimetable">
        <!--VIEW TIME TABLE DIVISION-->
            <div class="helloname">
                <h3 class="hello" style="color: rgb(0, 0, 0);">View your time table for this week!</h3>
                <p class="pleaseselect">Please Select the batch and the subject to view your time table for this week.</p>
            </div>

            <div class="selection">
                <div class="selectingbatch">

                </div>

                <div class="selectingcourse">

                </div>

            </div>


            <form action="process_data.php" method="post" id="timetable-form">
                <label class="selectbatch" for="batch">Select Batch:</label>
                <select name="batch" id="batch">
                    <option value="16GES">16GES</option>
                    <option value="17GES">17GES</option>
                    <option value="18GES">18GES</option>
                    <option value="19GES">19GES</option>
                    <option value="20GES">20GES</option>
                </select>

                <label class="selectcourse" for="course">Select Course:</label>
                <select name="course" id="course">
                    <?php
                    foreach ($cat_course as $batchId => $courses) {
                        foreach ($courses as $course) {
                            $courseId = $course['course_id'];
                            $courseName = $course['course_name'];
                            echo "<option value='$courseId'>$courseName</option>";
                        }
                    }
                    ?>
                </select><br>
                <input class="button11" type="submit" value="View Timetable">
            </form>

            <div class="container mt-5 table1">
                <table class="table table-bordered firsttable">
                    <thead>
                        <tr>
                            <th>Batch ID</th>
                            <th>Day</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Course ID</th>
                            <th>Course Name</th>            
                            <th>Hall Name</th>
                        
                        </tr>
                    </thead>
                    <tbody id="available-table-body">
                        
                    </tbody>
                </table>
            </div>


    


            <div class="topic1">
                <h3 class="topic1text" style="color: rgb(255, 255, 255);">Lecture Hall Availability</h3>
            </div>


            <!-- AVAILABILITY DIVISION -->
            <div class="apply-lec-hall">
                <h3 class="hello">Check hall availability for my lecture!</h3>
                <p class="pleaseselect">You can availability of lecture hall here. Select the lecture hall and the day;</p>
                <form action="check_availability.php" id="check-availability" method="post">
                    
                    
                    
                <label for="hall">Select Lecture Hall:</label>
                <select name="hall" id="hall">
                    <?php
                    foreach ($lec_hall as $hall) {
                        echo "<option value='" . $hall['hall_id'] . "'>" . $hall['hall_name'] . " (Capacity: " . $hall['capacity'] . ")</option>";
                    }
                    ?>
                </select>

                <label for="day" class="selectingday2">Select Day:</label>
                <select name="day" id="day">
                    <?php
                    foreach ($lec_date as $day) {
                        echo "<option value='" . $day['day_id'] . "'>" . $day['day_name'] . "</option>";
                    }
                    ?>
                </select><br>
                    <input class="button11" type="submit" value="Check Availability">
                </form>
            </div>


            <div class="container mt-5 table1">
                <table class="table table-bordered firsttable">
                    <thead>
                        <tr>
                            
                            <th>Batch ID</th>
                            <th>Day</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Course ID</th>
                            <th>Course Name</th>
                            <th>Hall Name</th>
                        </tr>
                    </thead>
                    <tbody id="allocation-table-body">
                        
                    </tbody>
                </table>
            </div>





            <div class="topic1">
                <h3 class="topic1text" style="color: rgb(255, 255, 255);">Available Lecture Halls</h3>
            </div>

            <!-- CHECK FREE LECTURE HALLS -->
            <div class="helloname">
                <h3 class="hello">Checking the Lecture Halls Available!</h3>
                <p class="pleaseselect">You can check the lecture halls available on this week to your lecture. Please select the day for checking availability;</p>
                <form action="check_free_lec_hall.php" method="post" id="check_free_hall">

                    <label for="day">Select Day:</label>
                        <select name="day" id="check_day">
                            <?php
                            foreach ($lec_date as $day) {
                                echo "<option value='" . $day['day_id'] . "'>" . $day['day_name'] . "</option>";
                            }
                            ?>
                        </select><br>
                    
            
                        <input class="button11" type="submit" value="Check Lecture Hall">
                    
                    
                    </form>

            </div>



            <div class="container mt-5 table1">
                <table class="table table-bordered firsttable">
                    <thead>
                        <tr>
                            
                            <th>Lecture Hall ID</th>
                            <th>Lecture Hall Name</th>
                            <th>Capacity</th>
                            <th>Do you want to book this?</th>
                        
                        </tr>
                    </thead>
                    <tbody id="check-day-table-body">
                        
                    </tbody>
                </table>
            </div>
    </div>

<div class="footer">
    <p class="contact-info">Tel: +94 (0)45 - 3453009 (General)  |  Email: dean@geo.sab.ac.lk</p>
    <p class="copyrights-text">© Copyright SUSL 2023. All Rights Reserved.</p>
</div>


<!-- js code -->

<script src="../static/js/Lecturer/lecturer.js"></script>


    
</body>
</html>