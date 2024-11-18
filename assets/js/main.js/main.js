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


    
    
