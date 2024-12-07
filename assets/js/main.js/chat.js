document.addEventListener("DOMContentLoaded", function() {
    // Модальное окно, получаем его элементы
    var modal = document.getElementById("chatModal");
    var btn = document.getElementById("openModalBtn");
    var span = document.getElementsByClassName("close")[0];

    // Открытие модального окна при клике на кнопку
    btn.onclick = function() {
        modal.style.display = "block";
        document.body.classList.add("no-scroll");
    }

    // Закрытие модального окна при клике на <span> (x)
    span.onclick = function() {
        modal.style.display = "none";
    }

    // Закрытие модального окна при клике вне окна
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

    // WebSocket чат
    const ws = new WebSocket('ws://localhost:8083'); // создание соединения
    //обработчики событий
    ws.onopen = () => { //соединение установлено
        console.log('Connected to the WebSocket server');
    };

    ws.onmessage = event => {//получение сообщения от сервера
        const messages = document.getElementById('messages');
        const message = document.createElement('div');
        message.textContent = event.data;
        messages.appendChild(message);
    };

    ws.onerror = error => {
        console.error('WebSocket Error: ', error);
    };

    ws.onclose = event => {
        console.warn('WebSocket Closed: ', event);
    };

    document.getElementById('sendButton').onclick = () => {//отправка сообщения
        const input = document.getElementById('messageInput');
        if (ws.readyState === WebSocket.OPEN) {//проверяем, открыто ли соединение
            ws.send(input.value);
            input.value = '';
        } else {
            console.warn('WebSocket is not open. State: ', ws.readyState);
        }
    };
});
