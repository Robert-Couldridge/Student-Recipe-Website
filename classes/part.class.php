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

        public function getPartById($part_id){
            $query = "SELECT * FROM parts WHERE part_id = :part_id";
            $stmt = $this->Conn->prepare($query);
            $stmt->execute([
                "part_id" => $part_id
                ]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }