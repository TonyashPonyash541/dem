<?php
$host = 'localhost';
$db = 'parliament';
$user = 'root';
$pass = '3@pR3cnbUv9BG%YlUq';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
}
function getLatestNews() {
    global $conn;
    $sql = "SELECT title, description AS summary, image, date FROM news ORDER BY date DESC LIMIT 4";
    return $conn->query($sql)->fetch_all(MYSQLI_ASSOC);
}

function getAllNews($offset = 0, $limit = 6) {
    global $conn;
    $sql = "SELECT id, title, description AS summary, image, date FROM news ORDER BY date DESC LIMIT $offset, $limit";
    $result = $conn->query($sql);
    if ($result) {
      return $result->fetch_all(MYSQLI_ASSOC);
    } else {
      return []; 
    }
}

function getGalleryPhotos() {
    global $conn;
    $sql = "SELECT id, url, description FROM photos ORDER BY id DESC";
    $result = $conn->query($sql);
    $photos = [];
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $photos[] = $row;
        }
    }
    return $photos;
}

function getParliamentMembers() {
    global $conn;
    $sql = "SELECT name, photo, description FROM about";
    return $conn->query($sql)->fetch_all(MYSQLI_ASSOC);
}
?>
