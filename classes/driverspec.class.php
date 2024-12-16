<?php
    class DriverSpec{
    protected $Conn;

    public function __construct($Conn){
        $this->Conn = $Conn;
    }

    public function createSpec($driver_id, $spec_data){
        $query = "INSERT INTO driver_specifications (user_email, driver_id, suspension_stiffness, brake_bias, differential_setting, comments) VALUES (:user_email, :driver_id, :suspension_stiffness, :brake_bias, :differential_setting, :comments)";
        $stmt = $this->Conn->prepare($query);
        if(!isset($spec_data['comments'])){
            $spec_data['comments'] = "";
        }
        return $stmt->execute(array(
            'user_email' => $_SESSION['user_data']['email'],
            'driver_id' => $driver_id, 
            'suspension_stiffness' => $spec_data['suspension_stiffness'], 
            'brake_bias' => $spec_data['brake_bias'], 
            'differential_setting' => $spec_data['differential_setting'],
            'comments' => $spec_data['comments'],
        ));
    }

    public function calculateSpecAverage($driver_id, $spec){
        $query = "SELECT AVG($spec) AS avg FROM driver_specifications WHERE driver_id = :driver_id";
        $stmt = $this->Conn->prepare($query);
        $stmt->execute(array(
            'driver_id' => $driver_id,
        ));
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getMostRecentComment($driver_id){
        $query = "SELECT * FROM driver_specifications WHERE driver_id = :driver_id ORDER BY specification_id DESC LIMIT 1";
        $stmt = $this->Conn->prepare($query);
        $stmt->execute(array(
            'driver_id' => $driver_id,
        ));
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

