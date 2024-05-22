

function date() {
    var d = new Date();
    var n = d.toDateString();
    console.log(n);
    document.getElementById("date-h1").innerText = n;
}

// function clock() {
//     var d = new Date();
//     var n = d.toLocaleTimeString();
//     document.getElementById("time-h1").innerText = n;
// }
// setInterval(clock, 1000);
//date();

$(document).ready(function () {
    $('#student-data').submit(function (e) {
        e.preventDefault(); 

        var formData = $(this).serialize();

        $.ajax({
            type: 'POST',
            url: 'process_form.php', 
            data: formData,
            dataType: 'json', // Expect JSON response
            success: function (data) {
                // Clear previous data
                $('#result-table tbody').empty();

                // Loop through the data and create table rows
                $.each(data, function (index, row) {
                    var newRow = '<tr>';
                    newRow += '<td>' + row.batch_id + '</td>';
                    newRow += '<td>' + row.course_id + '</td>';
                    newRow += '<td>' + row.hall_id + '</td>';
                    newRow += '<td>' + row.start_time + '</td>';
                    newRow += '<td>' + row.end_time + '</td>';
                    newRow += '</tr>';
                    $('#result-table tbody').append(newRow);
                });
            },
            error: function (e) {
                // Handle errors here
                console.log('Errors: ',e);
            }
        });
    });


    //for comment form

    const showFormButton = $('#showFormButton');
    const overlay = $('#overlay');
    const formContainer = $('#formContainer');
    const myForm = $('#myForm');

    showFormButton.click(function() {
        overlay.css('display', 'block');
        formContainer.css('opacity', '1');
    });


    myForm.submit(function(e) {
        e.preventDefault();

        
        const formData = myForm.serialize();

        
        $.ajax({
            type: 'POST',
            url: 'comment_form.php', 
            data: formData,
           
            success: function(response) {
                
                console.log(response);
                
                overlay.css('display', 'none');
                formContainer.css('opacity', '0');
                myForm[0].reset(); 
            },
            error: function(xhr, textStatus, errorThrown) {
                
                console.error('Error: ' + textStatus, errorThrown);
            }

            
        });

        console.log(formData);
    });


    $('#closeForm').click(function() {
        overlay.css('display', 'none');
        formContainer.css('opacity', '0');
    });


});








