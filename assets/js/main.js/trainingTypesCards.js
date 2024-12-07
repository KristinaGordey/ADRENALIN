$(document).ready(function() { // Загрузка типов тренировок 
    $.ajax({ 
        url: 'assets/php/get_training_types_cards.php', 
        method: 'GET', 
        success: function(data) { //функция выполняется после успешного получения данных
            $('#trainingTypesCards').html(data);//установка содержимого элемента
         } }); // Обработка выбора тренировки 
        });