<?php

    require '../../../config/db-parameters.php';

    trait DataBaseClass{
        // username for database connection from the db parameters file
        protected $username = USERNAME;
        // password for database connection from the db parameters file
        protected $password = PASSWORD;
        // dsn for database connection from the db parameters file
        protected $dsn = DSN;
        // connection variable for database connection from the db parameters file
        public $conn = null;
        
        public function open_connection(){
            try{
                $this->conn =  new PDO($this->dsn, $this->username, $this->password);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                // $db_status = array(
                //     'status' => 'success',
                //     'msg' => 'Connection to DB successful done'
                // );
            }catch(\Exception $th){
                // $db_status = array(
                //     'status' => 'failed',
                //     'msg' => 'Connection to DB failed to created. Error: ' . $th->getMessage()
                // );
                // $this->conn = $th->getMessage();
            }
            return $this->conn;
            // return $db_status;
        }

        public function close_connection(){
            return $this->conn ?? null;
        }
    }