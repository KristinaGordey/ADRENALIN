$(document).ready(function() { 
    $.ajax({ 
        url: 'assets/php/get_trainers_schedule_dropdown.php', 
        method: 'GET', 
        success: function(data) { 
            $('#trainersDropdown').html(data);
         } }); 
    });