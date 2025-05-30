const WebSocket = require('ws');

const wss = new WebSocket.Server({ port: 8083 }); // создание вебсокет сервера на порту 8083

wss.on('connection', ws => { //обработка подключения
    ws.on('message', message => {
        console.log(`Received message => ${message}`);//логирование полученного подключения
        
        let response = generateResponse(message.toString());//генерация ответа
        ws.send(`Пользователь: ${message}`);//отправка полученного сообщения
        ws.send(`Чат-бот: ${response}`);///отправка сгенерированного ответа
    });

    ws.send('Добро пожаловать в чат поддержки! Сообщите, с какой проблемой вы столкнулись?');
});

function generateResponse(message) {
    const keywords = { 
       "привет":`Вас приветствует администрация фитнес-центра "ADRENALIN"! Чем мы можем вам помочь?`,
      "вход": `Для решения проблем с авторизацией выполните следующие действия: 1. Убедитесь, что вы вводите правильные учетные данные (логин и пароль).2. Если вы забыли пароль, воспользуйтесь функцией восстановления пароля. 3. Проверьте стабильность интернет-соединения. 4. Если проблема сохраняется, попробуйте очистить кэш браузера и повторите попытку.`,
      "авторизация": `Для решения проблем с авторизацией выполните следующие действия: 1. Убедитесь, что вы вводите правильные учетные данные (логин и пароль). 2. Если вы забыли пароль, воспользуйтесь функцией восстановления пароля. 3. Проверьте стабильность интернет-соединения.4. Если проблема сохраняется, попробуйте очистить кэш браузера и повторите попытку.`,
      "регистрация": `Для решения проблем с регистрацией выполните следующие действия: 1. Убедитесь, что все обязательные поля формы заполнены корректно. 2. Убедитесь, что вы используете действующий адрес электронной почты. 3. Проверьте, нет ли сообщений об ошибках или уведомлений на странице.4. Если проблема сохраняется, попробуйте использовать другой браузер или устройство.`,
      "создание записи": `Для создания записи выполните следующие шаги: 1. Перейдите на страницу создания записи в вашем аккаунте.2. Заполните все необходимые поля информации. 3. Убедитесь, что вы правильно вводите все данные и нет ошибок в форме. 4. После заполнения нажмите кнопку "Создать запись" и дождитесь подтверждения об успешном создании.`
    };
  
    let response = "Мы не смогли определить вашу проблему. Пожалуйста, уточните вопрос.";
    for (let key in keywords) {
      let mes = message.toLowerCase();
      if (mes.includes(key)) {
        response = keywords[key];
        break;
      }
    }
  
    return response.replace(/\n/g, '<br>');
  }
  

console.log("WebSocket server is running on ws://localhost:8083"); //вывод сообщения о том, что сервер запущен и работает на указанном адресе
