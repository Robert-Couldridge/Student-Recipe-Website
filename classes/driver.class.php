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
    }