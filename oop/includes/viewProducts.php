<?php
class ViewProduct extends Product{

    public function showAllProducts() {
        $datas = $this->getAllProducts();
        foreach ($datas as $data){
            $id = $data['id'];
            $sku = $data['sku'];
            $name = $data['name'];
            $price = $data['price'];
            $type = $data['type'];
            $value = $data['value'];
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
    }

    public function deleteProduct($id)
    {
        $this->deleteProductDB($id);
    }
}