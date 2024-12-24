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

        public function orderParts($part_name, $quantity){
            $query = "UPDATE parts SET quantity_in_stores = quantity_in_stores - :quantity WHERE part_name = :part_name";
            $stmt = $this->Conn->prepare($query);
            return $stmt->execute([
                "part_name" => $part_name,
                "quantity" => $quantity,
            ]);
        }

        public function addPartsToStores($part_name, $quantity){
            $query = "UPDATE parts SET quantity_in_stores = quantity_in_stores + :quantity WHERE part_name = :part_name";
            $stmt = $this->Conn->prepare($query);
            return $stmt->execute([
                "part_name" => $part_name,
                "quantity" => $quantity,
            ]);
        }

        public function getPartsByCategoryId($category_id){
            $query = "SELECT * FROM parts WHERE category_id = :category_id";
            $stmt = $this->Conn->prepare($query);
            $stmt->execute([
                "category_id" => $category_id
            ]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function searchParts($query_string){
            $query = "SELECT * FROM parts WHERE part_name LIKE :query_string";
            $stmt = $this->Conn->prepare($query);
            $stmt->execute([
                "query_string" => "%$query_string%"
            ]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }