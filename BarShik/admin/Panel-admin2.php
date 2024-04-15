<?php
include '..//connect.php';
$query = "SELECT * FROM Product INNER JOIN Category on Product.Category_id = Category.Category_id  where Id_product";
$result = mysqli_query($con, $query);
$result1 = mysqli_fetch_all($result);
$query_cat = mysqli_query($con, "SELECT * FROM Category");
$cat_result = mysqli_fetch_all($query_cat);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel = "stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
</head>
</head>
<body>
<header>
    <nav class="nav">
        <div class="index">
            <h1 class="index_">Админ</h1>
            <form id="search" action="/">
                <input type="search" name="search" id="searchText" placeholder="Поиск">
            </form>
        </div>
        <div class = "cart_account">
            <a href="Panel-admin2.php">Управление товарами</a>
            <a href="Panel-admin3.php">Управление категориями напитков</a>
            <a href="Panel-admin4.php">Управление заказами</a>
            <a href="Panel-admin5.php">Статистика и отчеты</a>
            <img src="../images/2703085_bag_cart_ecommerce_shop_icon.png" height="30px" width="30px" alt="">
            <img src="../images/9104273_person_user_people_profile_account_icon.png"height="30px" width="30px" alt="">
        </div>
    </nav>
</header>
    <div class="search">
        <div class="header-div2">
           
        </div>
        <section class="sort_1">
            <div class="sort">
                <ul class="list-group list-group-horizontal mt-5 mb-3">
                    <h4>Сортировка по дате публикации:</h4>
                    <li class="list-group-item">
                        <a href=""><img width="30" src="..//images/asc-sort.png" alt=""></a>
                    </li>
                    <li class="list-group-item">
                        <a href=""><img width="30" src="..//images/desc-sort.png" alt=""></a>
                    </li>
                </ul>
            </div>
        </section>
    </div>
    <div class="products">
        <table>
            <tr>
                <th>Название</th>
                <th>Категория</th>
                <th>Цена</th>
                <th>Описание</th>
                <th>Миниатюра</th>
            </tr>
            <?php foreach ($result1 as $item):?>
            <tr>
            <form action="edit_product.php?id=<?=$item[0]?>" method="POST" enctype="multipart/form-data">
                <td><input type="text" name='Name' value = "<?=$item[1]?>"></td>
                <td>   
                    <select  class="form_card" name="cat" id="">
                <option value="<?=$item[3]?>" selected><?=$item[7]?></option>  
            <?php foreach ($cat_result as $value_2) {?>  
                        <option value="<?=$value_2[0]?>"><?=$value_2[1]?></option>  
                    <?php }?>  
                </select> </td>
                <td><input type="number" name='Price' value = "<?=$item[4]?>"></td>
                <td><input type="text" name='Desc' value = "<?=$item[2]?>"></td>
                <td> <img src="../images/<?=$item[5]?>" alt="" height = "100px" width = "100px"></td>
                <td><input type="file" name='file'></td>
                <td><input type="submit" class="btn btn-outline-success" value="Редактировать"></td>
                </form>
                <td><a href="delete_product.php?id=<?=$item[0]?>"><button type="button" class="btn btn-outline-danger" >Удалить</button></a></td>
            </tr>
            <?php endforeach;?>
        </table>
    </div>
    <div class="p">
        <p>Добавление товара</p>
        <form action="product-add.php" class="adding" method="POST">
            <input required type="text" name="Name" id="" placeholder="Название">
              
                <select required id="Categ" name="Categ">
                    <?php
                    $query = "SELECT * FROM Category";
                    $result = mysqli_query($con, $query);
                    
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='".$row['Category_id']."'>".$row['Name']."</option>";
                    }
                    ?>
                    </select>
            <input required type="text" name="Price" id="" placeholder="Цена">
            <input required type="text" name="Desc" id="" placeholder="Описание">
            <input required type="file" name="Image" id="" placeholder="Изображение">
            <input type="submit" class="btn btn-success" value="Добавить товар">
        </form>
    </div>
</body>
</html>