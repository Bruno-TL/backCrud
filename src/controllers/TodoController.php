<?php
include_once '../src/models/TodoModel.php';

class TodoController{
    private $model;

    public function __construct() {
        $this->model = new TodoModel();
    }

    public function index() {
        $result = $this->model->getItens();
        return json_encode($result);
    }

    public function getItem(int $id){
        if(!is_null($id)){
            $result = $this->model->getItem($id);
            return json_encode($result);
        }
        $result = [
            'status' => 400,
            'message' => 'Erro ao tentar pegar o item'
        ];
        return json_encode($result);
        
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];

            $result = $this->model->createItem($name,$email,$phone);
            return json_encode($result);
        }
    }

    public function update(int $id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !is_null($id)) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];

            $result = $this->model->updateItem($id,$name,$email,$phone);
            return json_encode($result);
        }
        $result = [
            'status' => 400,
            'message' => 'Erro ao fazer update do item'
        ];
        return json_encode($result);
    }

    public function delete(int $id) {
        if(!is_null($id)){
            $result = $this->model->deleteItem($id);
            return json_encode($result);
        }
        $result = [
            'status' => 400,
            'message' => 'Erro ao tentar deletar um item'
        ];
        return json_encode($result);
    }
}