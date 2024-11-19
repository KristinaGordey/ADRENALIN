<?php include 'config.php';
 $sql = "SELECT id, name FROM type_training"; 
 $result = $conn->query($sql); //сохраняем результат запроса
 $trainings = ''; 
 while ($row = $result->fetch_assoc()) { //Цикл, который проходит по каждой строке результата запроса.
    $trainings .= '<a class="dropdown-item" href="#" data-id="' . $row['id'] . '">' . $row['name'] . '</a>'; } 
    echo $trainings; 
 $conn->close(); 
 ?>