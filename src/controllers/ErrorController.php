<?php

class ErrorController{
    public function notFound() {
        $notFound = [
            'erro' => 404,
            'mensagem' => 'Endereco de API nao encontrada'
        ];
        return json_encode($notFound);
    }
}