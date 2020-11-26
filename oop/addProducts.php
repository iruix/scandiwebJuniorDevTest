<?php
include "includes/dbh.php";
include "includes/product.php";
$product = new Product();
$message = "Please choose a type";
if (isset($_POST['addProduct']))
{
    $sku = $_POST['sku'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $type = $_POST['type'];
    $value = NULL;
    if($type == 'furniture'){
        $valueh = $_POST['valueh'];
        $valuew = $_POST['valuew'];
        $valuel = $_POST['valuel'];
        $value = $valueh . "x" . $valuew . "x" . $valuel;
    } elseif ($type == 'dvd'){
        $value = $_POST['dvdvalue'];
    } elseif ($type == 'book'){
        $value = $_POST['bookvalue'];
    }
    if($value != NULL) {
        $product->addProducts($sku, $name, $price, $type, $value);
        header("Location:index.php");
    } else {
        $message = "The type can not be empty!";
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
    <script src="includes/app.js"></script>
    <title>Scandiweb Test Assignment</title>
</head>
<body>
<style>
    .hide{
        display:none;
    }
</style>
<nav class="navbar">
    <h1 class="text-left">Product List</h1>
    <div class="text-right">
        <input type="submit" form="addproduct" name="addProduct" class="btn btn-outline-success">
        <a href="index.php" onclick="return confirm('Are you sure?')" class="btn btn-outline-danger">Cancel</a>
    </div>
</nav>
<hr>
<form action="" id="addproduct" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="sku">SKU</label>
        <input type="text" name="sku" required class="form-control" placeholder="Enter the SKU">
    </div>
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" required class="form-control" placeholder="Enter the Name">
    </div>
    <div class="form-group">
        <label for="price">Price($)</label>
        <input type="text" name="price" required class="form-control" placeholder="Enter the Price">
    </div>
    <div class="form-group" width="50%">
        <label for="type">Choose a type:</label>
        <select name="type" class="div-toggle" data-target=".my-info-1">
            <option value="choose" data-show=".choose">Choose</option>
            <option value="dvd" data-show=".dvd">DVD-Disc</option>
            <option value="book" data-show=".book">Book</option>
            <option value="furniture" data-show=".furniture">Furniture</option>
        </select>
    </div>
    <div class="my-info-1">
        <div class="choose hide"><?php echo $message; ?></div>
        <div class="dvd hide">
            <label for="dvdvalue">DVD Size(MB)</label>
            <input type="text" name="dvdvalue" class="form-control" placeholder="Enter the DVD Size">
        </div>
        <div class="book hide">
            <label for="bookvalue">Book Weight(KG)</label>
            <input type="text" name="bookvalue" class="form-control" placeholder="Enter the Book Weight">
        </div>
        <div class="furniture hide">
            <label>Furniture Dimensions(HxWxL) (CM)</label>
            <input type="text" name="valueh" class="form-control" placeholder="Enter Furniture Height"><br>
            <input type="text" name="valuew" class="form-control" placeholder="Enter Furniture Width"><br>
            <input type="text" name="valuel" class="form-control" placeholder="Enter Furniture Length">
        </div>
    </div>
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