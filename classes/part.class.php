<?php
    class Part {
        protected $Conn;

        public function __construct($Conn){
            $this->Conn = $Conn;
        }

        public function getAllParts(){
            $query = "SELECT * FROM parts";
            $stmt = $this->Conn->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }