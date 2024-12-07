$(document).ready(function() { // Загрузка типов тренировок 
    $.ajax({ 
        url: 'assets/php/get_training_types_schedule_dropdown.php', 
        method: 'GET', 
        success: function(data) { //функция выполняется после успешного получения данных
            $('#trainingTypeDropdown').html(data);//установка содержимого элемента
         } }); // Обработка выбора тренировки   
    });