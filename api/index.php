<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=testapi', 'root', '');
} catch (PDOException $th) {
    echo 'Ошибка подключения к базе данных: ' . $th->getMessage();
}

$name = $_GET['name'];

if ($name) {
    $query = "SELECT * FROM `users` WHERE `name` LIKE '$name'";
    $api   = $pdo->query($query);
    $user  = $api->fetch();
    if ($user) {
        echo json_encode(["response" => $user]);
    } else {
        echo json_encode(['error' => 2,'text_error' => 'The user with the specified name does not exist']);
    }    
}else {
    echo json_encode(['error' => 1,'text_error' => '"Name" parameter not specified']);
}
