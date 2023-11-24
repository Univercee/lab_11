<?php

class RoomsController {
    private $table;
    private $errors;
    private $user_table;
    public function __construct()
    {
        $this->table = new Room();
        $this->user_table = new User();
        $this->errors = [];
    }

    public function add(string $name, string $description, int $price, int $user_id){
        $this->errors = [];
        $created_by = $this->user_table->getIdByToken($_COOKIE['session_token']);
        
        try{
            $this->table->create($name, $description, $price, $user_id, $created_by);
        }catch(Exception $e){
            array_push($this->errors, 'Не удалось создать объявление');
        }
        finally {
            return $this->errors;
        }
    }

    public function edit(int $id, string $name, string $description, int $price, int $user_id){
        $this->errors = [];
        $created_by = $this->user_table->getIdByToken($_COOKIE['session_token']);
        
        try{
            $this->table->edit($id, $name, $description, $price, $user_id);
        }catch(Exception $e){
            array_push($this->errors, 'Не удалось обновить объявление');
        }
        finally {
            return $this->errors;
        }
    }

    public function get(int $id){
        $room = $this->table->get($id);
        return $room;
    }

    public function getAll(){
        $rooms = $this->table->getAll();
        return $rooms;
    }

    public function delete(int $id){
        $this->errors = [];
        
        try{
            $this->table->delete($id);
        }catch(Exception $e){
            array_push($this->errors, 'Не удалось обновить объявление');
        }
        finally {
            return $this->errors;
        }
    }

    public function uploadImage($image, $id) {
        $img_name = $id.".jpg";
        $allowed_types = ['png', 'jpg'];
        $path = $_SERVER['DOCUMENT_ROOT'].'/Lr/inc/catalog_images/rooms/'.$id.'.jpg';
        try {
            if(is_null($image)){
                $this->table->deleteImage($id);
                if(file_exists($path)){
                    unlink($path);
                }
            }
            else{
                $ext = pathinfo($image['name'], PATHINFO_EXTENSION);
                if(!in_array($ext, $allowed_types)){
                    throw new Exception();
                }
                move_uploaded_file($image["tmp_name"], $path);
                $this->table->uploadImage($id, $img_name);
            }
        }
        catch(Exception $e){
            array_push($this->errors, 'Не удалось загрузить фотографию');
        }
        finally {
            return $this->errors;
        }
    }
}

?>