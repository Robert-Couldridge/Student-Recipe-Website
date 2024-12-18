<?php
    class Category {
        protected $Conn;

    public function __construct($Conn)
    {
        $this->Conn = $Conn;
    }

    public function getAllCategories(){
        $query = "SELECT * FROM categories";
        $stmt = $this->Conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCategoryNameFromId($category_id){
        $query = "SELECT * FROM categories WHERE category_id = :category_id";
        $stmt = $this->Conn->prepare($query);
        $stmt->execute([
            "category_id" => $category_id
        ]);
        $attempt = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $attempt[0]['category_name'];
    }
}