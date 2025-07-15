<?php
session_start();
include 'db.php';

// Проверка введенного пароля
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['password'])) {
    $password = $_POST['password'];
    $correct_password = 'e8a%B9@XWbE]'; 
    $correct_login = 'admin';

    if ($password === $correct_password) {
        $_SESSION['logged_in'] = true;
        header("Location: admin.php");
        exit();
    } else {
        $error_message = "Неверный пароль.";
    }
}

if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Административная панель - Вход</title>
    <link rel="stylesheet" href="admin.css">
    </style>
</head>
<body>
    <div class="login-container">
        <h1>Административная панель</h1>
        <h2>Вход</h2>
        
        <?php if (isset($error_message)): ?>
            <div class="error-message"><?php echo $error_message; ?></div>
        <?php endif; ?>
        
        <form method="post" action="admin.php">
            <div class="form-group">
                <label for="login">Логин:</label>
                <input type="text" id="login" name="login" placeholder="" required>
            </div>
            
            <div class="form-group">
                <label for="password">Пароль:</label>
                <input type="password" id="password" name="password" placeholder="" required>
            </div>
            
            <button type="submit">Войти</button>
        </form>
    </div>
</body>
</html>
<?php
    exit();
}

// Обработка удаления элементов
if (isset($_GET['delete'])) {
    $type = $_GET['type'];
    $id = $_GET['id'];
    
    switch ($type) {
        case 'news':
            $stmt = $conn->prepare("DELETE FROM news WHERE id = ?");
            break;
        case 'member':
            $stmt = $conn->prepare("DELETE FROM about WHERE id = ?");
            break;
        case 'photo':
            $stmt = $conn->prepare("DELETE FROM photos WHERE id = ?");
            break;
        default:
            die("Неверный тип элемента");
    }
    
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        header("Location: admin.php");
        exit();
    } else {
        die("Ошибка удаления: " . $stmt->error);
    }
}

