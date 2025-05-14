$(document).ready(function() { 
    $.ajax({ 
        url: 'assets/php/get_training_types_cards.php', 
        method: 'GET', 
        success: function(data) { 
            $('#trainingTypesCards').html(data);
         } }); 
        });