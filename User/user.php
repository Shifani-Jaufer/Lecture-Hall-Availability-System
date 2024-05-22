<?php
@include '../config.php';
session_start();

$get_extra_lec = "SELECT * FROM extra_lecture_allocation";
$extra_lec_result = mysqli_query($conn, $get_extra_lec);

if (!$extra_lec_result) {
    echo "Error: " . mysqli_error($conn);
    exit();
}

$extra_lec = mysqli_fetch_all($extra_lec_result, MYSQLI_ASSOC);

echo $extra_lec;




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../static/css/Studentview.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <title>User Dashboard</title>
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
                <a href="https://www.sab.ac.lk/geo/">Home</a>
                <a href="https://vle.sab.ac.lk/login/index.php">VLE</a>
                <a href="../front_page.php">Back to Home</a>
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


    


    <!-- SELECTING BATCH -->
    <div class="batchandday">
        <div class="reddiv">
            <div class="paragraph1">
                <p>The time table for your batch for this week will be shown here. <br>
                    Please Select Your Batch and the Day;</p>
            </div>

            <div class="commentbtn">
                <a class="comments"><button id="showFormButton">Any Suggestions?</button></a>
            </div>

            

        </div>

        <div class="batchform">
            <form action="process_form.php" method="post" id="student-data">

                <div class="div1">
                    <fieldset class="selectingbatch">
                        <!-- <legend>Select Batch:</legend> -->
                        <label class="label1">
                            <input type="radio" name="batch" value="16GES">
                            16GES
                        </label>
                        <label class="label1">
                            <input type="radio" name="batch" value="17GES">
                            17GES
                        </label>
                        <label class="label1">
                            <input type="radio" name="batch" value="18GES">
                            18GES
                        </label>
                        <label class="label1">
                            <input type="radio" name="batch" value="19GES">
                            19GES
                        </label>
                        <label class="label1">
                            <input type="radio" name="batch" value="20GES">
                            20GES
                        </label>
                       
                    </fieldset>
            
                    <fieldset class="dayfield">
                        <label for="day" class="labelday">
                            <select name="day" id="day" class="selectingday">
                                <option value="D1">Monday</option>
                                <option value="D2">Tuesday</option>
                                <option value="D3">Wednesday</option>
                                <option value="D4">Thursday</option>
                                <option value="D5">Friday</option>
                                <option value="D6">Saturday</option>
                                <option value="D7">Sunday</option>
                            </select>
                        </label>
                    </fieldset>

                </div>
                

                <div class="div2">
                    <input class="submitbutton" type="submit" value="Submit">
                </div>
        
                
            </form>
        </div>
    </div>





    <div class="table1">
        <table id="result-table" border="1" class="table table-bordered firsttable">
            <thead>
                <tr>
                    <th>Batch</th>
                    <th>Course</th>
                    <th>Hall</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                </tr>
            </thead>
            <tbody>
                <!-- Data will be inserted here dynamically -->
            </tbody>
        </table>
    </div>

    <div class="topic1">
        <h3 class="topic1text" style="color: rgb(255, 255, 255);">Extra Lectures Allocated</h3>
    </div>


    <div class="table1">
        <table id="result-table1" border="1" class="table table-bordered firsttable">
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
            <?php foreach ($extra_lec as $row) : ?>
                <tr>
                    <td><?php echo $row['Lecture_Name']; ?></td>
                    <td><?php echo $row['Batch']; ?></td>
                    <td><?php echo $row['Course']; ?></td>
                    <td><?php echo $row['Hall']; ?></td>
                    <td><?php echo $row['Day']; ?></td>
                    <td><?php echo $row['Date']; ?></td>
                    <td><?php echo $row['Time']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

    <!-- NEW DIVISION STARTS -->
    <div class="body-section">
        <div class="intro-text">
            <h3 class="welcometofog">About Faculty of Geomatics!</h3>
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
    <!-- NEW DIVISION ENDS -->

    <div class="footer">
        <p class="contact-info">Tel: +94 (0)45 - 3453009 (General)  |  Email: dean@geo.sab.ac.lk</p>
        <p class="copyrights-text">© Copyright SUSL 2023. All Rights Reserved.</p>
    </div>

    <!-- comment Form -->
    <!-- <h1>comment form</h1> -->

    <div id="overlay" class="overlay">
        <div id="formContainer" class="form-container">
            <form id="myForm" action="#" method="post">

                <div class="boxtopic">Leave your comments here;</div>

                <div class="boxbatchselect">
                    <div class="batchselecttext">
                        <label for="batch">Select your Batch:</label>
                    </div>

                    <div class="selectingbutton">
                        <label class="label1">
                            <input type="radio" name="batch" value="16GES">
                            16GES
                        </label>
                        <label class="label1">
                            <input type="radio" name="batch" value="17GES">
                            17GES
                        </label>
                        <label class="label1">
                            <input type="radio" name="batch" value="18GES">
                            18GES
                        </label>
                        <label class="label1">
                            <input type="radio" name="batch" value="19GES">
                            19GES
                        </label>
                        <label class="label1">
                            <input type="radio" name="batch" value="20GES">
                            20GES
                        </label>
                    </div>
                </div>
         
                <!-- <label for="comment">Comment:</label> -->

                <div class="areatyping">
                    <textarea name="comment" id="comment" cols="30" rows="10" placeholder="Type Here!"></textarea>
                </div>

                <div class="submitbtndiv">
                    <button class="boxsubmitbutton" type="submit">Submit</button>
                    <button id="closeForm" class="boxsubmitbutton" type="cancel">Cancel</button>
                </div>        
                
            </form>
        </div>
    </div>

    


 
<script src="../static/js/User/user.js"></script>
</body>

</html>