<?php include 'config.php';
 $sql = "SELECT id, full_name FROM trainers"; 
 $result = $conn->query($sql); //сохраняем результат запроса
 $trainings = '';
 $trainings .= '<a class="dropdown-item trainer" href="#" data-id="' . 0 . '"> Любой тренер </a>';
 while ($row = $result->fetch_assoc()) { //Цикл, который проходит по каждой строке результата запроса.
    $trainings .= '<a class="dropdown-item trainer" href="#" data-id="' . $row['id'] . '">' . $row['full_name'] . '</a>'; } 
    echo $trainings; 
 $conn->close(); 
 ?>