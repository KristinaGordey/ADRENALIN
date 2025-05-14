$(document).ready(function() { 
    $.ajax({ 
        url: 'assets/php/get_trainers_cards.php', 
        method: 'GET', 
        success: function(data) { 
            $('#trainersCards').html(data);
         } }); 
        });