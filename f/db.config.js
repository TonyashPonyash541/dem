const mysql = require('mysql');

const connection = mysql.createConnection({
    host: 'DARK\MSSQLSERVER03', // или IP-адрес сервера
    user: 'DARK\Dns', // ваш логин
    database: 'Admin' // имя базы данных
});

connection.connect(err => {
    if (err) {
        return console.error('Ошибка подключения: ' + err.stack);
    }
    console.log('Подключено как id ' + connection.threadId);
});
