$(document).ready(function () {

    function deleteNotification(message) {
        const notification = $('#del_notification');
        notification.text(message);
        notification.removeClass('hidden');
        setTimeout(function() {
            notification.addClass('hidden');
        }, 3000); 
    }






    $('button.book-now').click(function () {
        var row = $(this).closest('tr');
        var lecture_name = row.find('td:eq(0)').text();
        var batch_id = row.find('td:eq(1)').text();
        var course_id = row.find('td:eq(2)').text();
        var hall_id = row.find('td:eq(3)').text();
        var day_id = row.find('td:eq(4)').text();
        var date = row.find('td:eq(5)').text();
        var time = row.find('td:eq(6)').text();

        $.ajax({
            type: 'POST',
            url: 'update_allocation.php',
            data: {
                lecture_name: lecture_name,
                batch_id: batch_id,
                course_id: course_id,
                hall_id: hall_id,
                day_id: day_id,
                date: date,
                time: time
            },
            success: function (response) {
                //alert(response);
                //console.log(response);

                row.remove();
            },
            error: function () {
                console.log('Error updating allocation.');
            }
        });

       
    });

    $("#comment_clear").click(function () {
        $.ajax({
            type: 'POST',
            url: './delete_process/delete_all_comments.php',
            success: function (response) {
                deleteNotification(response);
                location.reload();
            },
            error: function () {
                console.log('Error clearing comments.');
            }
        });
    });
});