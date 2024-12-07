$(document).ready(function() { // Загрузка типов тренировок 
    $.ajax({ 
        url: 'assets/php/get_trainers_schedule_dropdown.php', 
        method: 'GET', 
        success: function(data) { //функция выполняется после успешного получения данных
            $('#trainersDropdown').html(data);//установка содержимого элемента
         } }); // Обработка выбора тренировки   
    });