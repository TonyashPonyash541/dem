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
        /* Стили для описаний фотографий */
        .gallery-item-container {
            position: relative;
            margin: 15px;
            overflow: hidden;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }
        
        .gallery-item-container:hover {
            transform: scale(1.03);
        }
        
        .photo-description {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: rgba(0,0,0,0.7);
            color: white;
            padding: 15px;
            transform: translateY(100%);
            transition: transform 0.3s ease;
        }
        
        .gallery-item-container:hover .photo-description {
            transform: translateY(0);
        }
        
        .gallery {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            padding: 20px;
        }
        
        .gallery-item {
            width: 100%;
            height: auto;
            display: block;
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
                <?php 
                include 'db.php'; 
                $photos = getGalleryPhotos(); 
                foreach ($photos as $photo): ?>
                    <div class="gallery-item-container">
                        <img src="<?php echo $photo['url']; ?>" alt="Фото" class="gallery-item">
                        <?php if (!empty($photo['description'])): ?>
                            <div class="photo-description">
                                <p><?php echo htmlspecialchars($photo['description']); ?></p>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        
        <button class="prev" onclick="changeSlide(-1)">&#10094;</button>
        <button class="next" onclick="changeSlide(1)">&#10095;</button>
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
</body>
</html>