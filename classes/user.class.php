<?php
    class User {
        protected $Conn;

        public function __construct($Conn){
            $this->Conn = $Conn;
        }

        public function createUser($user_data){
            $sec_password = password_hash($user_data['password'], PASSWORD_DEFAULT);
            $query = "INSERT INTO users (user_email, user_pass, user_level) VALUES (:user_email, :user_pass, :user_level)";
            $stmt = $this->Conn->prepare($query);
            return $stmt->execute(array(
                'user_email' => $user_data['email'],
                'user_pass' => $sec_password,
                'user_level' => "mechanic"
            ));
        }

        public function checkDatabaseForEmailAddress($user_email){
            $query = "SELECT * FROM users WHERE user_email = :user_email";
            $stmt = $this->Conn->prepare($query);
            $stmt->execute(["user_email" => $user_email]);
            if ($stmt->rowCount() == 0){
                return false;
            }
            return true;
        }

        public function loginUser($user_data){
            if ($this->checkDatabaseForEmailAddress($user_data['email'])){
                $query = "SELECT user_pass FROM users WHERE user_email = :user_email";
                $stmt = $this->Conn->prepare($query);
                $stmt->execute(["user_email" => $user_data['email']]);
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                if (password_verify($user_data['password'], $result['user_pass'])){
                    return true;
                }
                return false;
            }
        }

        public function getUserLevel($user_email){
            $query = "SELECT * FROM users WHERE user_email = :user_email";
            $stmt = $this->Conn->prepare($query);
            $stmt->execute([
                "user_email" => $user_email
            ]);
            $attempt = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $attempt[0]['user_level'];
        }
        
    }