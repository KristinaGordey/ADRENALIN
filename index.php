<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Адреналин ::Главная</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Danfo&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/main.css/main.css">
    <style> .modal { display: none; position: fixed; z-index: 1; left: 0; top: 0; width: 100%; height: 100%; overflow: auto; background-color: rgb(0, 0, 0); background-color: rgba(0, 0, 0, 0.4); padding-top: 60px; } .modal-content { background-color: #fefefe; margin: 5% auto; padding: 20px; border: 1px solid #888; width: 80%; } .close { color: #aaa; float: right; font-size: 28px; font-weight: bold; } .close:hover, .close:focus { color: black; text-decoration: none; cursor: pointer; } .chat { width: 100%; border: 1px solid #ccc; padding: 10px; margin: 10px auto; } .messages { height: 200px; overflow-y: scroll; border-bottom: 1px solid #ccc; margin-bottom: 10px; padding-bottom: 10px; } .input { width: 100%; box-sizing: border-box; } .modal-header { display: flex; justify-content: space-between; align-items: center; } .modal-title { margin: 0; } .modal-header .close { font-size: 24px; cursor: pointer; }
    </style>
</head>
<body>
    <div class = "wrapper">
        <header class ="header">
            <div class = "header-top py-1">
                <div class = "container-fluid">
                    <div class = "row">
                        <div class=" col-6 col-sm-4">
                            <div class="header-top-phone d-flex align-items-center h-100">
                            <i class="fa-solid fa-mobile-screen"></i>
                            <a href="tel:+375298525312" class ="ms-2">+375-29-8525312</a>
                            </div>
                        </div>
                        <div class="col-sm-4 d-none d-sm-block">
                            <ul class="social-icons d-flex justify-content-center">
                                <li><a href="https://youtu.be/VoCDV8uImLM?feature=shared"><i class="fa-brands fa-youtube"></i></a></li>
                                <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                            </ul>
                        </div>
                        <div class="col-6 col-sm-4">
                            <div class="header-top-account d-flex justify-content-end">
                                <div class="btn-group me-2">
                                    <div class="dropdown">
                                        <button class="btn btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" id="account-button" aria-expanded="false">
                                        Аккаунт
                                        </button>
                                        <ul class="dropdown-menu">
                                          <li><a class="dropdown-item"  href="login.html">Войти</a></li>
                                          <li><a class="dropdown-item" href="register.html">Зарегистрироваться</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="btn-group">
                                    <div class="dropdown">
                                        <button class="btn btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        RU
                                        </button>
                                        <ul class="dropdown-menu">
                                           
                                           <li><a class="dropdown-item" href="#">EN</a></li>
                                           
                                        </ul>
                                    </div>
                                </div>
                            </div> <!--header-top-account-->
                            
                        </div>
                    </div>
                </div>
            </div> <!--header-top-->

            <div class="header-middle bg-white py-4">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-sm-6 col-lg-4 ">
                            <a href="index.php" class ="header-logo h1">Adrenalin</a>
                        </div>
                        
                        <div class=" col-lg-4 order-md-2 cart-buttons text-end d-none d-lg-block">
                            <a href="#" class="btn p-1">
                                <i class="fa-solid fa-heart"></i>
                                <span class="badge text-bg-warning cart-badge bg-danger  rounded-circle">3</span>
                            </a>
                            <button class="btn p-1" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasCart" ria-controls="offcanvasCart">
                                <i class="fa-solid fa-cart-shopping"></i>
                                <span class="badge text-bg-warning cart-badge bg-danger  rounded-circle">4</span>
                            </button>
                        </div>
                        <div class="col-lg-4 col-sm-6 order-md-1 mt-2 mt-md-0">
                            <form action="">
                                <div class="input-group">
                                    <input type="text" class="form-control" name = "s" placeholder="Поиск..." aria-label="Searching..." aria-describedby="button-search">
                                    <button class="btn btn-outline-secondary" type="submit" id="button-search">
                                        <i class="fa-solid fa-magnifying-glass"></i>
                                    </button>
                                  </div>
                                  
                            </form>
                        </div>

                       
                    </div>
                </div>

            </div>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasCart" aria-labelledby="offcanvasCart">
                <div class="offcanvas-header">
                  <h5 class="offcanvas-title" id="offcanvasCartLabel">Мои записи</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                  <div class="table-responsive">
                    <table class="table offcanvasCart-table">
                        <tbody>
                            <tr>
                                <td class="training-img-td"><a href="#"><img src="assets/img/training/a.jpeg" alt=""> </a></td>
                                <td><a href="#">Сайкл-тренировкa</td>
                                <td>ПН</td>
                                <td>16:30-17:30</td>
                                <td><button class="btn btn-secondary"><i class="fa-regular fa-circle-xmark"></i></button></td>
                            </tr>
                            <tr>
                                <td class="training-img-td"><a href="#"><img src="assets/img/training/b.jpeg" alt=""> </a></td>
                                <td><a href="#">HIIT</a></td>
                                <td>СР</td>
                                <td>11:00-12:00</td>
                                <td><button class="btn btn-secondary"><i class="fa-regular fa-circle-xmark"></i></button></td>
                            </tr>
                            <tr>
                                <td class="training-img-td"><a href="#"><img src="assets/img/training/c.jpeg" alt=""> </a></td>
                                <td><a href="#">Йога</a></td>
                                <td>ЧТ</td>
                                <td>10:30-11:30</td>
                                <td><button class="btn btn-secondary"><i class="fa-regular fa-circle-xmark"></i></button></td>
                            </tr>
                        </tbody>
                        
                    </table>
                    </div>
                    <div class="text-end mt-3">    
                       <a href="cart.html" class="btn btn-outline-secondary">Записаться</a>
                       <a href="#" class="btn btn-outline-secondary">Добавить</a>
                    </div>
                    
                </div>
            </div>

            
        </header>
        <div class="header-bottom sticky-top" id="header-nav">
            <nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
                <div class="container-fluid">
                  <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="offcanvas offcanvas-start" id="offcanvasNavbar" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Меню</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        
                        <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Главная</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.html">О нас</a>
                        </li>
                        <li class="nav-item dropdown">
                            <div class="container"> 
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside" id="training-type">
                                    Тренировки
                                </a> 
                                <ul class="dropdown-menu dropdown-menu-end" id="trainingDropdown">  
                                    <script>
                                     $(document).ready(function() { // Загрузка типов тренировок 
                                        $.ajax({ 
                                            url: 'get_trainings.php', 
                                            method: 'GET', 
                                            success: function(data) { //функция выполняется после успешного получения данных
                                                $('#trainingDropdown').html(data);//установка содержимого элемента
                                             } }); // Обработка выбора тренировки 
                                             $(document).on('click', '.dropdown-item', function() { //отслеживаем клики по элементам дропдауна
                                                var trainingId = $(this).data('id');//извлекаем значение атрибута id из элемента по которому кликнули
                                                 window.location.href = 'category.html?id=' + trainingId;//перенаправляем пользователя на страницу, добавляем id к URL
                                                  }); });
                                    </script>                  
                                    <a class="dropdown-item" href="#">Загрузка...
                                    </a>   
                                </ul>                                
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="workers.php">Персонал</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cart.html">Расписание</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Прайс</a>
                        </li> 
                                              
                        </ul>
                    </div>
                  </div>
                  
                  <div class ="d-block d-lg-none  " >
                      <a href="#" class="btn p-1">
                          <i class="fa-solid fa-heart"></i>
                          <span class="badge text-bg-warning cart-badge bg-danger  rounded-circle">3</span>
                      </a>
                      <button class="btn p-1" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasCart" ria-controls="offcanvasCart">
                          <i class="fa-solid fa-cart-shopping"></i>
                          <span class="badge text-bg-warning cart-badge bg-danger  rounded-circle">4</span>
                      </button>
                  
                  </div>
                </div>
              </nav>

        </div><!--header bottom-->
        <main class="main">
            <div id="carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active" data-bs-interval="10000">
                    <img src="assets/img/slider/1.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                       
                      </div>
                  </div>
                  <div class="carousel-item" data-bs-interval="2000">
                    <img src="assets/img/slider/2.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        
                      </div>
                  </div>
                  <div class="carousel-item">
                    <img src="assets/img/slider/3.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                       
                      </div>
                  </div>
                  <div class="carousel-item">
                    <img src="assets/img/slider/4.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                       
                      </div>
                  </div>
                  <div class="carousel-item">
                    <img src="assets/img/slider/5.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        
                      </div>
                  </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
            </div>

            <section class = "advantages">
                <div class="container-fluid">
                    <div class="row mb-5" >
                        <div class="col-12">
                            <h2 class="section-title">
                                <span>Наши преимущества</span>
                            </h2>
                        </div>
                    </div>

                        <div class="row gy-3 items">
                            <div class="col-lg-3 col-sm-6">
                                <div class="item">
                                    <p><i class="fa-solid fa-user-graduate"></i></p>
                                    <p>Консультации от профессионалов</p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="item">
                                    <p><i class="fa-solid fa-spa"></i></p>
                                    <p>Комфортная спа-зона</p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="item">
                                    <p><i class="fa-solid fa-dumbbell"></i></p>
                                    <p>Бесплатное пробное занятие</p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="item">
                                    <p><i class="fa-solid fa-user-tie"></i></p>
                                    <p>Индивидуальный подход к каждому клиенту</p>
                                </div>
                            </div>
                        </div>
                    
                </div>
            </section>

            <section class ="workers">
                
                <div class="container-fluid">
                    <div class="row mb-5">
                        <div class="col-12">
                            <h2 class="section-title">
                                <span>Тренерский состав</span>
                            </h2>
                        </div>
                    </div>
                    <div class="row">
                        <?php include 'config.php'; 
                            $sql = "SELECT full_name, description, photo_path FROM trainers";
                            $result = $conn->query($sql); 
                            if ($result->num_rows > 0) { 
                                while ($row = $result->fetch_assoc()) { 
                                    
                                    echo '<div class="col-lg-3 col-md-4 col-sm-6 mb-3">'; 
                                    echo ' <div class="worker-card">'; 
                                    echo ' <div class="worker-photo">'; 
                                    echo ' <a href="workers.php"><img src="' . $row["photo_path"] . '" alt=""></a>';
                                    echo ' </div>'; echo ' <div class="worker-details">'; 
                                    echo ' <h4>'; 
                                    echo ' <a href="workers.php">' . $row["full_name"] . '</a>'; 
                                    echo ' </h4>';
                                    echo ' <p class="worker-excerpt">' . $row["description"] . '</p>';
                                    echo ' <div class="worker-links d-flex justify-content-end">'; 
                                    echo ' <a href="login.html" class="btn btn-outline-secondary add-to-form">'; 
                                    echo ' Записаться';
                                    echo ' </a>'; 
                                    echo ' </div>'; 
                                    echo ' </div>'; 
                                    echo ' </div>'; 
                                    echo '</div>';
                                     } } 
                                else { 
                                    echo "<p>Данные не найдены</p>";
                                     } 
                            $conn->close(); 
                            ?> 
                    </div>
                    
                </div>
                
            </section>
            <section class="about-us" id="about">
                <div class="container-fluid">
                    <div class="row mb-5">
                        <div class="col-12">
                            <h2 class="section-title">
                                <span>О нас</span>
                            </h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <p>Добро пожаловать в фитнес-центр Adrenalin в Минске!
                               Мы рады приветствовать Вас в пространстве,
                               где здоровье и активный образ жизни становятся приоритетом.
                               Наш фитнес-центр предлагает широкий спектр услуг,
                               чтобы каждый мог достичь своих целей — будь то похудение, 
                               наращивание мышечной массы или просто поддержание отличной физической формы.
                            </p>
                        </div>
                    </div>    
                </div>
            </section>
            

            <iframe id="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d28863.337422634013!2d27.547410789297956!3d53.86322311593896!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46dbd1a245100d49%3A0x386e1dd96bad1bee!2z0KLRgNC10L3QsNC20LXRgNC90YvQuSDQt9Cw0Lsg0JDQlNCg0JXQndCQ0JvQmNCdIHwg0KLRgNC10L3QuNGA0L7QstC60Lgg0JzQuNC90YHQuiB8INCk0LjRgtC90LXRgSDQutC70YPQsSwg0YHQv9C-0YDRgtC30LDQuw!5e0!3m2!1sru!2sby!4v1729984574006!5m2!1sru!2sby" width="100%" height="450" style="border:0; display: block;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

        </main>
        <footer class="footer" id="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3 col-6">
                        <h4>Информация</h4>
                        <ul class="list-unstyled">
                            <li><a href="index.php">Главная</a></li>
                            <li><a href="#">О нас</a></li>
                            <li><a href="#">Тренировки</a></li>
                            <li><a href="#">Персонал</a></li>
                            <li><a href="#">Расписание</a></li>
                            <li><a href="#">Прайс</a></li>
                            <li id="openModalBtn">Нужна помощь</li>
                            
                            

                        </ul>
                    </div>
                    <div class="col-md-3 col-6">
                        <h4>Часы работы</h4>
                        <ul class="list-unstyled">
                            <li>Минск,ул.Иосифа Гошкевича 3</li>
                            <li>Воскресенье 09:00-21:00</li>
                            <li>Понедельник 07:00-23:00</li>
                            <li>Вторник 07:00-23:00</li>
                            <li>Среда 07:00-23:00</li>
                            <li>Четверг 07:00-23:00</li>
                            <li>Пятница 07:00-23:00</li>
                            <li>Суббота 09:00-21:00</li>

                        </ul>
                    </div>
                    <div class="col-md-3 col-6">
                        <h4>Контакты</h4>
                        <ul class="list-unstyled">
                           <li><a href="tel:+375298525312">+375-29-8525312</a></li>
                           <li><a href="tel:+375292233854">+375-29-2233854</a></li>

                        </ul>
                    </div>
                    <div class="col-md-3 col-6">
                        <h4>Присоединяйтесь к нам</h4>
                        <ul class="footer-icons">
                           <li><a href="#"><i class="fa-brands fa-youtube"></i></a></li>
                           <li><a href="#"><i class ="fa-brands fa-facebook-f"></i></a></li>
                           <li><a href="#"><i class ="fa-brands fa-instagram"></i></a></li>

                        </ul>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <button id="top">
        <i class="fa fa-arrow-up" aria-hidden="true"></i>
    </button>
    
    <!-- Модальное окно 
     <div id="chatModal" class="modal"> 
        <div class="modal-content">           
            <h2>Чат-поддержка</h2>
            <span class="close">&times;</span> 
            <div class="chat"> 
                <div class="messages" id="messages"></div> 
                <input type="text" id="messageInput" class="input" placeholder="Введите сообщение"> 
                <button id="sendButton">Отправить</button> 
            </div> 
        </div> 
    </div> -->
    <div id="chatModal" class="modal">
        <div class="modal-content">
          <div class="modal-header">
            <h2 class ="modal-title">Чат-поддержка</h2>
            <span class="close">&times;</span>
            
          </div>
          <div class="modal-body">
            <div class="chat"> 
                <div class="messages" id="messages"></div> 
                <div class="input-group"> 
                    <input type="text" id="messageInput" class="form-control" placeholder="Введите сообщение"> 
                    <div class="input-group-append"> 
                        <button id="sendButton" class="btn btn-outline-secondary">Отправить</button> 
                    </div> 
                </div> 
            </div>
          </div>
        </div>
      </div>
    
     <script src="chat.js"></script>
    

    <script scr ="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> 
    <script src="assets/js/main.js/main.js"></script>
    
</body>
</html>