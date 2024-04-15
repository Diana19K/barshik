<?php  
  
    include "../connect.php";  
  
$id = isset($_GET['id'])?$_GET['id']:false; 

$query_delete = "DELETE FROM Product WHERE Id_product = $id";  

$result = mysqli_query($con, $query_delete);  

if($result){  
    echo "<script>alert('Данные удалены!'); location:href = '/admin';</script>";  
    header("Location: Panel-admin2.php");  
}  
else{  
    echo "<script> alert('Ошибка удаления!".mysqli_error($con)."'); location:href = '/admin';</script>";  
}      
?>