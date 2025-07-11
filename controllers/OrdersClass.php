<?php

class OrdersClass{
    
    use DataBaseClass;
    
    protected $user_id;
    protected $order_id;
    protected $product_id;
    protected $price;
    protected $quantity;
    protected $total;
    protected $user_type;
    protected $name;
    protected $contact;
    protected $address;
    protected $email;
    protected $other_info;
    protected $order_status;
    protected $response = [];
    
    public function new_order($order_id, $user_id, $product_id, $price, $quantity, $total, $user_type, $name, $contact, $address, $email, $other_info){
        $this->order_id = $order_id;
        $this->user_id = $user_id;
        $this->product_id = $product_id;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->total = $total;
        $this->user_type = $user_type;
        $this->name = $name;
        $this->contact = $contact;
        $this->address = $address;
        $this->email = $email;
        $this->other_info = $other_info;
        
        $connection = $this->open_connection();
        
        try{
            $sql = "INSERT INTO orders_table(order_id, user_id, product_id, price, quantity, total, user_type, name, contact, address, email, other_info) VALUES(:order_id, :user_id, :product_id, :price, :quantity, :total, :user_type, :name, :contact, :address, :email, :other_info)";
            $stmt = $connection->prepare($sql);
            $stmt->bindValue(":order_id", $order_id, PDO::PARAM_STR);
            $stmt->bindValue(":user_id", $user_id, PDO::PARAM_STR);
            $stmt->bindValue(":product_id", $product_id, PDO::PARAM_STR);
            $stmt->bindValue(":price", $price, PDO::PARAM_STR);
            $stmt->bindValue(":quantity", $quantity, PDO::PARAM_STR);
            $stmt->bindValue(":total", $total, PDO::PARAM_STR);
            $stmt->bindValue(":user_type", $user_type, PDO::PARAM_STR);
            $stmt->bindValue(":name", $name, PDO::PARAM_STR);
            $stmt->bindValue(":contact", $contact, PDO::PARAM_STR);
            $stmt->bindValue(":address", $address, PDO::PARAM_STR);
            $stmt->bindValue(":email", $email, PDO::PARAM_STR);
            $stmt->bindValue(":other_info", $other_info, PDO::PARAM_STR);
            $stmt->execute();
            
            $this->response = [
                'status' => 200,
                'msg' => 'Order has been placed and received successfully'
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
    
    public function get_order($order_id){
        $this->order_id = $order_id;
        $connection = $this->open_connection();
        $sql = "SELECT * FROM orders_table WHERE order_id = :order_id LIMIT 1";
        $stmt = $connection->prepare($sql);
        $stmt->bindValue(':order_id', $order_id, PDO::PARAM_STR);
        $stmt->execute();
        
        $row = $stmt->fetch(PDO::FETCH_OBJ);
        
        $this->response = $row;
        
        $connection = $this->close_connection();
        return json_encode($this->response);
    }
    
    public function get_user_order($order_id, $user_id){
        $this->order_id = $order_id;
        $this->user_id = $user_id;
        $connection = $this->open_connection();
        $sql = "SELECT * FROM orders_table WHERE order_id = :order_id AND user_id = :user_id LIMIT 1";
        $stmt = $connection->prepare($sql);
        $stmt->bindValue(':order_id', $order_id, PDO::PARAM_STR);
        $stmt->bindValue(':user_id', $user_id, PDO::PARAM_STR);
        $stmt->execute();
        
        $row = $stmt->fetch(PDO::FETCH_OBJ);
        
        $this->response = $row;
        
        $connection = $this->close_connection();
        return json_encode($this->response);
    }
    
    public function update_order_status($order_id, $status){
        $this->order_id = $order_id;
        $this->order_status = $status;
        
        $connection = $this->open_connection();
        
        try{
            $sql = "UPDATE orders_table SET order_status = :status WHERE order_id = :order_id";
            $stmt = $connection->prepare($sql);
            $stmt->bindValue(":order_id", $order_id, PDO::PARAM_STR);
            $stmt->bindValue(":status", $status, PDO::PARAM_STR);
            $stmt->execute();
            
            $this->response = [
                'status' => 200,
                'msg' => 'Order Status has been updated successfully'
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