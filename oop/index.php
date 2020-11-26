<?php
include 'includes/dbh.php';
include 'includes/product.php';
include 'includes/viewProducts.php';
if(isset($_POST['submit'])){
    if(!empty($_POST['checkArr'])){
        foreach($_POST['checkArr'] as $checked){
            //$query = "DELETE FROM products WHERE id = {$checked}";
            //$deleteQuery = mysqli_query($conn, $query);
            $products = new ViewProduct();
            $products->deleteProduct($checked);

        }
    } else {
        echo '<div class="error">No Checkbox is selected!</div>';
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="./includes/app.js"></script>
    <title>Scandiweb Test Assignment</title>
</head>
<body>
<nav class="navbar">
    <h1 class="text-left">Product List</h1>
    <div class="text-right">
        <a href="addProducts.php" class="btn btn-outline-success">Add Products</a>
        <input type="submit" name="submit" form="bulkOptions" id="submit" class="btn btn-outline-danger" value="Mass Delete">
    </div>
</nav>
<hr>
<form action="" method="post" id="bulkOptions" name="bulkOptions">
<?php
$products = new ViewProduct();
$products->showAllProducts();
?>
</form>
<footer class="page-footer fixed-bottom">
    <hr>
    <div class="text-center">
        <small>Scandiweb Test Assignment</small>
        <br>
        <br>
    </div>
</footer>
</body>
</html>