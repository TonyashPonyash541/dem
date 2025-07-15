<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="news.css"> 
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Новости Молодежного парламента</title>
<style>
 
        /* Стили для версии для слабовидящих */
        .accessibility-panel {
            display: none;
            position: fixed;
            top: 100px;
            right: 20px;
            background: white;
            padding: 15px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.3);
            z-index: 1000;
        }
        
        .accessibility-option {
            margin: 10px 0;
        }
        
        .high-contrast {
            background: #000 !important;
            color: #000 !important;
        }
        
        .high-contrast a {
            color: #ffff00 !important;
        }
        
        .big-text {
            font-size: 20px !important;
        }
        
        .big-text h1, .big-text h2, .big-text h3 {
            font-size: 150% !important;
        }
/* Основной контент - всегда вертикальный */
.main-content {
  display: flex;
  flex-direction: column; /* Всегда вертикально */
  width: 100%;
  max-width: 1200px;
  margin: 0 auto;
  padding: 20px;
  gap: 30px;
}

/* Секция новостей */
.news-section {
  width: 100%;
  background: rgba(255, 255, 255, 0.9);
  border-radius: 10px;
  padding: 20px;
  box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
}

/* Секция календаря */
.calendar-section {
  width: 100%;
  background: rgba(255, 255, 255, 0.9);
  border-radius: 10px;
  padding: 20px;
  box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
}

/* Стили для новостей */
.news-list {
  display: flex;
  flex-direction: column;
  gap: 25px;
}

.news-item {
  display: flex;
  flex-direction: column;
  gap: 15px;
  padding-bottom: 20px;
  border-bottom: 1px solid #eee;
}

/* Убираем все горизонтальные расположения */
.news-content, 
.news-header, 
.news-footer {
  display: flex;
  flex-direction: column;
}

/* Календарь */
.calendar-container {
  width: 100%;
}

/* Убираем медиа-запрос, который делал горизонтальное расположение */
@media (max-width: 480px) {
  .news-header {
    flex-direction: column;
    align-items: flex-start;
    gap: 5px;
  }
}
    </style>
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
         <button class="accessibility" aria-label="Версия для слабовидящих" onclick="toggleAccessibilityPanel()">
                        <i class="fas fa-eye"></i>
                    </button>
     </div>
            </header>
        </div>
    </header>
    
    <!-- Панель для слабовидящих -->
    <div id="accessibilityPanel" class="accessibility-panel">
        <h3>Версия для слабовидящих</h3>
        <div class="accessibility-option">
            <button onclick="toggleHighContrast()">Высокая контрастность</button>
        </div>
        <div class="accessibility-option">
            <button onclick="toggleBigText()">Увеличить шрифт</button>
        </div>
        <div class="accessibility-option">
            <button onclick="resetAccessibility()">Обычная версия</button>
        </div>
    </div>
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
    <script>
        // Функции для версии для слабовидящих
        function toggleAccessibilityPanel() {
            const panel = document.getElementById('accessibilityPanel');
            panel.style.display = panel.style.display === 'block' ? 'none' : 'block';
        }
        
        function toggleHighContrast() {
            document.body.classList.toggle('high-contrast');
        }
        
        function toggleBigText() {
            document.body.classList.toggle('big-text');
        }
        
        function resetAccessibility() {
            document.body.classList.remove('high-contrast', 'big-text');
        }
        
        // Оригинальные функции из вашего кода
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
</body>
</html>