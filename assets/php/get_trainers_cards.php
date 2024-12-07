<?php include 'config.php'; 
    $sql = "SELECT id, full_name, description, photo_path FROM trainers";
    $result = $conn->query($sql);
    $trainersCards = ''; 
    if ($result->num_rows > 0) { 
        while ($row = $result->fetch_assoc()) { 
            
            $trainersCards .= '<div class="col-lg-3 col-md-4 col-sm-6 mb-3">'; 
            $trainersCards .= ' <div class="worker-card">'; 
            $trainersCards .= ' <div class="worker-photo">'; 
            $trainersCards .= ' <a href="workers.php"><img src="' . $row["photo_path"] . '" alt=""></a>';
            $trainersCards .= ' </div>'; 
            $trainersCards .= ' <div class="worker-details">'; 
            $trainersCards .= ' <h4>'; 
            $trainersCards .= ' <a href="workers.php">' . $row["full_name"] . '</a>'; 
            $trainersCards .= ' </h4>';
            $trainersCards .= ' <p class="worker-excerpt">' . $row["description"] . '</p>';
            $trainersCards .= ' <div class="worker-links d-flex justify-content-end">'; 
            $trainersCards .= ' <a href="cart.html?trainingId=0&trainerId='. $row['id']. '" class="btn btn-outline-secondary add-to-form">'; 
            $trainersCards .= ' Записаться';
            $trainersCards .= ' </a>'; 
            $trainersCards .= ' </div>'; 
            $trainersCards .= ' </div>'; 
            $trainersCards .= ' </div>'; 
            $trainersCards .= '</div>';
                } } 
        else { 
            $trainersCards .= "<p>Данные не найдены</p>";
                } 
    echo $trainersCards;
    $conn->close(); 
?> 
