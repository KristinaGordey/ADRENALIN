function getUserSchedule(){ // Загрузка типов тренировок 
    var clientId = sessionStorage.getItem('clientId'); 
    $.ajax({ 
       url: 'get_user_schedule.php', 
       method: 'POST', 
       data: {user_id: clientId}, 
       success: function(data) { 
           $('#userSchedule').html(data);
        } 
    }); 
 };
 function deleteRecord(recordId) { 
    var modal = new bootstrap.Modal(document.getElementById('deleteModal')); 
    modal.show(); 
    // Обработка нажатия на кнопку "Удалить" 
    document.getElementById('deleteButton').onclick = function() { 
    $.ajax({ 
    url: 'delete_record.php', 
    type: 'POST', 
    data: {record_id: recordId}, 
    success: function(response) { 
        alert('Запись на тренировку успешно удалена'); 
        modal.hide(); 
    }, 
    error: function(xhr, status, error) { 
        console.error('Ошибка при удалении записи на тренировку:', status, error); 
        } 
    });                                  
    };
}    