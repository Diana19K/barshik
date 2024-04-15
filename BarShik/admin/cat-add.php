<?php
include "../connect.php";

$category = $_POST['Cated'];
$name = $_POST['Name'];

$categoryid = intval($category);

// SQL запрос для добавления категории
$sql = "INSERT INTO Category(Category_id, Name) VALUES ('$categoryid', '$name')";

if ($con->query($sql) === TRUE) {
    echo "Категория успешно добавлена";
    header('Location: Panel-admin3.php');
} else {
    echo "Ошибка при добавлении категории: " . $con->error;
}
?>