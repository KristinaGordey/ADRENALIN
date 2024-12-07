$(document).ready(function() { // Получение параметра id из URL 
    var urlParams = new URLSearchParams(window.location.search); //извлекаем параметры URL текущего
    var trainingId = urlParams.get('id'); // извлекаем id из URL
    var link = `cart.html?trainingId=${trainingId}&trainerId=0`;
    if (trainingId) { 
        $.ajax({ 
            url: 'assets/php/get_training_type_info.php', 
            method: 'GET', 
            data: { id: trainingId }, //отправляем id
            success: function(data) 
            { var training = JSON.parse(data);//преобразуем строку json полученную из сервера в обьект javascript
             $('#trainingName span').text(training.name);
              $('#trainingDescription').text(training.description);
              $('#description-tab-pane').text(training.small_description);
              $('#trainingPhoto').attr('src', training.photo_path);
              $('#trainingVideo').attr('src', training.video_path);
              $('#features-tab-pane').text(training.physical_level);
              $('#typeLinkToSchedule').attr('href', link);
               }
                }); 
                } 
                }); 