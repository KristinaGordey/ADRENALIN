$(document).ready(function() { // Загрузка типов тренировок 
    $.ajax({ 
        url: 'assets/php/get_trainers_cards.php', 
        method: 'GET', 
        success: function(data) { //функция выполняется после успешного получения данных
            $('#trainersCards').html(data);//установка содержимого элемента
         } }); // Обработка выбора тренировки 
        });