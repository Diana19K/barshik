<?php
include "..//connect.php";

$name = $_POST['Name'];
$category = $_POST['Categ'];
$price = $_POST['Price'];
$description = $_POST['Desc'];
$image = $_POST['Image'];
$categoryid = intval($category);
// SQL запрос для добавления товара
$sql = "INSERT INTO Product (Name, Description, Category_id, Price, Image) VALUES ('$name', '$description', '$category', '$price', '$image')";

if ($con->query($sql) === TRUE) {
    echo "Товар успешно добавлен";
    header('Location: Panel-admin2.php');
} else {
    echo "Ошибка при добавлении товара: " . $con->error;
}
?>