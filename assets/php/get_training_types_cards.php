<?php include 'config.php'; 
$sql = "SELECT id, name, small_description, price, photo_path FROM type_training";
$result = $conn->query($sql); 
$trainingsCards = '';
if ($result->num_rows > 0) { 
    while ($row = $result->fetch_assoc()) { 
        
        $trainingsCards .= '<div class="col-lg-3 col-md-4 col-sm-6 mb-3">'; 
        $trainingsCards .= ' <div class="price-card">'; 
        $trainingsCards .= ' <div class="price-photo">'; 
        $trainingsCards .= ' <a href="category.html?id='. $row['id'] .'"><img src="' . $row["photo_path"] . '" alt=""></a>';
        $trainingsCards .= ' </div>'; $trainingsCards .= ' <div class="price-details">'; 
        $trainingsCards .= ' <h4>'; 
        $trainingsCards .= ' <a href="category.html?id='. $row['id'] .'">' . $row["name"] . '</a>'; 
        $trainingsCards .= ' </h4>';
        $trainingsCards .= ' <p class="price-description">' . $row["small_description"] . '</p>';
        $trainingsCards .= ' <p class="price-card-price">' . 'Цена: ' . $row["price"] . ' руб.' . '</p>';
        $trainingsCards .= ' <div class="worker-links d-flex justify-content-end">'; 
        $trainingsCards .= ' <a href="cart.html?trainingId=' .$row["id"]. '&trainerId=0" class="btn btn-outline-secondary add-to-form">'; 
        $trainingsCards .= ' Записаться';
        $trainingsCards .= ' </a>'; 
        $trainingsCards .= ' </div>'; 
        $trainingsCards .= ' </div>'; 
        $trainingsCards .= ' </div>'; 
        $trainingsCards .= '</div>';
            } } 
    else { 
        $trainingsCards .= "<p>Данные не найдены</p>";} 
echo $trainingsCards;
$conn->close(); 
?> 