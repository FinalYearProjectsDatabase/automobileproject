<?php

    class AuthenticationClass{
        // database
        use DataBaseClass;
        protected $email;
        protected $user_password;
        protected $user_type;
        protected $connection;
        protected $redirect;
        public $response = [];

        // method to redirect the logged in user to the specific page based on user type
        public function user_page_redirect($user_type){
            $this->user_type = $user_type;
            // if($user_type == 1){
                $this->redirect = "../../dashboard/";
            // }
            return $this->redirect;
        }

        // function to log any user
        public function user_login($email, $password){
            $this->email = $email;
            $this->user_password = $password;

            $connection = $this->open_connection();

            try{
                $sql = "SELECT * FROM users_table WHERE user_email = :email LIMIT 1";
                $stmt = $connection->prepare($sql);
                $stmt->bindValue(":email", $email, PDO::PARAM_STR);
                $stmt->execute();
                if($stmt->rowCount() > 0){ 
                    $row = $stmt->fetch(PDO::FETCH_OBJ);
                    $hashedPassword = $row->user_password;
                    if(password_verify($password, $hashedPassword)){
                        if($row->can_login == 1){
                            $this->response = [
                                'status' => 200,
                                'msg' => 'Login Successfully',
                                'url' => $this->user_page_redirect($row->user_type),
                            ];
                        }else{
                            $this->response = [
                                'status' => 201,
                                'msg' => 'Your account has been deactivated. Contact Administrator'
                            ];
                        }
                    }else{
                        $this->response = [
                            'status' => 201,
                            'msg' => 'Invalid Username and/or Password'
                        ];
                    }
                }else{
                    $this->response = [
                        'status' => 201,
                        'msg' => 'No account exists under the given Email Address'
                    ];
                }
            }catch(\Exception $e){
                $this->response = [
                    'status' => 201,
                    'msg' => 'Something went wrong. Details : ' . $e->getMessage()
                ];
            }
            $connection = $this->close_connection();
            return json_encode($this->response);
        }

        // method to set logged in user in session
        public function user_in_session($email){
            $this->email = $email;
            $connection = $this->open_connection();

            try{
                $sql = "SELECT * FROM `users_table` WHERE `user_email` = :email";
                $stmt = $connection->prepare($sql);
                $stmt->bindValue(":email", $email, PDO::PARAM_STR);
                $stmt->execute();

                $row = $stmt->fetch(PDO::FETCH_OBJ);
                $this->response = [
                    'status' => 200,
                    'msg' => 'Valid Session',
                    'data' => [
                        'user_id' => $row->user_id,
                        'username' => $row->username,
                        'name' => $row->name,
                        'email' => $row->user_email,
                        'user_type' => $row->user_type,
                        'user_type_name' => $this->user_type_name($row->user_type)
                    ]
                ];
            }catch(\Exception $e){
                $this->response = [
                    'status' => 201,
                    'msg' => 'Something went wrong. Details : ' . $e->getMessage()
                ];
            }
            $connection = $this->close_connection();
            return json_encode($this->response);
        }

        // method to get user type name based on data which is the user type
        public function user_type_name($data){
            if($data == 1){
                $name = 'Super Administrator' ?? '';
            }elseif($data == 2){
                $name = 'Client' ?? '';
            }else{
                $name = 'Vendor' ?? '';
            }
            return $name;
        }
    }