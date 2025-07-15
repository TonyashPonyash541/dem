<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="about.css">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>О Нас - Молодежный парламент</title>
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
</body>
</html>
