<?php
include '..//connect.php';

// Получение ID категории из запроса
$id = $_GET['id'];

// Запрос на удаление продуктов с данной категорией
$query_delete_products = "DELETE FROM Product WHERE Category_id = $id";
mysqli_query($con, $query_delete_products);

// Запрос на удаление категории
$query_delete_category = "DELETE FROM Category WHERE Category_id = $id";
mysqli_query($con, $query_delete_category);

// Перенаправление на страницу управления категориями
header('Location: Panel-admin3.php');
?>