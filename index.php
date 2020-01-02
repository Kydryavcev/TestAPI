<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=testapi', 'root', '');
} catch (PDOException $th) {
    echo 'Ошибка подключения к базе данных: ' . $th->getMessage();
}

$name = $_GET['name'];

if ($name) {
    $query = "SELECT * FROM users WHERE `name` LIKE $name";
    $api = $pdo->query($query);
    
    echo json_encode(['response' => $api->fetch()]);
}else {
    echo json_encode(['error' => 1,'text_error' => 'No name']);
}
