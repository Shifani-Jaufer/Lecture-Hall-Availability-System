$("document").ready(function () {


    function showNotification(message) {
        const notification = $('#notification');
        notification.text(message);
        notification.removeClass('hidden');
        setTimeout(function() {
            notification.addClass('hidden');
        }, 3000); 
    }

    function deleteNotification(message) {
        const notification = $('#del_notification');
        notification.text(message);
        notification.removeClass('hidden');
        setTimeout(function() {
            notification.addClass('hidden');
        }, 3000); 
    }

    $('#lectureForm').submit(function (e) {
        e.preventDefault(); 
        var formData = $(this).serialize(); 
        
        
console.log(formData);
        $.ajax({
            type: 'POST',
            url: './add_process/add_lec.php', 
            data: formData,
            
            success: function (response) {
                console.log(response); 
                if (response === 0) {
                    deleteNotification("Some things went wrong!");
                    
                    $('#hallForm')[0].reset();
                } else {
                    showNotification(response);
                };
            }
        });
    });


    $('#hallForm').submit(function (e) {
        e.preventDefault(); 
        var formData = $(this).serialize(); 
        
       

        $.ajax({
            type: 'POST',
            url: './add_process/add_hall.php', 
            data: formData,
           
            success: function (response) {

                console.log(response); 
                if (response === 0) {
                    deleteNotification("Some things went wrong!");
                    
                    $('#hallForm')[0].reset();
                } else {
                    showNotification(response);
                };
            }
        });
    });
});