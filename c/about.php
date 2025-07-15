<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="about.css">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>О Нас - Молодежный парламент</title>
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
    </header>
  </div>
</header>
<main>
    <style>
       .carousel { 
            position: relative; 
            width: 100%; 
            overflow: hidden; 
        } 
        .members { 
            display: flex; 
            transition: transform 0.5s ease; 
        } 
        .member { 
            min-width: 300px; 
            text-align: center; 
            margin: 0 10px; 
        }
        .button { 
            background-color: green; /* Зелёный цвет */
            color: white; /* Белый текст */
            border: none; 
            padding: 10px 20px; 
            cursor: pointer; 
            border-radius: 5px; 
            transition: background-color 0.3s; 
        }
        .button:hover { 
            background-color: darkgreen; 
        }
        .prev, .next { 
            position: absolute; 
            top: 50%; 
            transform: translateY(-50%); 
            background-color: green; 
            color: white; 
            border: none; 
            padding: 10px; 
            cursor: pointer; 
            border-radius: 5px; 
        }
        .prev { left: 10px; }
        .next { right: 10px; }
    </style>
</div>
        </div>
    </header>
    <nav>
        <ul>
            <li><a href="index.php">Главная</a></li>
            <li><a href="news.php">Новости</a></li>
            <li><a href="gallery.php">Фотогалерея</a></li>
        </ul>
    </nav>

    <section class="info-section">
        <div class="block" id="aboutUs">
            <h2>Информация о Нас</h2>
            <p>Мы - команда профессионалов, стремящихся улучшить общество и поддерживать различные инициативы...</p>
        </div>

        <div class="block" id="parliamentMembers">
            <h2>Члены Молодежного парламента</h2>
            <div class="carousel">
                <div class="members">
                    <?php 
                    include 'db.php'; 
                    $members = getParliamentMembers(); 
                    foreach ($members as $member): ?>
                        <div class="member">
                            <img src="<?php echo $member['photo']; ?>" alt="Член Парламента">
                            <h3><?php echo $member['name']; ?></h3>
                            <p><?php echo $member['description']; ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
                <button class="prev" onclick="moveSlide(-1)">&#10094;</button>
                <button class="next" onclick="moveSlide(1)">&#10095;</button>
            </div>
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

</div>
<script src="script.js"></script>
<script src="about.js"></script>
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
