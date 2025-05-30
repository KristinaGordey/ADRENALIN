$(document).ready(function() { 
    var urlParams = new URLSearchParams(window.location.search); 
    var trainingId = urlParams.get('id'); 
    var link = `cart.html?trainingId=${trainingId}&trainerId=0`;
    if (trainingId) { 
        $.ajax({ 
            url: 'assets/php/get_training_type_info.php', 
            method: 'GET', 
            data: { id: trainingId }, 
            success: function(data) 
            { var training = JSON.parse(data);
              var miniDescriptions = JSON.parse(training.mini_descriptions);
             $('#trainingName span').text(training.name);
              $('#trainingDescription').text(training.description);
              $('#description-tab-pane').text(training.small_description);
              $('#trainingPhoto').attr('src', training.photo_path);
              $('#trainingVideo').attr('src', training.video_path);
              $('#features-tab-pane').text(training.physical_level);
              $('#typeLinkToSchedule').attr('href', link);
              miniDescriptions.forEach(function(description) { 
                var card = ` <div class="col-lg-4 mb-2"> 
                                <div class="card h-100"> 
                                      <div class="card-body"> 
                                          <h5 class="card-title">${description.icon}${description.title}</h5> 
                                          <p class="card-text">${description.description}</p> 
                                      </div> 
                                </div>
                            </div>`; 
                $('#training-container').append(card); }); 
            
             }
        }); 
    } 
}); 