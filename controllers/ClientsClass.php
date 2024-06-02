<?php 

class ClientsClass{
    // database class
    use DataBaseClass;

    protected $user_id;
    protected $name;
    protected $dob;
    protected $address;
    protected $user_name;
    protected $email;
    protected $contact;
    protected $client_password;
    protected $user_type = 2;
    public $response = [];

    // new client user
    public function new_user_client($user_id, $name, $user_name, $dob, $address, $email, $contact){
        $this->user_id = $user_id;
        $this->name = $name;
        $this->user_name = $user_name;
        $this->dob = $dob;
        $this->address = $address;
        $this->email = $email;
        $this->contact = $contact;
        $this->client_password = DEFAULT_PASSWORD;
        
        $connection = $this->open_connection();

        $chkSql = 'SELECT * FROM `clients_table` WHERE `client_email` = :email OR `client_user_id` = :user_id LIMIT 1';
        $stmtSql = $connection->prepare($chkSql);
        $stmtSql->bindValue(':email', $email, PDO::PARAM_STR);
        $stmtSql->bindValue(':user_id', $user_id, PDO::PARAM_STR);
        $stmtSql->execute();

        if($stmtSql->rowCount() > 0){
            $this->response = [
                'status' => 201,
                'msg' => 'Client already exists'
            ];
        }else{
            $connection->beginTransaction();
            try {
                // insert new client in the clients table
                $sqlIns = "INSERT INTO clients_table (client_user_id, client_name, client_username, client_dob, client_address, client_email, client_contact) VALUES(:user_id, :name, :username, :dob, :address, :email, :contact)";
                $stmtIns = $connection->prepare($sqlIns);
                $stmtIns->bindValue(':user_id', $user_id, PDO::PARAM_STR);
                $stmtIns->bindValue(':name', strtoupper($name), PDO::PARAM_STR);
                $stmtIns->bindValue(':username', $user_name, PDO::PARAM_STR);
                $stmtIns->bindValue(':dob', $dob, PDO::PARAM_STR);
                $stmtIns->bindValue(':address', $address, PDO::PARAM_STR);
                $stmtIns->bindValue(':contact', $contact, PDO::PARAM_STR);
                $stmtIns->bindValue(':email', $email, PDO::PARAM_STR);
                $stmtIns->execute();

                // insert new clients in users table for login purpose
                $sqlLogin = "INSERT INTO users_table (user_id, name, username, user_email, user_password, user_type) VALUES(:user_id, :name, :username, :user_email, :user_password, :user_type)";
                $stmtLogin = $connection->prepare($sqlLogin);
                $stmtLogin->bindValue(':user_id', $user_id, PDO::PARAM_STR);
                $stmtLogin->bindValue(':name', $name, PDO::PARAM_STR);
                $stmtLogin->bindValue(':username', $user_name, PDO::PARAM_STR);
                $stmtLogin->bindValue(':user_email', $email, PDO::PARAM_STR);
                $stmtLogin->bindValue(':user_password', password_hash($this->client_password, PASSWORD_DEFAULT), PDO::PARAM_STR);
                $stmtLogin->bindValue(':user_type', $this->user_type, PDO::PARAM_INT);
                $stmtLogin->execute();

                $connection->commit();

                $this->response = [
                    'status' => 200,
                    'msg' => 'New Client created successfully'
                ];
            } catch (\Exception $th) {
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
    // get client user data
    public function get_user_client($user_id){
        $this->user_id = $user_id;
        
        $connection = $this->open_connection();

        $chkSql = 'SELECT * FROM `clients_table` WHERE `client_user_id` = :user_id LIMIT 1';
        $stmtSql = $connection->prepare($chkSql);
        $stmtSql->bindValue(':user_id', $user_id, PDO::PARAM_STR);
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
    // update client user data
    public function update_user_client($user_id, $name, $user_name, $dob, $address, $email, $contact){
        $this->user_id = $user_id;
        $this->name = $name;
        $this->user_name = $user_name;
        $this->dob = $dob;
        $this->address = $address;
        $this->email = $email;
        $this->contact = $contact;
        
        $connection = $this->open_connection();

        $connection->beginTransaction();
        try {
            // update new client in the clients table
            $sqlUpdate = "UPDATE clients_table SET client_name = :name, client_username = :username, client_dob = :dob, client_address = :address, client_email = :email, client_contact = :contact WHERE client_user_id = :user_id";
            $stmtUpdate = $connection->prepare($sqlUpdate);
            $stmtUpdate->bindValue(':user_id', $user_id, PDO::PARAM_STR);
            $stmtUpdate->bindValue(':name', strtoupper($name), PDO::PARAM_STR);
            $stmtUpdate->bindValue(':username', $user_name, PDO::PARAM_STR);
            $stmtUpdate->bindValue(':dob', $dob, PDO::PARAM_STR);
            $stmtUpdate->bindValue(':address', $address, PDO::PARAM_STR);
            $stmtUpdate->bindValue(':contact', $contact, PDO::PARAM_STR);
            $stmtUpdate->bindValue(':email', $email, PDO::PARAM_STR);
            $stmtUpdate->execute();

            // update new clients in users table for login purpose
            $sqlUpdate = "UPDATE users_table SET name = :name, username = :username, user_email = :user_email  WHERE user_id = :user_id";
            $stmtUpdate = $connection->prepare($sqlUpdate);
            $stmtUpdate->bindValue(':user_id', $user_id, PDO::PARAM_STR);
            $stmtUpdate->bindValue(':name', $name, PDO::PARAM_STR);
            $stmtUpdate->bindValue(':username', $user_name, PDO::PARAM_STR);
            $stmtUpdate->bindValue(':user_email', $email, PDO::PARAM_STR);
            $stmtUpdate->execute();

            $connection->commit();

            $this->response = [
                'status' => 200,
                'msg' => 'Client Record updated successfully'
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
    // delete client user data
    public function delete_user_client($user_id){
        
        $connection = $this->open_connection();

        $connection->beginTransaction();
        try {
            // insert new client in the clients table
            $sqlIns = "DELETE FROM clients_table  WHERE client_user_id = :user_id";
            $stmtIns = $connection->prepare($sqlIns);
            $stmtIns->bindValue(':user_id', $user_id, PDO::PARAM_STR);
            $stmtIns->execute();

            // insert new clients in users table for login purpose
            $sqlLogin = "DELETE FROM users_table WHERE user_id = :user_id";
            $stmtLogin = $connection->prepare($sqlLogin);
            $stmtLogin->bindValue(':user_id', $user_id, PDO::PARAM_STR);
            $stmtLogin->execute();

            $connection->commit();

            $this->response = [
                'status' => 200,
                'msg' => 'Client Record deleted successfully'
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
}