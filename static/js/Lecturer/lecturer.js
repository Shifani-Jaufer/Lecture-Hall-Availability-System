$(document).ready(function () {
        
        $("#timetable-form").submit(function (event) {
            event.preventDefault(); 

            var selectedBatch = $("#batch").val(); 
            var selectedCourse = $("#course").val(); 

           
            $.ajax({
                url: "process_data.php",
                type: "POST",
                data: { batchId: selectedBatch, courseId: selectedCourse },
                success: function (response) {
                    
                    createTable(response);
                }
            });
        });


        $("#check-availability").submit(function (event) {
            event.preventDefault(); 

            var selectedHall = $("#hall").val(); 
            var selectedDay = $("#day").val(); 
            $.ajax({
                url: "check_availability.php",
                type: "POST",
                data: { hallId: selectedHall, dayId: selectedDay },
                success: function (response) {
                    
                    populateTable(response);
                }
            });
        });


        $("#check_free_hall").submit(function (event) {

            event.preventDefault();

            var selectedDay = $("#check_day").val();
           

            $.ajax({
                url: "check_free_lec_hall.php",
                type: "POST",
                data: { dayId: selectedDay },
                success: function (response) {
                    check_data(response);
                }
            });

        });

      



        function populateTable(data) {
        var tableBody = $("#allocation-table-body");
        tableBody.empty();

       
        $.each(data, function (index,row) {
            var newRow = $("<tr>");
            newRow.append("<td>" + row.batch_id + "</td>");
            newRow.append("<td>" + row.day_name + "</td>");
            newRow.append("<td>" + row.start_time + "</td>");
            newRow.append("<td>" + row.end_time + "</td>");
            newRow.append("<td>" + row.course_id + "</td>");
            newRow.append("<td>" + row.course_name + "</td>");
            newRow.append("<td>" + row.hall_name + "</td>");
            tableBody.append(newRow);
        });
    }

    function createTable(data) {
        var tableBody = $("#available-table-body");
        tableBody.empty(); 

        
        $.each(data, function (index, row) {
            var newRow = $("<tr>");
            newRow.append("<td>" + row.batch_id + "</td>");
            newRow.append("<td>" + row.day_name + "</td>");
            newRow.append("<td>" + row.start_time + "</td>");
            newRow.append("<td>" + row.end_time + "</td>");
            newRow.append("<td>" + row.course_id + "</td>");
            newRow.append("<td>" + row.course_name + "</td>");
            newRow.append("<td>" + row.hall_name + "</td>");
            tableBody.append(newRow);
        });
    }

    

    
    });


    function check_data(data) {

        var tableBody = $("#check-day-table-body");
        tableBody.empty();

        $.each(data, function (index, row) {
            var newRow = $("<tr>");
            newRow.append("<td>" + row.hall_id + "</td>");
            newRow.append("<td>" + row.hall_name + "</td>");
            newRow.append("<td>" + row.capacity + "</td>");
            newRow.append('<td><button class="btn btn-warning"> <a href="allocation.php">Book Now !</a></button></td>');


            tableBody.append(newRow);
        });
    }


    
    
    function hideSuccessMessage() {
        var successMessage = document.getElementById("successMessage");
        if (successMessage) {
            setTimeout(function() {
                successMessage.style.display = "none";
            }, 3000); 
        }
    }

    window.onload = hideSuccessMessage ;
