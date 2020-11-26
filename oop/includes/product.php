<?php
class Product extends Dbh{

    protected function getAllProducts() {
        $sql = "SELECT * FROM products WHERE is_deleted != 1";
        $result = $this->connect()->query($sql);
        $numRows = $result->num_rows;
        if($numRows>0){
            while($row = $result->fetch_assoc()){
                $data[]=$row;
            }
            return $data;
        } else {
            echo "<h3 class='text-center'>There is no data to display!</h3>";
            return array();
        }
    }
    protected function deleteProductDB($id){
        $sql = "UPDATE products SET is_deleted = 1 WHERE id = {$id}";
        $result = $this->connect()->query($sql);
        return $result;
    }

    public function addProducts($sku, $name, $price, $type, $value){
        $sku = $this->connect()->real_escape_string($sku);
        $name = $this->connect()->real_escape_string($name);
        $price = $this->connect()->real_escape_string($price);
        $type = $this->connect()->real_escape_string($type);
        $value = $this->connect()->real_escape_string($value);
        $sql = "INSERT INTO products (sku, name, price, type, value) VALUES ('$sku', '$name', '$price', '$type', '$value')";
        $result = $this->connect()->query($sql);
        return $result;
    }
}

