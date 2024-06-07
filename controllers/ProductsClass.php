<?php

class ProductsClass{

    use DataBaseClass;
    protected $product_id;
    protected $product_name;
    protected $product_description;
    protected $product_image;
    protected $product_vendor;
    protected $product_type;
    protected $product_price = 0;
    protected $product_status;
    protected $response = [];

    public function products(){
        $sql = "SELECT * FROM products_table WHERE product_status = :status ORDER BY created_at DESC";
        $connection = $this->open_connection();
        $stmt = $connection->prepare($sql);
        $stmt->bindValue(":status", 1, PDO::PARAM_INT);
        $stmt->execute();

        if($stmt->rowCount() > 0){
            while($row = $stmt->fetch(PDO::FETCH_OBJ)){
                $this->response[] = $row;
            }
        }else{
            $this->response = [];
        }
        return json_encode($this->response);
    }

    public function vendor_products($vendor_id){
        $sql = "SELECT * FROM products_table WHERE product_vendor = :vendor_id ORDER BY created_at DESC";
        $connection = $this->open_connection();
        $stmt = $connection->prepare($sql);
        $stmt->bindValue(":vendor_id", $vendor_id, PDO::PARAM_STR);
        $stmt->execute();

        if($stmt->rowCount() > 0){
            while($row = $stmt->fetch(PDO::FETCH_OBJ)){
                $this->response = $row;
            }
        }else{
            $this->response = [];
        }
        return json_encode($this->response);
    }

    

    public function new_product($product_id, $product_name, $product_description, $product_image, $product_vendor, $product_type, $product_price = null){
        $this->product_id = $product_id;
        $this->product_name = $product_name;
        $this->product_description = $product_description;
        $this->product_image = $product_image;
        $this->product_vendor = $product_vendor;
        $this->product_type = $product_type;
        $this->product_price = $product_price;

        $connection = $this->open_connection();

        $sqlChk = "SELECT * FROM products_table WHERE product_id = :product_id LIMIT 1";
        $stmtChk = $connection->prepare($sqlChk);
        $stmtChk->bindValue(":product_id", $product_id, PDO::PARAM_STR);
        $stmtChk->execute();

        if($stmtChk->rowCount() > 0){
            $this->response = [
                'status' => 201,
                'msg' => 'Product already exists'
            ];
        }else{
            try{
                $sqlIns = "INSERT INTO products_table(product_id, product_name, product_description, product_image, product_vendor, product_type, product_price) VALUES(:product_id, :product_name, :product_description, :product_image, :product_vendor, :product_type, :product_price)";
                $stmtIns = $connection->prepare($sqlIns);
                $stmtIns->bindValue(":product_id", $product_id, PDO::PARAM_STR);
                $stmtIns->bindValue(":product_name", $product_name, PDO::PARAM_STR);
                $stmtIns->bindValue(":product_description", $product_description, PDO::PARAM_STR);
                $stmtIns->bindValue(":product_image", $product_image, PDO::PARAM_STR);
                $stmtIns->bindValue(":product_vendor", $product_vendor, PDO::PARAM_STR);
                $stmtIns->bindValue(":product_type", $product_type, PDO::PARAM_STR);
                $stmtIns->bindValue(":product_price", $product_price, PDO::PARAM_STR);
                $stmtIns->execute();

                $this->response = [
                    'status' => 200,
                    'msg' => 'Product created and published successfully'
                ];
            }catch(\Exception $th){
                $this->response = [
                    'status' => 201,
                    'msg' => 'Something went wrong. Details : ' . $th->getMessage()
                ];
            }
        }
        $connection = $this->close_connection();
        return json_encode($this->response);
    }

    public function get_product($product_id){
        $this->product_id = $product_id;
        $connection = $this->open_connection();
        
        $sql = "SELECT * FROM products_table WHERE product_id = :product_id LIMIT 1";
        $stmt = $connection->prepare($sql);
        $stmt->bindValue(":product_id", $product_id, PDO::PARAM_STR);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_OBJ);

        $this->response = $row;

        $connection = $this->close_connection();
        return json_encode($this->response);
    }

    public function update_product($product_id, $product_name, $product_description, $product_image, $product_vendor, $product_type,$product_status, $product_price = null){
        $this->product_id = $product_id;
        $this->product_name = $product_name;
        $this->product_description = $product_description;
        $this->product_image = $product_image;
        $this->product_vendor = $product_vendor;
        $this->product_type = $product_type;
        $this->product_price = $product_price;
        $this->product_status = $product_status;

        $connection = $this->open_connection();

        try{
            $sqlUpdate = "UPDATE products_table SET product_name = :product_name, product_description = :product_description, product_image = :product_image, product_vendor = :product_vendor, product_type = :product_type, product_price = :product_price, product_status = :product_status WHERE product_id = :product_id";
            $stmtUpdate = $connection->prepare($sqlUpdate);
            $stmtUpdate->bindValue(":product_id", $product_id, PDO::PARAM_STR);
            $stmtUpdate->bindValue(":product_name", $product_name, PDO::PARAM_STR);
            $stmtUpdate->bindValue(":product_description", $product_description, PDO::PARAM_STR);
            $stmtUpdate->bindValue(":product_image", $product_image, PDO::PARAM_STR);
            $stmtUpdate->bindValue(":product_vendor", $product_vendor, PDO::PARAM_STR);
            $stmtUpdate->bindValue(":product_type", $product_type, PDO::PARAM_STR);
            $stmtUpdate->bindValue(":product_price", $product_price, PDO::PARAM_STR);
            $stmtUpdate->bindValue(":product_status", $product_status, PDO::PARAM_STR);
            $stmtUpdate->execute();

            $this->response = [
                'status' => 200,
                'msg' => 'Product updated and published successfully'
            ];
        }catch(\Exception $th){
            $this->response = [
                'status' => 201,
                'msg' => 'Something went wrong. Details : ' . $th->getMessage()
            ];
        }
        $connection = $this->close_connection();
        return json_encode($this->response);
    }

    public function delete_product($product_id){
        $this->product_id = $product_id;
        $connection = $this->open_connection();
        
        try{
            $sql = "DELETE FROM products_table WHERE product_id = :product_id";
            $stmt = $connection->prepare($sql);
            $stmt->bindValue(":product_id", $product_id, PDO::PARAM_STR);
            $stmt->execute();

            $this->response = [
                'status' => 200,
                'msg' => 'Product deleted successfully'
            ];
        }catch(\Exception $th){
            $this->response = [
                'status' => 201,
                'msg' => 'Something went wrong. Details : ' . $th->getMessage()
            ];
        }

        $connection = $this->close_connection();
        return json_encode($this->response);
    }
}