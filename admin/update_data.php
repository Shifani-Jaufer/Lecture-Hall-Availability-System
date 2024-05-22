<?php 

include '../config.php';

session_start();

//get all lecture details

$all_lectures_query = "SELECT * FROM `lecture` where is_deleted = 0";


$all_lectures_result = mysqli_query($conn, $all_lectures_query);

if(!$all_lectures_result) {
    echo "Error in executing the query: ".mysqli_error($conn);
    exit();
}


$all_lectures = array();

while ($row = mysqli_fetch_assoc($all_lectures_result)) {
    $lec_id = $row['lecture_id'];
    $lec_name = $row['lecture_name'];
   
   
    
    $lec_department = $row['department_id'];
   
    $all_lectures[] = array(
        'lec_id' => $lec_id,
        'lec_name' => $lec_name,
        'lec_department' => $lec_department,
       
    );
}

// get lecture hall details

$all_halls_query = "SELECT * FROM `hall` where is_deleted = 0";


$all_halls_result = mysqli_query($conn, $all_halls_query);

if(!$all_halls_result) {
    echo "Error in executing the query: ".mysqli_error($conn);
    exit();
}

while($row = mysqli_fetch_assoc($all_halls_result)){
    $hall_id = $row['hall_id'];
    $hall_name = $row['hall_name'];
    $hall_capacity = $row['capacity'];

    $all_halls[] = array(
        'hall_id' => $hall_id,
        'hall_name' => $hall_name,
        'hall_capacity' => $hall_capacity
    );
}







?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="../static/css/adminupdatedata.css">
    <title>Update data page</title>

    <style>
        .notification {
    position: fixed;
    top: 0;
    left: 50%;
    transform: translateX(-50%);
    background-color: #4CAF50;
    color: white;
    padding: 16px;
    text-align: center;
    z-index: 1000;
    transition: transform 0.3s ease-in-out, opacity 0.3s ease-in-out;
}

.del_notification{
    position: fixed;
    top: 0;
    left: 50%;
    transform: translateX(-50%);
    background-color: #ED2939;
    color: white;
    padding: 16px;
    text-align: center;
    z-index: 1000;
    transition: transform 0.3s ease-in-out, opacity 0.3s ease-in-out;
}

.hidden {
    transform: translateX(-50%) translateY(-100%);
    opacity: 0;
}

    </style>
</head>

<body>
    <!--Navigation bar-->
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
                <!-- <a class="comments"><button id="showFormButton">Show Form</button></a> -->
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

    

    <!-- lectures details -->
    <div class="text1">
        <p>Lecturer Details</p>
    </div>
    <div class="table1">
        <table class="table table-bordered firsttable">
            <thead>
                <tr>
                    <th>Lecture ID</th>
                    <th>Lecture Name</th>
                    <th>Lecture Department</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($all_lectures as $lecture) {
                    echo '<tr>';
                    echo '<td><input type="text" name="lec_id[]" value="' . htmlspecialchars($lecture['lec_id']) . '"></td>';
                    echo '<td><input type="text" name="lec_name[]" value="' . htmlspecialchars($lecture['lec_name']) . '"></td>';
                    echo '<td><input type="text" name="lec_department[]" value="' . htmlspecialchars($lecture['lec_department']) . '"></td>';
                    echo '<td>
                            <button class="lec_update_button" data-lecture-id="' . $lecture['lec_id'] . '">Update</button>
                            <button class="lec_delete_button" data-lecture-id="' . $lecture['lec_id'] . '">Delete</button>
                        </td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>

    </div>
        

    <!-- lecture hall details -->

    
    <div class="text1">
        <p>Lecture Hall Details</p>
    </div>
    <div class="table1">
        <table class="table table-bordered firsttable">
            <thead>
                <tr>
                    <th>Hall ID</th>
                    <th>Hall Name</th>
                    <th>Hall Capacity</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($all_halls as $hall) {
                    echo '<tr>';
                    echo '<td><input type="text" name="hall_id[]" value="' . htmlspecialchars($hall['hall_id']) . '"></td>';
                    echo '<td><input type="text" name="hall_name[]" value="' . htmlspecialchars($hall['hall_name']) . '"></td>';
                    echo '<td><input type="text" name="hall_capacity[]" value="' . htmlspecialchars($hall['hall_capacity']) . '"></td>';
                    echo '<td>
                            <button class="hall_update-button" data-hall-id="' . $hall['hall_id'] . '">Update</button>
                            <button class="hall_delete-button" data-hall-id="' . $hall['hall_id'] . '">Delete</button>
                        </td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>

    </div>
    


    <!-- notification for update -->
    <div id="notification" class="notification hidden"></div>
    <div id="del_notification" class="del_notification hidden"></div>


  





<!-- FOOTER -->
<div class="footer">
    <p class="contact-info">Tel: +94 (0)45 - 3453009 (General)  |  Email: dean@geo.sab.ac.lk</p>
    <p class="copyrights-text">© Copyright SUSL 2023. All Rights Reserved.</p>
</div>
<script src="../static/js/admin/admin_update.js"></script>
</body>

</html>