<?php
session_start(); // Запускаем сессию, если она еще не была запущена

// Проверка, является ли пользователь авторизованным
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    // Логика завершения сессии
    session_unset(); // Удаляет все переменные сессии
    session_destroy(); // Уничтожает сессию
    header("Location: admin.php"); // Перенаправление на страницу входа
    exit;
}
?>