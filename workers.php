<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Адреналин ::Главная</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Danfo&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/main.css/main.css">
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
                                        <button class="btn btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Аккаунт
                                        </button>
                                        <ul class="dropdown-menu">
                                          <li><a class="dropdown-item" href="loginhtml.php">Войти</a></li>
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
                            <a href="index.html" class ="header-logo h1">Adrenalin</a>
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
                                <td><a href="category.html">HIIT</a></td>
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
                            <a class="nav-link active" aria-current="page" href="index.html">Главная</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.html">О нас</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
                                Тренировки
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="category.html">
                                        Подвесной тренинг
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="category.html">
                                        HIIT 
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="category.html">
                                        KIDS HIIT
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="category.html">
                                        Стрейчинг
                                    </a>
                                </li>
                                
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="workers.html">Персонал</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Расписание</a>
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
            <section class ="workers">
                
                <div class="container-fluid">
                    <div class="row mb-5">
                        <div class="col-12">
                            <h2 class="section-title">
                                <span>Тренерский состав</span>
                            </h2>
                        </div>
                    </div>
                    <!--<div class="row workers-row">
                        <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                            <div class="worker-card">
                                <div class="worker-photo">
                                    <a href="workers.html"><img src="assets/img/worker/1.jpg" alt=""></a>
                                </div>
                                <div class="worker-details">
                                    <h4>
                                        <a href="workers.html">Петров Максим Владимирович</a>
                                    </h4>
                                    <p class="worker-excerpt">Тренер первой квалификационной категории. Стаж 4 года</p>
                                    <div class="worker-links d-flex justify-content-end">
                                        <a href="login.html" class="btn btn-outline-secondary add-to-form">
                                            Записаться
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                            <div class="worker-card">
                                <div class="worker-photo">
                                    <a href="workers.html"><img src="assets/img/worker/2.jpg" alt=""></a>
                                </div>
                                <div class="worker-details">
                                    <h4>
                                        <a href="workers.html">Поликарпов Максим Артёмович</a>
                                    </h4>
                                    <p class="worker-excerpt">Тренер второй квалификационной категории. Стаж 4 года</p>
                                    <div class="worker-links d-flex justify-content-end">
                                        <a href="login.html" class="btn btn-outline-secondary add-to-form">
                                            Записаться
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                            <div class="worker-card">
                                <div class="worker-photo">
                                    <a href="workers.html"><img src="assets/img/worker/3.jpg" alt=""></a>
                                </div>
                                <div class="worker-details">
                                    <h4>
                                        <a href="workers.html">Рубцов Георгий Артёмович</a>
                                    </h4>
                                    <p class="worker-excerpt">Тренер высшей квалификационной категории. Стаж 4 года</p>
                                    <div class="worker-links d-flex justify-content-end">
                                        <a href="login.html" class="btn btn-outline-secondary add-to-form">
                                            Записаться
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                            <div class="worker-card">
                                <div class="worker-photo">
                                    <a href="workers.html"><img src="assets/img/worker/4.jpg" alt=""></a>
                                </div>
                                <div class="worker-details">
                                    <h4>
                                        <a href="workers.html">Архипов Артём Александрович</a>
                                    </h4>
                                    <p class="worker-excerpt">Тренер первой квалификационной категории. Стаж 4 года</p>
                                    <div class="worker-links d-flex justify-content-end">
                                        <a href="login.html" class="btn btn-outline-secondary add-to-form">
                                            Записаться
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                            <div class="worker-card">
                                <div class="worker-photo">
                                    <a href="workers.html"><img src="assets/img/worker/5.jpg" alt=""></a>
                                </div>
                                <div class="worker-details">
                                    <h4>
                                        <a href="workers.html">Еремин Егор Константинович</a>
                                    </h4>
                                    <p class="worker-excerpt">Тренер первой квалификационной категории. Стаж 4 года</p>
                                    <div class="worker-links d-flex justify-content-end">
                                        <a href="login.html" class="btn btn-outline-secondary add-to-form">
                                            Записаться
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                            <div class="worker-card">
                                <div class="worker-photo">
                                    <a href="workers.html"><img src="assets/img/worker/6.jpg" alt=""></a>
                                </div>
                                <div class="worker-details">
                                    <h4>
                                        <a href="workers.html">Соколов Максим Владимирович</a>
                                    </h4>
                                    <p class="worker-excerpt">Тренер высшей квалификационной категории. Стаж 4 года</p>
                                    <div class="worker-links d-flex justify-content-end">
                                        <a href="login.html" class="btn btn-outline-secondary add-to-form">
                                            Записаться
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                            <div class="worker-card">
                                <div class="worker-photo">
                                    <a href="workers.html"><img src="assets/img/worker/7.jpg" alt=""></a>
                                </div>
                                <div class="worker-details">
                                    <h4>
                                        <a href="workers.html">Козлов Артём Рустамович</a>
                                    </h4>
                                    <p class="worker-excerpt">Тренер второй квалификационной категории. Стаж 4 года</p>
                                    <div class="worker-links d-flex justify-content-end">
                                        <a href="login.html" class="btn btn-outline-secondary add-to-form">
                                            Записаться
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                            <div class="worker-card">
                                <div class="worker-photo">
                                    <a href="workers.html"><img src="assets/img/worker/8.jpg" alt=""></a>
                                </div>
                                <div class="worker-details">
                                    <h4>
                                        <a href="workers.html">Андреев Константин Даниилович</a>
                                    </h4>
                                    <p class="worker-excerpt">Тренер первой квалификационной категории. Стаж 4 года</p>
                                    <div class="worker-links d-flex justify-content-end">
                                        <a href="login.html" class="btn btn-outline-secondary add-to-form">
                                            Записаться
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                            <div class="worker-card">
                                <div class="worker-photo">
                                    <a href="workers.html"><img src="assets/img/worker/9.jpg" alt=""></a>
                                </div>
                                <div class="worker-details">
                                    <h4>
                                        <a href="workers.html">Смирнова Сабина Даниловна</a>
                                    </h4>
                                    <p class="worker-excerpt">Тренер первой квалификационной категории. Стаж 4 года</p>
                                    <div class="worker-links d-flex justify-content-end">
                                        <a href="login.html" class="btn btn-outline-secondary add-to-form">
                                            Записаться
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                            <div class="worker-card">
                                <div class="worker-photo">
                                    <a href="workers.html"><img src="assets/img/worker/10.jpg" alt=""></a>
                                </div>
                                <div class="worker-details">
                                    <h4>
                                        <a href="workers.html">Еремина София Максимовна</a>
                                    </h4>
                                    <p class="worker-excerpt">Тренер первой квалификационной категории. Стаж 4 года</p>
                                    <div class="worker-links d-flex justify-content-end">
                                        <a href="login.html" class="btn btn-outline-secondary add-to-form">
                                            Записаться
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                            <div class="worker-card">
                                <div class="worker-photo">
                                    <a href="workers.html"><img src="assets/img/worker/11.jpg" alt=""></a>
                                </div>
                                <div class="worker-details">
                                    <h4>
                                        <a href="workers.html">Титова Амина Александровна</a>
                                    </h4>
                                    <p class="worker-excerpt">Тренер высшей квалификационной категории. Стаж 7 лет</p>
                                    <div class="worker-links d-flex justify-content-end">
                                        <a href="login.html" class="btn btn-outline-secondary add-to-form">
                                            Записаться
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                            <div class="worker-card">
                                <div class="worker-photo">
                                    <a href="workers.html"><img src="assets/img/worker/12.jpg" alt=""></a>
                                </div>
                                <div class="worker-details">
                                    <h4>
                                        <a href="workers.html">Кузьмина Таисия Кирилловна</a>
                                    </h4>
                                    <p class="worker-excerpt">Тренер первой квалификационной категории. Стаж 3 года</p>
                                    <div class="worker-links d-flex justify-content-end">
                                        <a href="login.html" class="btn btn-outline-secondary add-to-form">
                                            Записаться
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                            <div class="worker-card">
                                <div class="worker-photo">
                                    <a href="workers.html"><img src="assets/img/worker/13.jpg" alt=""></a>
                                </div>
                                <div class="worker-details">
                                    <h4>
                                        <a href="workers.html">Захарова Татьяна Владиславовна</a>
                                    </h4>
                                    <p class="worker-excerpt">Тренер второй квалификационной категории. Стаж 5 лет</p>
                                    <div class="worker-links d-flex justify-content-end">
                                        <a href="login.html" class="btn btn-outline-secondary add-to-form">
                                            Записаться
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                            <div class="worker-card">
                                <div class="worker-photo">
                                    <a href="workers.html"><img src="assets/img/worker/14.jpg" alt=""></a>
                                </div>
                                <div class="worker-details">
                                    <h4>
                                        <a href="workers.html">Иванова Анастасия Игоревна</a>
                                    </h4>
                                    <p class="worker-excerpt">Тренер первой квалификационной категории. Стаж 6 лет</p>
                                    <div class="worker-links d-flex justify-content-end">
                                        <a href="login.html" class="btn btn-outline-secondary add-to-form">
                                            Записаться
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                            <div class="worker-card">
                                <div class="worker-photo">
                                    <a href="workers.html"><img src="assets/img/worker/15.jpg" alt=""></a>
                                </div>
                                <div class="worker-details">
                                    <h4>
                                        <a href="workers.html">Хомякова Алина Максимовна</a>
                                    </h4>
                                    <p class="worker-excerpt">Тренер первой квалификационной категории. Стаж 2 года</p>
                                    <div class="worker-links d-flex justify-content-end">
                                        <a href="login.html" class="btn btn-outline-secondary add-to-form">
                                            Записаться
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>-->
                    <div class="container"> 
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
                    
                </div>
                
            </section>
           
        </main>
        <footer class="footer" id="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3 col-6">
                        <h4>Информация</h4>
                        <ul class="list-unstyled">
                            <li><a href="index.html">Главная</a></li>
                            <li><a href="#">О нас</a></li>
                            <li><a href="#">Тренировки</a></li>
                            <li><a href="#">Персонал</a></li>
                            <li><a href="#">Расписание</a></li>
                            <li><a href="#">Прайс</a></li>
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
    <script scr ="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> 
    <script src="assets/js/main.js/main.js"></script>
</body>
</html>