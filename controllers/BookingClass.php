<?php

    class BookingClass{
        
        use DataBaseClass;
        
        protected $booking_id;
        protected $booking_user_name;
        protected $booking_user_contact;
        protected $booking_user_email;
        protected $booking_user_location;
        protected $booking_user_vehicle_details;
        protected $booking_user_description;
        protected $booking_user_files;
        protected $booking_date;
        protected $vendor_id;
        protected $service_id;
        protected $response = [];
        
        protected $output = '';
        
        
        public function new_booking($booking_id, $booking_user_name, $booking_user_contact, $booking_user_email, $booking_user_location, $booking_user_vehicle_details, $booking_user_description, $booking_user_files, $vendor_id, $service_id, $booking_date){
            $this->booking_id = $booking_id;
            $this->booking_user_name = $booking_user_name;
            $this->booking_user_contact = $booking_user_contact;
            $this->booking_user_email = $booking_user_email;
            $this->booking_user_location = $booking_user_location;
            $this->booking_user_vehicle_details = $booking_user_vehicle_details;
            $this->booking_user_description = $booking_user_description;
            $this->booking_user_files = $booking_user_files;
            $this->vendor_id = $vendor_id;
            $this->service_id = $service_id;
            $this->booking_date = $booking_date;
            
            $connection = $this->open_connection();
            try{
                
                $sql = "INSERT INTO bookings_table(booking_id, booking_user_name, booking_user_contact, booking_user_email, booking_user_location, booking_user_vehicle_details, booking_user_description, booking_user_files, vendor_id, service_id, booking_date) VALUES(:booking_id, :booking_user_name, :booking_user_contact, :booking_user_email,:booking_user_location, :booking_user_vehicle_details, :booking_user_description, :booking_user_files, :vendor_id, :service_id, :booking_date)";
                $stmt = $connection->prepare($sql);
                $stmt->bindValue(":booking_id", $booking_id, PDO::PARAM_STR);
                $stmt->bindValue(":booking_user_name", $booking_user_name, PDO::PARAM_STR);
                $stmt->bindValue(":booking_user_contact", $booking_user_contact, PDO::PARAM_STR);
                $stmt->bindValue(":booking_user_email", $booking_user_email, PDO::PARAM_STR);
                $stmt->bindValue(":booking_user_location", $booking_user_location, PDO::PARAM_STR);
                $stmt->bindValue(":booking_user_vehicle_details", $booking_user_vehicle_details, PDO::PARAM_STR);
                $stmt->bindValue(":booking_user_description", $booking_user_description, PDO::PARAM_STR);
                $stmt->bindValue(":booking_user_files", $booking_user_files, PDO::PARAM_STR);
                $stmt->bindValue(":vendor_id", $vendor_id, PDO::PARAM_STR);
                $stmt->bindValue(":service_id", $service_id, PDO::PARAM_STR);
                $stmt->bindValue(":booking_date", $booking_date, PDO::PARAM_STR);
                $stmt->execute();
                
                $this->response = [
                    'status' => 200,
                    'msg' => 'Booking sent successfully. You will be contacted for confirmation. Thank you.'
                ];
                
            }catch(\Exception $th){
                $this->response = [
                    'status' => 201,
                    'msg' => 'Something went wrong. Details : ' . $th->getMessage()
                ];
            }
            return json_encode($this->response);
        }
    }