<?php 




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="../static/css/adminadddata.css">
    <title>Add Data</title>

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


    <!-- ADDING Lecturer -->
    <div class="text1">
        <p>Add a New Lecturer</p>
    </div>
    
    <div class="sec1"> 
        
        <div class="sec1in">
            <form id="lectureForm" method="post" >
                <label for="lectureID">Lecture ID:</label>
                <input type="text" id="lectureID" name="lectureID" required><br><br>
    
                <label for="lectureName">Lecture Name:</label>
                <input type="text" id="lectureName" name="lectureName" required><br><br>
    
                <label for="departmentID">Department:</label>
                <select id="departmentID" name="departmentID" required>
                    <option value="SG">Surveying and Geodesy</option>
                    <option value="RS">Remote sensing and GIS</option>
                </select><br><br>
                
                <input class="btnsubmit" type="submit" value="Submit">
            </form>     
        </div>       
            
    </div>


    <!-- ADDING HALL -->
    <div class="text1">
        <p>Add a New Lecture Hall</p>
    </div>

    <div class="sec1">
        <div class="sec1in">
            <form id="hallForm" method="post" >
                <label for="hallId">Hall Id:</label>
                <input type="text" id="hallId" name="hallId" required><br><br>
    
                <label for="hallName">Hall Name:</label>
                <input type="text" id="hallName" name="hallName" required><br><br>
    
                <label for="capacity">capacity:</label>
                <input type="text" id="capacity" name="capacity" required><br><br>
    

                <input class="btnsubmit" type="submit" value="Submit">
            </form>

        </div>
            
    </div>






<!-- add lecture to system -->


    <!-- <div>
        <form id="lectureForm" method="post" >
            <label for="lectureID">Lecture ID:</label>
            <input type="text" id="lectureID" name="lectureID" required><br><br>

            <label for="lectureName">Lecture Name:</label>
            <input type="text" id="lectureName" name="lectureName" required><br><br>

            <label for="departmentID">Department:</label>
            <select id="departmentID" name="departmentID" required>
                <option value="SG">Surveying and Geodesy</option>
                <option value="RS">Remote sensing and GIS</option>
            </select><br><br>


            <input type="submit" value="Submit">
        </form>
    </div> -->

    <!-- add lecture hall to system -->
   



    <!-- <div>
        <form id="hallForm" method="post" >
            <label for="hallId">Hall Id:</label>
            <input type="text" id="hallId" name="hallId" required><br><br>

            <label for="hallName">Hall Name:</label>
            <input type="text" id="hallName" name="hallName" required><br><br>

            <label for="capacity">capacity:</label>
            <input type="text" id="capacity" name="capacity" required><br><br>

        
            </select><br><br>


            <input type="submit" value="Submit">
        </form>
    </div> -->

    <div id="notification" class="notification hidden"></div>
    <script src="../static/js/admin/admin_add.js"></script>

    <!-- FOOTER -->
    <div class="footer">
        <p class="contact-info">Tel: +94 (0)45 - 3453009 (General)  |  Email: dean@geo.sab.ac.lk</p>
        <p class="copyrights-text">© Copyright SUSL 2023. All Rights Reserved.</p>
    </div>
</body>
</html>