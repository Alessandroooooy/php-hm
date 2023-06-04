<?php
$servername = "a_level_mysql";
$username = "myapp";
$password = "myapp";
$dbname = "a_level";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}

$sql = "SELECT * FROM products";
$result = $conn->query($sql);

if ($result === false) {
    die("Ошибка при выполнении запроса: " . $conn->error);
}

if ($result->num_rows > 0) {
    $products = "";
    while ($row = $result->fetch_assoc()) {
        $products .= "<div>";
        $products .= "<h3>" . $row['name'] . "</h3>";
        $products .= "<p>" . $row['description'] . "</p>";
        $products .= "<p>Цена: " . $row['price'] . "</p>";
        $products .= "</div>";
    }
    
    echo $products;
} else {
    echo "Нет доступных продуктов";
}

$conn->close();