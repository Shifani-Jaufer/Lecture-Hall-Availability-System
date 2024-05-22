$(document).ready(function () {

    function deleteNotification(message) {
        const notification = $('#del_notification');
        notification.text(message);
        notification.removeClass('hidden');
        setTimeout(function() {
            notification.addClass('hidden');
        }, 3000); 
    }



   $("#comment_clear").click(function () {
        // Display a confirmation dialog
        if (confirm("Are you sure you want to clear the table?")) {
            $.ajax({
                type: 'POST',
                url: './delete_process/delete_all_comments.php',
                success: function (response) {
                    deleteNotification(response);
                    $(".table tbody").empty();
                },
                error: function () {
                    console.log('Error clearing comments.');
                }
            });
        }
    });

    function deleteNotification(message) {
        deleteNotification(message);
    }
});