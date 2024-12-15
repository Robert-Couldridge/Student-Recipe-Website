<?php
    class Race {
        protected $Conn;

        public function __construct($Conn){
            $this->Conn = $Conn;
        }
        
        public function getRacesByDate($current_date){
            $query = "SELECT * FROM races WHERE :current_date < race_date";
            $stmt = $this->Conn->prepare($query);
            $stmt->execute([
                "current_date" => $current_date
            ]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }