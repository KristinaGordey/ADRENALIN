$(document).ready(function() { 
    $.ajax({ 
        url: 'assets/php/get_training_types_schedule_dropdown.php', 
        method: 'GET', 
        success: function(data) { 
            $('#trainingTypeDropdown').html(data);
         } }); 
    });