function handlePostRequest() {
    global $conn;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $targetPath = '';

        // Обработка загрузки изображения
        if (isset($_FILES['image']) && !empty($_FILES['image']['tmp_name'])) {
            $imageFile = $_FILES['image'];
            if ($imageFile['error'] === UPLOAD_ERR_OK) {
                $uploadDir = 'uploads/';
                $imageName = basename($imageFile['name']);
                $targetPath = $uploadDir . $imageName;

                if (move_uploaded_file($imageFile['tmp_name'], $targetPath)) {
                    echo "Файл успешно загружен.";
                } else {
                    echo "Ошибка загрузки изображения.";
                    return;
                }
            } else {
                echo "Ошибка при загрузке файла: " . $imageFile['error'];
                return;
            }
        }

        // Добавление новостей
        if (isset($_POST['add_news'])) {
            $title = $_POST['title'] ?? '';
            $description = $_POST['description'] ?? '';
            $image = $targetPath;

            if (empty($title) || empty($description)) {
                echo "Название и описание не могут быть пустыми.";
                return;
            }

            $stmt = $conn->prepare("INSERT INTO news (title, description, image) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $title, $description, $image);

            if ($stmt->execute()) {
                echo "Новость успешно добавлена.";
                header("Location: " . $_SERVER['PHP_SELF']); 
                exit();
            } else {
                echo "Ошибка добавления новости: " . $stmt->error;
            }
            $stmt->close();
        }

        // Добавление члена парламента
        if (isset($_POST['add_member'])) {
            $name = $_POST['name'] ?? '';
            $description = $_POST['description'] ?? '';
     
            if (empty($name) || empty($description) || !isset($_FILES['photo']) || $_FILES['photo']['error'] !== UPLOAD_ERR_OK) {
                echo "Имя, описание и фото не могут быть пустыми.";
                return;
            }
     
            $imageFile = $_FILES['photo'];
     
            if ($imageFile['error'] === UPLOAD_ERR_OK) {
                $uploadDir = 'uploads/';
                $imageName = basename($imageFile['name']);
                $targetPath = $uploadDir . $imageName;
     
                if (move_uploaded_file($imageFile['tmp_name'], $targetPath)) {
                    // Файл успешно загружен
                } else {
                    echo "Ошибка загрузки изображения.";
                    return;
                }
            } else {
                echo "Ошибка при загрузке файла: " . $imageFile['error'];
                return;
            }
     
            $stmt = $conn->prepare("INSERT INTO about (name, description, photo) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $name, $description, $targetPath);
     
            if ($stmt->execute()) {
                echo "Член парламента успешно добавлен.";
            } else {
                echo "Ошибка добавления члена парламента: " . $stmt->error;
            }
            $stmt->close();
        }
    
       // Добавление фото в галерею
        if (isset($_POST['add_photo'])) {
            if (!isset($_FILES['photo']) || $_FILES['photo']['error'] !== UPLOAD_ERR_OK) {
                echo "Фото не может быть пустым.";
                return;
            }
        
            $imageFile = $_FILES['photo'];
        
            if ($imageFile['error'] === UPLOAD_ERR_OK) {
                $uploadDir = 'uploads/';
                $imageName = basename($imageFile['name']);
                $targetPath = $uploadDir . $imageName;
        
                if (move_uploaded_file($imageFile['tmp_name'], $targetPath)) {
                    // Файл успешно загружен
                } else {
                    echo "Ошибка загрузки изображения.";
                    return;
                }
            } else {
                echo "Ошибка при загрузке файла: " . $imageFile['error'];
                return;
            }
        
            $description = $_POST['description'] ?? '';
            $stmt = $conn->prepare("INSERT INTO photos (url, description) VALUES (?, ?)");
            $stmt->bind_param("ss", $targetPath, $description);
        
            if ($stmt->execute()) {
                echo "Фото успешно добавлено в галерею.";
            } else {
                echo "Ошибка добавления фото в галерею: " . $stmt->error;
            }
            $stmt->close();
        }
    } 
}
handlePostRequest();

// Получение данных для отображения
$news = $conn->query("SELECT * FROM news ORDER BY id DESC");
$members = $conn->query("SELECT * FROM about ORDER BY id DESC");
$photos = $conn->query("SELECT * FROM photos ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Управление контентом</title>
    <link rel="stylesheet" href="panel.css">
    <style>
        .content-list {
            margin: 20px 0;
            border: 1px solid #ddd;
            padding: 15px;
            border-radius: 5px;
        }
        .content-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            border-bottom: 1px solid #eee;
        }
        .content-item:last-child {
            border-bottom: none;
        }
        .delete-btn {
            background: #ff4444;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 3px;
            cursor: pointer;
        }
        .delete-btn:hover {
            background: #cc0000;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Управление контентом</h1>
        
        <div class="forms-container">
            <div class="form-section">
                <h2>Добавить Новости</h2>
                <form method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="text" name="title" placeholder="Название" required>
                    </div>
                    <div class="form-group">
                        <textarea name="description" placeholder="Описание" required></textarea>
                    </div>
                    <div class="form-group">
                        <div class="file-input-container">
                            <label class="file-input-label">
                                <svg viewBox="0 0 24 24">
                                    <path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"/>
                                </svg>
                                <span class="file-input-text">Выберите изображение</span>
                            </label>
                            <input type="file" name="image" accept="image/*" required>
                        </div>
                    </div>
                    <button type="submit" name="add_news">Добавить</button>
                </form>
            </div>
            
            <div class="form-section">
                <h2>Добавить Члена Парламента</h2>
                <form method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="text" name="name" placeholder="Имя" required>
                    </div>
                    <div class="form-group">
                        <textarea name="description" placeholder="Описание" required></textarea>
                    </div>
                    <div class="form-group">
                        <div class="file-input-container">
                            <label class="file-input-label">
                                <svg viewBox="0 0 24 24">
                                    <path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"/>
                                </svg>
                                <span class="file-input-text">Выберите фотографию</span>
                            </label>
                            <input type="file" name="photo" accept="image/*" required>
                        </div>
                    </div>
                    <button type="submit" name="add_member">Добавить</button>
                </form>
            </div>
            
            <div class="form-section">
                <h2>Добавить Фото в Галерею</h2>
                <form method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="file-input-container">
                            <label class="file-input-label">
                                <svg viewBox="0 0 24 24">
                                    <path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"/>
                                </svg>
                                <span class="file-input-text">Выберите фотографию</span>
                            </label>
                            <input type="file" name="photo" accept="image/*" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea name="description" placeholder="Описание" required></textarea>
                    </div>
                    <button type="submit" name="add_photo">Добавить</button>
                </form>
            </div>
        </div>

        <!-- Список новостей с возможностью удаления -->
        <div class="content-list">
            <h2>Список новостей</h2>
            <?php while($item = $news->fetch_assoc()): ?>
                <div class="content-item">
                    <span><?php echo htmlspecialchars($item['title']); ?></span>
                    <a href="?delete=1&type=news&id=<?php echo $item['id']; ?>" class="delete-btn">Удалить</a>
                </div>
            <?php endwhile; ?>
        </div>

        <!-- Список членов парламента с возможностью удаления -->
        <div class="content-list">
            <h2>Список членов парламента</h2>
            <?php while($member = $members->fetch_assoc()): ?>
                <div class="content-item">
                    <span><?php echo htmlspecialchars($member['name']); ?></span>
                    <a href="?delete=1&type=member&id=<?php echo $member['id']; ?>" class="delete-btn">Удалить</a>
                </div>
            <?php endwhile; ?>
        </div>

        <!-- Список фотографий с возможностью удаления -->
        <div class="content-list">
            <h2>Список фотографий</h2>
            <?php while($photo = $photos->fetch_assoc()): ?>
                <div class="content-item">
                    <span><?php echo htmlspecialchars($photo['description']); ?></span>
                    <a href="?delete=1&type=photo&id=<?php echo $photo['id']; ?>" class="delete-btn">Удалить</a>
                </div>
            <?php endwhile; ?>
        </div>
        
        <div class="logout-container">
            <a href="logout.php" class="logout-link">
                <svg viewBox="0 0 24 24">
                    <path d="M16 17v-3H9v-4h7V7l5 5-5 5M14 2a2 2 0 0 1 2 2v2h-2V4H5v16h9v-2h2v2a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9z"/>
                </svg>
                Выйти
            </a>
        </div>
    </div>
</body>
</html>