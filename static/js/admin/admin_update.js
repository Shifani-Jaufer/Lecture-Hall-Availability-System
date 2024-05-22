$("document").ready(function() {   
    
    // update success message

    function showNotification(message) {
        const notification = $('#notification');
        notification.text(message);
        notification.removeClass('hidden');
        setTimeout(function() {
            notification.addClass('hidden');
        }, 3000); 
    }

    // delete success message

    function deleteNotification(message) {
        const notification = $('#del_notification');
        notification.text(message);
        notification.removeClass('hidden');
        setTimeout(function() {
            notification.addClass('hidden');
        }, 3000); 
    }

    
    

$('.lec_update_button').click(function() {
        
    
    const lectureId = $(this).data('lecture-id');
    
    
    const row = $(this).closest('tr');
    
   
    const lecId = row.find('input[name="lec_id[]"]').val();
    const lecName = row.find('input[name="lec_name[]"]').val();
    const lecDepartment = row.find('input[name="lec_department[]"]').val();

    $.ajax({
        type: 'POST',
        url: './update_process/edit_lec_data.php', 
        data: {
            lectureId: lectureId,
            lecId: lecId,
            lecName: lecName,
            lecDepartment: lecDepartment
        },
        success: function(response) {
            
            showNotification('Lecturer Updated Successfully!');
        },
        error: function(xhr, textStatus, errorThrown) {
           
            console.error('Error: ' + textStatus, errorThrown);
        }
    });
});


$('.lec_delete_button').click(function() {
    const clickedButton = $(this);
    const lectureId = clickedButton.data('lecture-id');
    
   
    if (window.confirm("Are you sure you want to delete this lecture?")) {
       
        console.log('User confirmed deletion');
        console.log(lectureId);

       
        $.ajax({
            type: 'POST',
            url: './delete_process/delete_lec_data.php', 
            data: {
                lectureId: lectureId
            },
            success: function(response) {
                deleteNotification(response);
                clickedButton.closest('tr').remove();
            },
            error: function(xhr, textStatus, errorThrown) {
                console.error('Error: ' + textStatus, errorThrown);
            }
        });
    } else {
        
        console.log('User canceled deletion');
    }
});

function deleteNotification(message) {
    alert(message);
}





$('.hall_update-button').click(function() {
    const clickedButton = $(this); 
    const hallid = clickedButton.data('hall-id');
    const row = $(this).closest('tr');

    const data_hallid = row.find('input[name="hall_id[]"]').val();
    const hallname = row.find('input[name="hall_name[]"]').val();
    const capacity = row.find('input[name="hall_capacity[]"]').val();


    
    
    
    $.ajax({
        type: 'POST',
        url: './update_process/update_hall_data.php', 
        data: {
            hallid: hallid,

            data_hallid: data_hallid,
            hallname: hallname,
            capacity: capacity
        },
        success: function(response) {
            
            showNotification(response);
            
        },
        error: function(xhr, textStatus, errorThrown) {
            
            console.error('Error: ' + textStatus, errorThrown);
        }
    });
});




$('.hall_delete-button').click(function () {
    const clickedButton = $(this);
    const hallid = clickedButton.data('hall-id');

    
    if (confirm("Are you sure you want to delete this hall?")) {
        
        console.log('User confirmed deletion');
        console.log(hallid);

        
        $.ajax({
            type: 'POST',
            url: './delete_process/delete_hall_data.php',
            data: {
                hallid: hallid
            },
            success: function (response) {
                deleteNotification(response);
                clickedButton.closest('tr').remove();
            },
            error: function (xhr, textStatus, errorThrown) {
                console.error('Error: ' + textStatus, errorThrown);
            }
        });
    } else {
        
        console.log('User canceled deletion');
    }
});

function deleteNotification(message) {
    alert(message);
}



});