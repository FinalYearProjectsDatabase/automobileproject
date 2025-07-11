<?php
    require 'config/db-parameters.php';
    require 'controllers/DataBaseClass.php';
    // require_once('config/index-settings.php');
    // require(__DIR__.'/components/index-head.php');

    class Test{
        use DataBaseClass;
        
        public function test(){
            $db_status = $this->open_connection();
            print_r($db_status);
        }
    }

    $test = new Test();
    $test->test();

    

?>