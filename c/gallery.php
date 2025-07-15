<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Фотогалерея Молодежного парламента</title>
    <link rel="stylesheet" href="gallery.css">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <style>
            nav {
    margin: 15px 0;
}
.gallery-container {
    max-width: 1200px;
    margin: 20px auto;
    padding: 0 15px;
    position: relative;
}

.gallery-slider {
    position: relative;
    overflow: hidden;
    border-radius: 8px;
}

.slider-container {
    display: flex;
    transition: transform 0.5s ease;
}

.slide {
    min-width: 100%;
    box-sizing: border-box;
    padding: 0 15px;
    display: flex;
    flex-direction: column;
}

.image-wrapper {
    width: 100%;
    height: 500px; /* Фиксированная высота для всех изображений */
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #f0f0f0;
}

.image-wrapper img {
    max-width: 100%;
    max-height: 100%;
    object-fit: contain; /* Сохраняет пропорции */
}

.photo-description {
    padding: 15px;
    margin: 10px 0 0;
    font-size: 14px;
    line-height: 1.4;
    color: #333;
    background: #f9f9f9;
    border-radius: 4px;
    text-align: center;
}

.no-photos {
    text-align: center;
    padding: 40px;
    color: #666;
    font-size: 18px;
}

.slider-prev, .slider-next {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background-color: rgba(0, 0, 0, 0.5);
    color: white;
    border: none;
    padding: 15px;
    cursor: pointer;
    border-radius: 50%;
    z-index: 10;
    font-size: 18px;
}

.slider-prev {
    left: 20px;
}

.slider-next {
    right: 20px;
}

.slider-prev:hover, .slider-next:hover {
    background-color: rgba(0, 0, 0, 0.8);
}

@media (max-width: 768px) {
    .image-wrapper {
        height: 300px;
    }
    
    .slider-prev, .slider-next {
        padding: 10px;
        font-size: 16px;
    }
}

nav ul {
    list-style-type: none;
    padding: 0;
}

nav ul li {
    display: inline;
}

nav ul li a {
    display: inline-block;
    padding: 10px 15px;
    background-color: #4EB543;
    color: #FFFFFF;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s;
}

nav ul li a:hover {
    background-color: #4eb543cc;
}

.gallery-container {
    max-width: 1200px;
    margin: 20px auto;
    padding: 0 15px;
    position: relative;
}

.gallery-slider {
    position: relative;
    overflow: hidden;
    border-radius: 8px;
}

.slider-container {
    display: flex;
    transition: transform 0.5s ease;
}

.slide {
    min-width: 100%;
    box-sizing: border-box;
    padding: 0 15px;
    display: flex;
    flex-direction: column;
}

.image-wrapper {
    width: 100%;
    height: 500px; /* Фиксированная высота для всех изображений */
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #f0f0f0;
}

.image-wrapper img {
    max-width: 100%;
    max-height: 100%;
    object-fit: contain; /* Сохраняет пропорции */
}

.photo-description {
    padding: 15px;
    margin: 10px 0 0;
    font-size: 14px;
    line-height: 1.4;
    color: #333;
    background: #f9f9f9;
    border-radius: 4px;
    text-align: center;
}

.no-photos {
    text-align: center;
    padding: 40px;
    color: #666;
    font-size: 18px;
}

.slider-prev, .slider-next {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background-color: rgba(0, 0, 0, 0.5);
    color: white;
    border: none;
    padding: 15px;
    cursor: pointer;
    border-radius: 50%;
    z-index: 10;
    font-size: 18px;
}

.slider-prev {
    left: 20px;
}

.slider-next {
    right: 20px;
}

.slider-prev:hover, .slider-next:hover {
    background-color: rgba(0, 0, 0, 0.8);
}

@media (max-width: 768px) {
    .image-wrapper {
        height: 300px;
    }
    
    .slider-prev, .slider-next {
        padding: 10px;
        font-size: 16px;
    }
}
 
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
                </div>
            </header>
        </div>
    </header>
    <nav>
        <ul>
            <li><a href="index.php">Главная</a></li>
            <li><a href="about.php">О нас</a></li>
            <li><a href="news.php">Новости</a></li>
        </ul>
    </nav>
   <section class="news-feed">
    <h2>Фотогалерея</h2>
    <div class="gallery-container">
        <div class="gallery">
            <?php include 'db.php'; $photos = getGalleryPhotos(); 
            if (!empty($photos)): ?>
                <?php foreach ($photos as $photo): ?>
                    <div class="gallery-item">
                        <div class="image-wrapper">
                            <img src="<?php echo $photo['url']; ?>" alt="<?php echo htmlspecialchars($photo['description']); ?>">
                        </div>
                        <p class="photo-description"><?php echo htmlspecialchars($photo['description']); ?></p>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="no-photos">Фотографий пока нет.</p>
            <?php endif; ?>
        </div>
        </div>
        <div class="carousel-controls">
          <button class="prev" onclick="changeSlide(-1)">&#10094;</button>
        <button class="next" onclick="changeSlide(1)">&#10095;</button>
        </div>
    </div>
    </section>
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
                    <span class="contact-text">АМУРСКАЯ ОБЛ.,Г ШИМАНОВСК,УЛ КРАСНОАРМЕЙСКАЯ, Д 29</span>
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
        <div class="copyright">
            © 2025 Молодежный парламент города Шимановска. Все права защищены.
        </div>
    </footer>
    <script src="gallery.js"></script>
    <script src="script.js"></script>
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