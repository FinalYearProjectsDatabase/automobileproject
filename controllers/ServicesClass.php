<?php

class ServicesClass{

    use DataBaseClass;
    protected $service_id;
    protected $service_description;
    protected $service_image;
    protected $service_vendor;
    protected $service_type;
    protected $service_location;
    protected $service_status;
    protected $response = [];

    public function services(){
        $sql = "SELECT * FROM vendors_services WHERE service_status = :status ORDER BY created_at DESC";
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

    public function get_service_detail_from_vendors_services($service_id){
        $this->service_id = $service_id;
        $sql = "SELECT * FROM vendors_services WHERE service_id = :service_id LIMIT 1";
        $connection = $this->open_connection();
        $stmt = $connection->prepare($sql);
        $stmt->bindValue(":service_id", $service_id, PDO::PARAM_STR);
        $stmt->execute();

        $this->response = $stmt->fetch(PDO::FETCH_OBJ);

        return json_encode($this->response);
    }

    public function vendor_services($vendor_id){
        $sql = "SELECT * FROM services_table WHERE service_vendor = :vendor_id ORDER BY created_at DESC";
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

    

    public function new_service($service_id, $service_description, $service_image, $service_vendor, $service_type, $service_location){
        $this->service_id = $service_id;
        $this->service_description = $service_description;
        $this->service_image = $service_image;
        $this->service_vendor = $service_vendor;
        $this->service_type = $service_type;
        $this->service_location = $service_location;

        $connection = $this->open_connection();

        $sqlChk = "SELECT * FROM services_table WHERE service_id = :service_id LIMIT 1";
        $stmtChk = $connection->prepare($sqlChk);
        $stmtChk->bindValue(":service_id", $service_id, PDO::PARAM_STR);
        $stmtChk->execute();

        if($stmtChk->rowCount() > 0){
            $this->response = [
                'status' => 201,
                'msg' => 'Service already exists'
            ];
        }else{
            try{
                $sqlIns = "INSERT INTO services_table(service_id, service_description, service_image, service_vendor, service_type, service_location) VALUES(:service_id, :service_description, :service_image, :service_vendor, :service_type, :service_location)";
                $stmtIns = $connection->prepare($sqlIns);
                $stmtIns->bindValue(":service_id", $service_id, PDO::PARAM_STR);
                $stmtIns->bindValue(":service_description", $service_description, PDO::PARAM_STR);
                $stmtIns->bindValue(":service_image", $service_image, PDO::PARAM_STR);
                $stmtIns->bindValue(":service_vendor", $service_vendor, PDO::PARAM_STR);
                $stmtIns->bindValue(":service_type", $service_type, PDO::PARAM_STR);
                $stmtIns->bindValue(":service_location", $service_location, PDO::PARAM_STR);
                $stmtIns->execute();

                $this->response = [
                    'status' => 200,
                    'msg' => 'Service created and published successfully'
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

    public function get_service($service_id){
        $this->service_id = $service_id;
        $connection = $this->open_connection();
        
        $sql = "SELECT * FROM vendors_services WHERE service_id = :service_id LIMIT 1";
        $stmt = $connection->prepare($sql);
        $stmt->bindValue(":service_id", $service_id, PDO::PARAM_STR);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_OBJ);

        $this->response = $row;

        $connection = $this->close_connection();
        return json_encode($this->response);
    }

    public function update_service($service_id, $service_description, $service_image, $service_vendor, $service_type, $service_location, $service_status){
        $this->service_id = $service_id;
        $this->service_description = $service_description;
        $this->service_image = $service_image;
        $this->service_vendor = $service_vendor;
        $this->service_type = $service_type;
        $this->service_status = $service_status;
        $this->service_location = $service_location;

        $connection = $this->open_connection();

        try{
            $sqlUpdate = "UPDATE services_table SET service_description = :service_description, service_image = :service_image, service_vendor = :service_vendor, service_type = :service_type, service_status = :service_status, service_location = :service_location WHERE service_id = :service_id";
            $stmtUpdate = $connection->prepare($sqlUpdate);
            $stmtUpdate->bindValue(":service_id", $service_id, PDO::PARAM_STR);
            $stmtUpdate->bindValue(":service_description", $service_description, PDO::PARAM_STR);
            $stmtUpdate->bindValue(":service_image", $service_image, PDO::PARAM_STR);
            $stmtUpdate->bindValue(":service_vendor", $service_vendor, PDO::PARAM_STR);
            $stmtUpdate->bindValue(":service_type", $service_type, PDO::PARAM_STR);
            $stmtUpdate->bindValue(":service_status", $service_status, PDO::PARAM_STR);
            $stmtUpdate->bindValue(":service_location", $service_location, PDO::PARAM_STR);
            $stmtUpdate->execute();

            $this->response = [
                'status' => 200,
                'msg' => 'Service updated and published successfully'
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

    public function delete_service($service_id){
        $this->service_id = $service_id;
        $connection = $this->open_connection();
        
        try{
            $sql = "DELETE FROM services_table WHERE service_id = :service_id";
            $stmt = $connection->prepare($sql);
            $stmt->bindValue(":service_id", $service_id, PDO::PARAM_STR);
            $stmt->execute();

            $this->response = [
                'status' => 200,
                'msg' => 'Service deleted successfully'
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