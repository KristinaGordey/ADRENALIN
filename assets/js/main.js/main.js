// Example starter JavaScript for disabling form submissions if there are invalid fields
(() => {
        'use strict'
    
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const forms = document.querySelectorAll('.needs-validation')
    
        // Loop over them and prevent submission
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }
    
                form.classList.add('was-validated')
            }, false)
        })
    })();
    
window.addEventListener('scroll', () => {
        document.getElementById('header-nav').classList.toggle('headernav-scroll', window.scrollY > 135);

});
const offcanvasCartEl = document.getElementById('offcanvasCart');
const offcanvasCart = new bootstrap.Offcanvas(offcanvasCartEl);

document.querySelectorAll('.closecart').forEach(item => {
    item.addEventListener('click', (e) => {
        e.preventDefault();
        offcanvasCart.hide();
        // let href = item.href.split('#').pop();
        const href = item.dataset.href;
        offcanvasCartEl.addEventListener('hidden.bs.offcanvas', () => {
            document.getElementById(href).scrollIntoView();
        });
    });
});
document.addEventListener("DOMContentLoaded", function () {
        var topButton = document.getElementById('top');
    
        window.addEventListener('scroll', function () {
            if (window.scrollY > 300) {
                topButton.style.display = 'block';
            } else {
                topButton.style.display = 'none';
            }
        });
    
        topButton.addEventListener('click', function () {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
});

// document.addEventListener('DOMContentLoaded', function() {
//     var isAuthenticated = sessionStorage.getItem('isAuthenticated') === 'true';
//     var accountButton = document.getElementById('account-button');
//     var dropdownMenu = document.querySelector('.dropdown-menu');
//     var dropdownItems = document.querySelectorAll('.dropdown-menu .dropdown-item');

//     function updateDropdown(condition) {
//         if (condition && accountButton) {
//             accountButton.innerText = 'Выйти';
//             accountButton.classList.add('no-arrow'); // Добавляем класс для скрытия стрелки
//             dropdownItems.forEach(item => { 
//                 item.style.display = 'none'; 
//             });
//            dropdownMenu.style.display = 'none'; // Скрываем весь выпадающий список
//         } else if (accountButton) {
//             accountButton.innerText = 'Аккаунт';
//             accountButton.classList.remove('no-arrow'); // Убираем класс для скрытия стрелки
//             dropdownItems.forEach(item => { 
//                 item.style.display = 'block'; 
//             });
//             dropdownMenu.style.display = 'block'; // Восстанавливаем отображение выпадающего списка
//         }
//     }

//     // Проверка условия при загрузке страницы
//     updateDropdown(isAuthenticated);

//     // Событие при клике на кнопку
//     if (accountButton) {
//         accountButton.addEventListener('click', function(event) {
//             event.stopPropagation(); // Останавливаем распространение события
    
//             if (isAuthenticated) {
//                 isAuthenticated = false;
//                 sessionStorage.setItem('isAuthenticated', isAuthenticated.toString());
//                 updateDropdown(isAuthenticated);
//             } else {
//                 dropdownMenu.style.display = dropdownMenu.style.display === 'block' ? 'none' : 'block';
//             }
//         });
//     }
    

//     // Добавляем слушатель событий на документ
//     document.addEventListener('click', function(event) { 
//         if (!accountButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
//              dropdownMenu.style.display = 'none'; 
//             } 
//             event.stopPropagation(); // Останавливаем распространение события 
//             });
// });




document.addEventListener('DOMContentLoaded', function() {
    var isAuthenticated = sessionStorage.getItem('isAuthenticated') === 'true';//проверка состояния аутентификации
    var accountButton = document.getElementById('account-button');
    var dropdownItems = document.querySelectorAll('.dropdown-menu .dropdown-item');

    function updateDropdown(condition) {
        if (condition && accountButton) {
            accountButton.innerText = 'Выйти';
            accountButton.classList.add('no-arrow'); // Добавляем класс для скрытия стрелки
            dropdownItems.forEach(item => { 
                item.style.display = 'none'; 
            });
        } else if (accountButton) {
            accountButton.innerText = 'Аккаунт';
            accountButton.classList.remove('no-arrow'); // Убираем класс для скрытия стрелки
            dropdownItems.forEach(item => { 
                item.style.display = 'block'; 
            });
        }
    }

    // Проверка условия при загрузке страницы, чтобы сразу настроить отображение элементов 
    updateDropdown(isAuthenticated);

    // Событие при клике на кнопку
    if (accountButton) {
        accountButton.addEventListener('click', function(event) {
            event.stopPropagation(); // Останавливаем распространение события
    
            if (isAuthenticated) {
                isAuthenticated = false;
                sessionStorage.setItem('isAuthenticated', isAuthenticated.toString());
                updateDropdown(isAuthenticated);
            }
        });
    }
    
    // Добавляем слушатель событий на документ
    document.addEventListener('click', function(event) { 
        event.stopPropagation(); // Останавливаем распространение события 
    });
});




// //календарь на странице записи
// $(document).ready(function() { 
//     // Инициализация календаря 
//     $('#calendar').fullCalendar({
//          header: { 
//             left: 'prev,next today', 
//             center: 'title', 
//             right: 'month,agendaWeek,agendaDay' 
//         },
//         locale: 'ru', 
//         defaultView: 'month', // Устанавливаем вид по умолчанию - месячный 
//         editable: false, 
//         selectable: true, 
        
//         select: function(start, end, jsEvent, view) {
//              var date = moment(start).format('YYYY-MM-DD'); 
//              alert('Вы выбрали дату: ' + date);
//              }, 
//              eventLimit: true, // Показать "больше" в случае превышения количества событий
//              validRange: { start: moment().format('YYYY-MM-DD') // Минимальная дата - текущая дата 
//                 }
//         });
//     });


    
    
