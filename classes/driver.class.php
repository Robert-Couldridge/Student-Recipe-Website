<?php
    class Driver {
        protected $Conn;

        public function __construct($Conn)
        {
            $this->Conn = $Conn;
        }

        public function getAllDrivers(){
            $query = "SELECT * FROM drivers";
            $stmt = $this->Conn->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getDriverById($driver_id){
            $query = "SELECT * FROM drivers WHERE driver_id = :driver_id";
            $stmt = $this->Conn->prepare($query);
            $stmt->execute([
                "driver_id" => $driver_id
                ]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getDriversByDiscipline($discipline){
            $query = "SELECT * FROM drivers WHERE discipline = :discipline";
            $stmt = $this->Conn->prepare($query);
            $stmt->execute([
                "discipline" => $discipline
                ]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }