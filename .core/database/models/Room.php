<?php

class Room {

    private $pdo;
    public function __construct()
    {
        $this->pdo = Database::getInstance();
    }

    public function create($name, $description, $price, $user_id, $created_by){
        $query = $this->pdo->prepare("INSERT INTO `rooms`(name, description, price, user_id, created_by) VALUES(:name, :description, :price, :user_id, :created_by)");
        $executed = $query->execute([':name' => $name, ':description' => $description, ':price' => $price, ':user_id' => $user_id, ':created_by' => $created_by]);
        if(!$executed){
            throw new PDOException();
        }
    }

    public function get($id){
        $query = $this->pdo->prepare("SELECT * FROM `rooms` WHERE id = :id");
        $query->bindParam(':id', $id);
        $query->execute();
        $room = $query->fetch();
        return $room;
    }

    public function getAll(){
        $query = $this->pdo->prepare("SELECT * FROM `rooms`");
        $query->execute();
        $rooms = $query->fetchAll();
        return $rooms;
    }

    public function edit($id, $name, $description, $price, $user_id){
        $query = $this->pdo->prepare("UPDATE `rooms`
                                    SET name = :name, description = :description, price = :price, :user_id = $user_id
                                    WHERE id = :id");
        $query->bindParam(':id', $id);
        $query->bindParam(':name', $name);
        $query->bindParam(':description', $description);
        $query->bindParam(':price', $price);
        $query->bindParam(':user_id', $user_id);
        $executed = $query->execute();
        if(!$executed){
            throw new PDOException();
        }
    }

    public function delete($id){
        $query = $this->pdo->prepare("DELETE FROM `rooms` WHERE id = :id");
        $query->bindParam(':id', $id);
        $executed = $query->execute();
        if(!$executed){
            throw new PDOException();
        }
    }

    public function uploadImage($id, $img_name){
        $query = $this->pdo->prepare("UPDATE `users` SET image = :image WHERE id = :id");
        $query->bindParam(':id', $id);
        $query->bindParam(':image', $img_name);
        $executed = $query->execute();
        var_dump($executed);
        if(!$executed){
            throw new PDOException();
        }
    }

    public function deleteImage($id){
        $query = $this->pdo->prepare("UPDATE `users` SET image = NULL WHERE id = :id");
        $query->bindParam(':id', $id);
        $executed = $query->execute();
        var_dump($executed);
        if(!$executed){
            throw new PDOException();
        }
    }

    private function generateToken(){
        return md5(uniqid(rand(), TRUE));
    }
}

?>