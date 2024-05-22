<?php
@include '../config.php';

session_start();

if (!isset($_SESSION['lecture_name'])) {
    header('location:../admin.php');
    exit();
}


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

    if (!isset($cat_course[$batchId])) {
        $cat_course[$batchId] = array();
    }

    $cat_course[$batchId][] = array('course_name' => $courseName);
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../static/css/admindashboard.css">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous"> -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <title>Admin Dashboard</title>

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
  
</head>

<body>
    <div>
        <header>
            <a href="https://www.sab.ac.lk/geo/" class="brand">SUSL</a>
            <div class="menu">
                <div class="btn">
                <i class="fas fa-times close-btn"></i>
                </div>
                <a href="https://vle.sab.ac.lk/login/index.php">VLE</a>
                <a href="logout.php">Logout</a>  
                <a href="logout.php">Logout</a> 
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

    <!-- This contains Hello Mr. part and more information button -->
    <div class="upperpart">
        <div class="helloname">
            <h3 class="hello" style="color: rgb(255, 255, 255);">Hello, <?php echo $_SESSION['lecture_name']; ?></h3>
        </div>

        <div class="searchbutton">
            <div class="infotext">
                <p>For More Information;</p>
            </div>

            <div class="buttonbody">
                <a href="about.php"><button class="clickbutton">Click Here</button></a>
            </div>               
        </div>
    </div>
    
    

    <!-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <img src="../static/images/uni_logo.jpg" alt="" style="max-width: 35px; max-height:35px;">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="user.php">Faculty of Geomatics <span class="sr-only">(current)</span></a>
                </li>
            </ul>
            <h3 style="color: aqua;"><?php echo $_SESSION['lecture_name']; ?></h3>
            <a href="about.php">Search</a>
            <a href="logout.php" class="btn btn-danger">Log Out</a>
        </div>
    </nav> -->


    <!-- CARDS FOR SCHEDULES -->
    <div class="wrapper">

        <!-- <div class="single-card">
          <div class="batchname">
            <h3>17GES</h3>
          </div>
          
          <div class="info">
            <h3>Mobile Phone</h3>
          </div>
        </div>
    
        <div class="single-card">
            <div class="batchname">
              <h3>18GES</h3>
            </div>
            
            
            <div class="info">
              <h3>Mobile Phone</h3>
            </div>
        </div>
    
        <div class="single-card">
            <div class="batchname">
              <h3>19GES</h3>
            </div>
            
            <div class="info">
              <h3>Mobile Phone</h3>
            </div>
        </div>
    
        <div class="single-card">
            <div class="batchname">
              <h3>20GES</h3>
            </div>
            
            <div class="info">
              <h3>Mobile Phone</h3>
            </div>
        </div>

        <div class="single-card">
            <div class="batchname">
              <h3>21GES</h3>
            </div>
            
            <div class="info">
              <h3>Mobile Phone</h3>
            </div>
        </div> -->

        <?php foreach (['16GES', '17GES', '18GES', '19GES', '20GES','21GES'] as $batchId) { ?>
                
                    <div class="single-card">
                        <div class="batchname">
                            <h5 >Batch: <?php echo $batchId; ?></h5>
                        </div>
                        <div class="info">
                            <?php if (isset($cat_course[$batchId]) && count($cat_course[$batchId]) > 0) { ?>
                                <ul class="list-group list-group-flush">
                                    <?php foreach ($cat_course[$batchId] as $course) { ?>
                                        <li class="list-group-item"><?php echo $course['course_name']; ?></li>
                                    <?php } ?>
                                </ul>
                            <?php } else { ?>
                                <p class="text-muted">No courses available for this batch</p>
                            <?php } ?>
                        </div>
                    </div>
                
            <?php } ?>
    </div>
   
    <!-- <div class="container mt-4">
        <div class="row">
            <?php foreach (['16GES', '17GES', '18GES', '19GES', '20GES','21GES'] as $batchId) { ?>
                <div class="col-md-4 mb-4">
                    <div class="card shadow">
                        <div class="card-header bg-primary text-white">
                            <h5 class="card-title">Batch: <?php echo $batchId; ?></h5>
                        </div>
                        <div class="card-body">
                            <?php if (isset($cat_course[$batchId]) && count($cat_course[$batchId]) > 0) { ?>
                                <ul class="list-group list-group-flush">
                                    <?php foreach ($cat_course[$batchId] as $course) { ?>
                                        <li class="list-group-item"><?php echo $course['course_name']; ?></li>
                                    <?php } ?>
                                </ul>
                            <?php } else { ?>
                                <p class="text-muted">No courses available for this batch</p>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div> -->
</div>

    <div class="footer">
        <p class="contact-info">Tel: +94 (0)45 - 3453009 (General)  |  Email: dean@geo.sab.ac.lk</p>
        <p class="copyrights-text">© Copyright SUSL 2023. All Rights Reserved.</p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>

</html>
