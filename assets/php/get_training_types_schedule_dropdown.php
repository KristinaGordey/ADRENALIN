<?php include 'config.php';
 $sql = "SELECT id, name FROM type_training"; 
 $result = $conn->query($sql);  
 $trainings = ''; 
 $trainings .= '<a class="dropdown-item training-type" href="#" data-id="' . 0 . '"> Любой тип </a>';
 while ($row = $result->fetch_assoc()) {  
    $trainings .= '<a class="dropdown-item training-type" href="#" data-id="' . $row['id'] . '">' . $row['name'] . '</a>'; } 
    echo $trainings; 
 $conn->close(); 
 ?>