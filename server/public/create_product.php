<?php

$servername = "a_level_mysql";
$username = "myapp";
$password = "myapp";
$dbname = "a_level";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}

$name = $_POST['name'];
$description = $_POST['description'];
$price = $_POST['price'];

$stmt = $conn->prepare("INSERT INTO products (name, description, price) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $name, $description, $price);

if ($stmt->execute() === TRUE) {
    echo "Продукт успешно создан";
} else {
    echo "Ошибка при создании продукта: " . $conn->error;
}

$stmt->close();
$conn->close();