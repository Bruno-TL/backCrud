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
    }

    public function delete(int $id) {
        // Método para excluir um usuário
    }
}