<?php

class UsersClass{
    
    use DataBaseClass;
    
    protected $user_id;
    protected $name;
    protected $dob;
    protected $address;
    protected $user_name;
    protected $email;
    protected $contact;
    protected $response = [];
    
    public function get_user($user_id){
        $this->user_id = $user_id;
        
        $connection = $this->open_connection();
        
        $sql = "SELECT * FROM users_table WHERE user_id = :user_id LIMIT 1";
        $stmt = $connection->prepare($sql);
        $stmt->bindValue(":user_id", $user_id, PDO::PARAM_STR);
        $stmt->execute();
        
        $row = $stmt->fetch(PDO::FETCH_OBJ);
        
        $this->response = $row;
        
        return json_encode($this->response);
    }
    
}