$(document).ready(function() { 
    $.ajax({ 
        url: 'assets/php/get_training_types_nav_dropdown.php', 
        method: 'GET', 
        success: function(data) { 
            $('#trainingDropdown').html(data);
         } }); 
         $(document).on('click', '.dropdown-item.training', function() { 
            var trainingId = $(this).data('id');
             window.location.href = 'category.html?id=' + trainingId;
              }); });