<!--I made this in procedural programming, I will also add an OOP version of this-->
<?php include 'connection.php'; ?>
<?php
if(isset($_POST['submit'])){
    if(!empty($_POST['checkArr'])){
        foreach($_POST['checkArr'] as $checked){
            $query = "DELETE FROM products WHERE id = {$checked}";
            $deleteQuery = mysqli_query($connection, $query);
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
    <script src="jquery.js"></script>
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
    <div>
        <form action="" method="post" id="bulkOptions">
        <?php
        $query = "SELECT * FROM products";
        $send_query = mysqli_query($connection, $query);
        if(!$send_query){
            die("Query Failed" . mysqli_error($connection));
        }
        while($row = mysqli_fetch_assoc($send_query)) {
            $id = $row['id'];
            $sku = $row['sku'];
            $name = $row['name'];
            $price = $row['price'];
            $type = $row['type'];
            $value = $row['value'];
        ?>

        <div class="d-inline-flex p-5">
            <div class="card border-dark mb-3" style="width: 18rem;">
                <div class="card-header">
                    <input class='checkBoxes' type='checkbox' name="checkArr[]" value="<?php echo $id; ?>"> <?php echo $sku; ?></div>
                <div class="card-body text-dark">
                    <h5 class="card-title text-center"><?php echo $name;?></h5>
                    <p class="card-text text-center"><small><?php echo strtoupper($type); ?></small></p>
                    <p class="card-text text-center"><?php echo "Price: " . $price . "$";?></p>
        <?php
            if($type == 'furniture'){
                echo '<p class="card-text text-center">Dimensions: ' . $value . '</p>';
            } elseif ($type == 'book'){
                echo '<p class="card-text text-center">Weight: ' . $value . ' KG</p>';
            } elseif ($type == 'dvd'){
                echo '<p class="card-text text-center">Size: ' . $value . ' MB</p>';
            }
            echo "</div> </div> </div>";
        }
        ?>
        </form>
    </div>
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