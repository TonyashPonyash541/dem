<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Молодежный парламент</title>
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
    
    <main>
        <nav>
            <ul>
        <section class="info-section">
            <div class="block" id="about">
                <h2><i class="fas fa-info-circle"></i> О нас</h2>
                <p>Краткое описание организации.</p>
                <a href="about.php">Узнать больше</a>
            </div>
            <div class="block" id="news">
                <h2><i class="fas fa-newspaper"></i> Новости</h2>
                <p>Новости нашей организации.</p>
                <a href="news.php">Узнать больше</a>
            </div>
            <div class="block" id="gallery">
                <h2><i class="fas fa-image"></i> Фотогалерея</h2>
                <p>Посмотрите наши фотографии.</p>
                <a href="gallery.php">Узнать больше</a>
            </div>
        </section> 
        <section class="news-feed">
        <h2>Последние Новости</h2>
        <div class="news-item">
        <?php
        include 'db.php';
        $latest_news = getLatestNews();
        if (count($latest_news) > 0):
            foreach ($latest_news as $news): ?>
                <div class="news-container">
                    <?php if (!empty($news['image'])): ?>
                        <img src="<?php echo htmlspecialchars($news['image']); ?>" alt="<?php echo htmlspecialchars($news['title']); ?>" class="news-image">
                    <?php endif; ?>
                    <div class="news-content">
                        <h3><?php echo htmlspecialchars($news['title']); ?></h3>
                        <p><?php echo htmlspecialchars($news['summary']); ?>
                        <p><?php?>Дата: <?php echo htmlspecialchars(date('d.m.Y', strtotime($news['date']))); ?></p>
                    </div>
                </div>
            <?php endforeach;
        else: ?>
            <p>Нет доступных новостей.</p>
        <?php endif; ?>
</div>
</section>
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
    <script>
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