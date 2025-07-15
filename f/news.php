<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="news.css"> 
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Новости Молодежного парламента</title>
</head>
<body>
    <header>
    <div class="container">
    <header>
      <div class="logo">
      <img src="path_to_your_loo.png" alt="Логотип Молодежи">
        <div class="header-title">
          <h1>Молодежный парламент</h1>
          <h2>города Шимановска</h2>
        </div>
      </div>
      <div class="right">
        <div class="search-container">
        <button class="search-button"><i class="fas fa-search"></i></button>
        <input type="text" placeholder="Поиск новостей... " class="search" id="search-input" style="display: none;">
        </div>
        <a href="https://t.me/molodezhshim" class="tg-button" target="_blank">
          <i class="fab fa-telegram"></i>
        </a>
    </header>
  </div>
</header>
<main>
    <nav>
        <ul>
            <li><a href="index.php">Главная</a></li>
            <li><a href="about.php">О нас</a></li>
            <li><a href="gallery.php">Фотогалерея</a></li>
        </ul>
    </nav>
</head>
<main>
    <head>
    <title>Новости</title>
        <script>
            function toggleContent(newsId) {
                const fullContent = document.querySelector(`#${newsId} .full-content`);
                const preview = document.querySelector(`#${newsId} .preview`);
                if (fullContent.style.display === "none") {
                    fullContent.style.display = "block";
                    preview.style.display = "none";
                } else {
                    fullContent.style.display = "none";
                    preview.style.display = "block";
                }
            }
        </script>
    </head>
    <body>
    <h2 class="news-title">Новости</h2>
    <div class="container">
    <div class="news-feed">
        <?php
        include 'db.php';
        $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $limit = 5; // Ограничение на количество новостей на странице
        $offset = ($currentPage - 1) * $limit; // Смещение для SQL запроса
        // Получаем новости
        $all_news = getAllNews($offset, $limit); 
        // Получаем общее количество новостей
        $totalNews = $conn->query("SELECT COUNT(*) as count FROM news")->fetch_assoc()['count'];
        $totalPages = ceil($totalNews / $limit); // Общее количество страниц
        ?>
        <div class="news-container">
            <?php foreach ($all_news as $news): ?>
                <div class="news-item" id="news<?php echo $news['id']; ?>">
                <div class="news-content">
                        <img src="<?php echo htmlspecialchars($news['image']); ?>" alt="News Image">
                        <div class="text-content">
                            <h3><?php echo htmlspecialchars($news['title']); ?></h3>                 
                            <p class="full-content" style="display:none;"><?php echo htmlspecialchars($news['summary']); ?></p>
                            <a class="read-more" href="#" onclick="toggleContent('news<?php echo $news['id']; ?>')">Читать далее</a>
                            <p><?php?>Дата: <?php echo htmlspecialchars(date('d.m.Y', strtotime($news['date']))); ?></p>
                        </div>
                        </div>
                        </div>
    <?php endforeach; ?>
    </div>
    </div>
    <div class="calendar-container">
    <div class="calendar-header">
        <button class="nav-button" onclick="prevMonth()">&#9664;</button>
        <span id="month-year"></span>
        <button class="nav-button" onclick="nextMonth()">&#9654;</button>
    </div>
    <div id="calendar"></div>
</div>
</div>

</div>
<div class="pagination">
    <?php if ($currentPage > 1): ?>
        <button class="pagination-button" onclick="location.href='?page=<?php echo $currentPage - 1; ?>'">Назад</button>
    <?php endif; ?>
    <?php if ($currentPage < $totalPages): ?>
        <button class="pagination-button" onclick="location.href='?page=<?php echo $currentPage + 1; ?>'">Вперед</button>
    <?php endif; ?>
</div>
 </main>
    <footer>
    <div class="contact-card">
  <h2>Контакты</h2>
  <div class="contact-info">
    <div class="contact-item">
      <span class="contact-text">+7 (41651) 2-13-13, +7 (914) 581-08-80, +7 (41651) 2-04-32</span>
    </div>
    <div class="contact-item">
      <span class="contact-text">molparlamentshimanovsk@mail.ru</span>
    </div>
    <div class="contact-item">
      <span class="contact-text"> АМУРСКАЯ ОБЛ.,Г ШИМАНОВСК,УЛ КРАСНОАРМЕЙСКАЯ, Д 29
</span>
    </div>
  </div>
  <div class="social-links">
    <a href="https://t.me/meriiashimanovska" class="social-link"><i class="fab fa-telegram"></i></a>
    <a href="https://vk.com/molodezhshim" class="social-link"><i class="fab fa-vk"></i></a>
  </div>
  <a href="https://t.me/molodezhshim" class="telegram-link" target="_blank">
    <img src="telegram-icon.png" alt="Telegram" class="telegram-icon">
    <span>Наш Telegram</span>
  </a>
</div>
<footer>
    <div class="copyright">
      © 2025 Молодежный парламент города Шимановска. Все права защищены.
    </div>
  </div>
</footer>
    <script src="script.js"></script>
    <script src="news.js"></script>
</body>
</html>