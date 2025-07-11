<?php

class VendorsClass{
    // use database
    use DataBaseClass;
    protected $vendor_id;
    protected $vendor_name;
    protected $vendor_username;
    protected $vendor_dob;
    protected $vendor_address;
    protected $vendor_gps_address;
    protected $vendor_email;
    protected $vendor_contact;
    protected $vendor_business_name;
    protected $vendor_business_id;
    protected $vendor_business_file;
    protected $vendor_type;
    protected $vendor_password;
    protected $user_type = 3;
    protected $response = [];

    // method to save new vendor
    public function new_vendor_client($vendor_id, $vendor_name, $vendor_username, $vendor_dob, $vendor_address, $vendor_gps_address, $vendor_email, $vendor_contact, $vendor_business_name, $vendor_business_id, $vendor_business_file, $vendor_type){
        $this->vendor_id = $vendor_id;
        $this->vendor_name = $vendor_name;
        $this->vendor_username = $vendor_username;
        $this->vendor_dob = $vendor_dob;
        $this->vendor_address = $vendor_address;
        $this->vendor_gps_address = $vendor_gps_address;
        $this->vendor_email = $vendor_email;
        $this->vendor_contact = $vendor_contact;
        $this->vendor_business_name = $vendor_business_name;
        $this->vendor_business_id = $vendor_business_id;
        $this->vendor_business_file = $vendor_business_file;
        $this->vendor_type = $vendor_type;
        $this->vendor_password = DEFAULT_PASSWORD;

        $connection = $this->open_connection();

        $chkSql = 'SELECT * FROM vendors_table WHERE vendor_email = :email OR vendor_id = :vendor_id LIMIT 1';
        $stmtSql = $connection->prepare($chkSql);
        $stmtSql->bindValue(':email', $vendor_email, PDO::PARAM_STR);
        $stmtSql->bindValue(':vendor_id', $vendor_id, PDO::PARAM_STR);
        $stmtSql->execute();

        if($stmtSql->rowCount() > 0){
            $this->response = [
                'status' => 201,
                'msg' => 'Vendor already exists'
            ];
        }else{
            $connection->beginTransaction();
            try{
                // insert new vendor in the vendors table
                $sqlOne = "INSERT INTO vendors_table(vendor_id, vendor_name, vendor_username, vendor_dob, vendor_address, vendor_gps_address, vendor_email, vendor_contact, vendor_business_name, vendor_business_id, vendor_business_file, vendor_type) VALUES(:vendor_id, :vendor_name, :vendor_username, :vendor_dob, :vendor_address, :vendor_gps_address, :vendor_email, :vendor_contact, :vendor_business_name, :vendor_business_id, :vendor_business_file, :vendor_type)";
                $stmtOne = $connection->prepare($sqlOne);
                $stmtOne->bindValue(':vendor_id',$vendor_id ,PDO::PARAM_STR);
                $stmtOne->bindValue(':vendor_name',$vendor_name ,PDO::PARAM_STR);
                $stmtOne->bindValue(':vendor_username',$vendor_username ,PDO::PARAM_STR);
                $stmtOne->bindValue(':vendor_dob',$vendor_dob ,PDO::PARAM_STR);
                $stmtOne->bindValue(':vendor_address',$vendor_address ,PDO::PARAM_STR);
                $stmtOne->bindValue(':vendor_gps_address',$vendor_gps_address ,PDO::PARAM_STR);
                $stmtOne->bindValue(':vendor_email',$vendor_email ,PDO::PARAM_STR);
                $stmtOne->bindValue(':vendor_contact',$vendor_contact ,PDO::PARAM_STR);
                $stmtOne->bindValue(':vendor_business_name',$vendor_business_name ,PDO::PARAM_STR);
                $stmtOne->bindValue(':vendor_business_id',$vendor_business_id ,PDO::PARAM_STR);
                $stmtOne->bindValue(':vendor_business_file',$vendor_business_file ,PDO::PARAM_STR);
                $stmtOne->bindValue(':vendor_type',$vendor_type ,PDO::PARAM_STR_CHAR);
                $stmtOne->execute();

                // insert new vendor in the users table
                $sqlLogin = "INSERT INTO users_table (user_id, name, username, user_email, user_password, user_type) VALUES(:user_id, :name, :username, :user_email, :user_password, :user_type)";
                $stmtLogin = $connection->prepare($sqlLogin);
                $stmtLogin->bindValue(':user_id', $vendor_id, PDO::PARAM_STR);
                $stmtLogin->bindValue(':name', $vendor_name, PDO::PARAM_STR);
                $stmtLogin->bindValue(':username', $vendor_username, PDO::PARAM_STR);
                $stmtLogin->bindValue(':user_email', $vendor_email, PDO::PARAM_STR);
                $stmtLogin->bindValue(':user_password', password_hash($this->vendor_password, PASSWORD_DEFAULT), PDO::PARAM_STR);
                $stmtLogin->bindValue(':user_type', $this->user_type, PDO::PARAM_INT);
                $stmtLogin->execute();

                $connection->commit();

                $this->response = [
                    'status' => 200,
                    'msg' => 'New Vendor created successfully'
                ];

            }catch(\Exception $th){
                $connection->rollBack();
                $this->response = [
                    'status' => 201,
                    'msg' => 'Something went wrong. Details : ' . $th->getMessage()
                ];
            }
        }
        $connection = $this->close_connection();
        return json_encode($this->response);
    }
    //method to get vendor data 
    public function get_vendor_client($vendor_id){
        $this->vendor_id = $vendor_id;
        $connection = $this->open_connection();
        $chkSql = 'SELECT * FROM `vendors_table` WHERE `vendor_id` = :user_id LIMIT 1';
        $stmtSql = $connection->prepare($chkSql);
        $stmtSql->bindValue(':user_id', $vendor_id, PDO::PARAM_STR);
        $stmtSql->execute();

        if($stmtSql->rowCount() == 0){
            $this->response = [
                'status' => 201,
                'msg' => 'No record found'
            ];
        }else{
            $row = $stmtSql->fetch(PDO::FETCH_OBJ);
            $this->response = [
                'status' => 200,
                'msg' => 'Record found',
                'data' => $row
            ];
        }
        return json_encode($this->response);
    }
    //update vendor data 
    public function update_vendor_client($vendor_id, $vendor_name, $vendor_username, $vendor_dob, $vendor_address, $vendor_gps_address, $vendor_email, $vendor_contact, $vendor_business_name, $vendor_business_id){
        $this->vendor_id = $vendor_id;
        $this->vendor_name = $vendor_name;
        $this->vendor_username = $vendor_username;
        $this->vendor_dob = $vendor_dob;
        $this->vendor_address = $vendor_address;
        $this->vendor_gps_address = $vendor_gps_address;
        $this->vendor_email = $vendor_email;
        $this->vendor_contact = $vendor_contact;
        $this->vendor_business_name = $vendor_business_name;
        $this->vendor_business_id = $vendor_business_id;

        $connection = $this->open_connection();

        $connection->beginTransaction();
        try{
            // update new vendor in the vendors table
            $sqlOne = "UPDATE vendors_table SET vendor_name = :vendor_name, vendor_username = :vendor_username, vendor_dob = :vendor_dob, vendor_address = :vendor_address, vendor_gps_address = :vendor_gps_address, vendor_email = :vendor_email, vendor_contact = :vendor_contact, vendor_business_name = :vendor_business_name, vendor_business_id = :vendor_business_id WHERE vendor_id = :vendor_id";
            $stmtOne = $connection->prepare($sqlOne);
            $stmtOne->bindValue(':vendor_id',$vendor_id ,PDO::PARAM_STR);
            $stmtOne->bindValue(':vendor_name',$vendor_name ,PDO::PARAM_STR);
            $stmtOne->bindValue(':vendor_username',$vendor_username ,PDO::PARAM_STR);
            $stmtOne->bindValue(':vendor_dob',$vendor_dob ,PDO::PARAM_STR);
            $stmtOne->bindValue(':vendor_address',$vendor_address ,PDO::PARAM_STR);
            $stmtOne->bindValue(':vendor_gps_address',$vendor_gps_address ,PDO::PARAM_STR);
            $stmtOne->bindValue(':vendor_email',$vendor_email ,PDO::PARAM_STR);
            $stmtOne->bindValue(':vendor_contact',$vendor_contact ,PDO::PARAM_STR);
            $stmtOne->bindValue(':vendor_business_name',$vendor_business_name ,PDO::PARAM_STR);
            $stmtOne->bindValue(':vendor_business_id',$vendor_business_id ,PDO::PARAM_STR);
            $stmtOne->execute();

            // update new vendor in the users table
            $sqlUpdate = "UPDATE users_table SET name = :name, username = :username, user_email = :user_email WHERE user_id = :user_id";
            $stmtUpdate = $connection->prepare($sqlUpdate);
            $stmtUpdate->bindValue(':user_id', $vendor_id, PDO::PARAM_STR);
            $stmtUpdate->bindValue(':name', $vendor_name, PDO::PARAM_STR);
            $stmtUpdate->bindValue(':username', $vendor_username, PDO::PARAM_STR);
            $stmtUpdate->bindValue(':user_email', $vendor_email, PDO::PARAM_STR);
            $stmtUpdate->execute();

            $connection->commit();

            $this->response = [
                'status' => 200,
                'msg' => 'Vendor Record updated successfully'
            ];

        }catch(\Exception $th){
            $connection->rollBack();
            $this->response = [
                'status' => 201,
                'msg' => 'Something went wrong. Details : ' . $th->getMessage()
            ];
        }
        $connection = $this->close_connection();
        return json_encode($this->response);
    }
    // delete vendor data
    public function delete_vendor_client($user_id){
        
        $connection = $this->open_connection();

        $connection->beginTransaction();
        try {
            // insert new vendor in the vendors table
            $sqlIns = "DELETE FROM vendors_table  WHERE vendor_id = :user_id";
            $stmtIns = $connection->prepare($sqlIns);
            $stmtIns->bindValue(':user_id', $user_id, PDO::PARAM_STR);
            $stmtIns->execute();

            // insert new vendors in users table for login purpose
            $sqlLogin = "DELETE FROM users_table WHERE user_id = :user_id";
            $stmtLogin = $connection->prepare($sqlLogin);
            $stmtLogin->bindValue(':user_id', $user_id, PDO::PARAM_STR);
            $stmtLogin->execute();

            $connection->commit();

            $this->response = [
                'status' => 200,
                'msg' => 'Vendor Record deleted successfully'
            ];
        } catch (\Exception $th) {
            $connection->rollBack();
            $this->response = [
                'status' => 201,
                'msg' => 'Something went wrong. Details : ' . $th->getMessage()
            ];
        }

        $connection = $this->close_connection();
        return json_encode($this->response);
    }

    public function vendors_in_select_input(){
        $connection = $this->open_connection();
        $chkSql = 'SELECT * FROM `vendors_table` ORDER BY created_at DESC';
        $stmtSql = $connection->prepare($chkSql);
        $stmtSql->execute();

        if($stmtSql->rowCount() == 0){
            $this->response = [];
        }else{
            while($row = $stmtSql->fetch(PDO::FETCH_OBJ)){
                $this->response[] =  $row;
            }
            
        }
        return json_encode($this->response);
    }
}
