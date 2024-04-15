<?php
include('..//connect.php');

if(isset($_GET['id'])) {
    $category_id = $_GET['id'];

    $result = mysqli_query($con, "SELECT * FROM Category WHERE Category_id = '$category_id'");
    $row = mysqli_fetch_assoc($result);
}

if(isset($_POST['submit'])) {
    $new_name = $_POST['new_name'];

    $update_query = "UPDATE Category SET Name = '$new_name' WHERE Category_id = '$category_id'";
    if(mysqli_query($con, $update_query)) {
        echo "Категория успешно обновлена";
    } else {
        echo "Ошибка при обновлении категории: " . mysqli_error($con);
    }
}

?>

<form method="post">
    <label>Название категории:</label>
    <input type="text" name="new_name" value="<?php echo $row['Name']; ?>">
    <input type="submit" name="submit" value="Сохранить">
</form>