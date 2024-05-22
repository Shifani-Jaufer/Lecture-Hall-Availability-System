<?php 
@include '../config.php';
session_start();


//get all student comments

$query = "SELECT * FROM `student_comment`";

$result = mysqli_query($conn, $query);

if(!$result) {
    echo "Error in executing the query: ".mysqli_error($conn);
    exit();
}

$student_comments = array();

while ($row = mysqli_fetch_assoc($result)) {
    $batch = $row['batch_id'];
    $comment = $row['std_comment'];

    $student_comments[] = array(
        'batch' => $batch,
        'comment' => $comment
    );
}











?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../static/css/student_comments.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Student Comment Pge</title>

    <style>
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

/* Modal Styles */
.modal {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0,0,0,0.4);
}

.modal-content {
    background-color: #fff;
    margin: 20% auto;
    padding: 20px;
    width: 60%;
    text-align: center;
    border-radius: 5px;
}

.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}

    </style>
</head>





<body>
    <!--Navigation bar-->
    <div>
        <header>
            <a href="#" class="brand">SUSL</a>
            <div class="menu">
                <div class="btn">
                <i class="fas fa-times close-btn"></i>
                </div>
                <!-- <a href="https://www.sab.ac.lk/geo/">Home</a>
                <a href="https://vle.sab.ac.lk/login/index.php">VLE</a> -->
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

    <div class="text1">
        <p>All the Comments made by Students are shown below!</p>
        
    </div>


    <!-- TABLE -->
    <div class="table1">
        <table class="table table-bordered firsttable">
            <thead>
                <tr>
                    <th>Batch</th>
                    <th>Comment</th>
                </tr>
            </thead>
            <tbody >
                <?php
                foreach ($student_comments as $comment) {
                    echo '<tr>';
                    echo '<td>' . htmlspecialchars($comment['batch']) . '</td>';
                    echo '<td>' . htmlspecialchars($comment['comment']) . '</td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </div>


    <div class="clearcomments">
        <a href="" ><button id="comment_clear" type="submit">Clear All Comments</button>
    </div>
    


    <!-- FOOTER -->
    <div class="footer">
        <p class="contact-info">Tel: +94 (0)45 - 3453009 (General)  |  Email: dean@geo.sab.ac.lk</p>
        <p class="copyrights-text">© Copyright SUSL 2023. All Rights Reserved.</p>
    </div>

    <!-- notifications -->

    <div id="del_notification" class="del_notification hidden"></div>
    <script src="../static/js/admin/admin_del_comments.js"></script>

   
<!-- Modal Dialog -->
<div id="confirmationModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <p>Are you sure you want to delete this hall?</p>
        <button id="confirmButton">Yes</button>
        <button id="cancelButton">No</button>
    </div>
</div>



</body>
</html>
