<?php include 'config.php';
 $sql = "SELECT id, full_name FROM trainers"; 
 $result = $conn->query($sql);  
 $trainings = '';
 $trainings .= '<a class="dropdown-item trainer" href="#" data-id="' . 0 . '"> Любой тренер </a>';
 while ($row = $result->fetch_assoc()) {  
    $trainings .= '<a class="dropdown-item trainer" href="#" data-id="' . $row['id'] . '">' . $row['full_name'] . '</a>'; } 
    echo $trainings; 
 $conn->close(); 
 ?>