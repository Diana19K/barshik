<?php
include "../connect.php";
$id = $_GET['id'];

$result = mysqli_query($con, "DELETE FROM `Orders` WHERE `Id_order` = $id");
echo "<script>alert('Продукт удален');location.href = 'Panel-admin4.php';</script>";
?>