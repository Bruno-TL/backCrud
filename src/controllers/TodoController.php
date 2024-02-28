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
        $result = $this->model->getItem($id);
        return json_encode($result);
    }

    public function create() {
        // Método para exibir o formulário de criação de usuário
    }

    public function store() {
        // Método para processar os dados do formulário de criação de usuário
    }

    public function edit(int $id) {
        // Método para exibir o formulário de edição de usuário
    }

    public function update(int $id) {
        // Método para processar os dados do formulário de edição de usuário
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($id)) {
            // Recuperar os dados do formulário
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];

            $result = $this->model->updateItem($id,$name,$email,$phone);
            return json_encode($result);
        }
        $result = [
            'status' => 400,
            'message' => 'Erro ao fazer update do todo'
        ];
        return json_encode($result);
    }

    public function delete(int $id) {
        // Método para excluir um usuário
    }
}