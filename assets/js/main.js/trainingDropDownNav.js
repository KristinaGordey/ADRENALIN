$(document).ready(function() { // Загрузка типов тренировок 
    $.ajax({ 
        url: 'assets/php/get_training_types_nav_dropdown.php', 
        method: 'GET', 
        success: function(data) { //функция выполняется после успешного получения данных
            $('#trainingDropdown').html(data);//установка содержимого элемента
         } }); // Обработка выбора тренировки 
         $(document).on('click', '.dropdown-item.training', function() { //отслеживаем клики по элементам дропдауна
            var trainingId = $(this).data('id');//извлекаем значение атрибута id из элемента по которому кликнули
             window.location.href = 'category.html?id=' + trainingId;//перенаправляем пользователя на страницу, добавляем id к URL
              }); });