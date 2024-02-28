<?php
function openConnection():PDO
{
    $hostname = "localhost";
    $bancoDeDados = "crudPhp";
    $user = "root";
    $senha = "1234";

    try{
        $conn = new PDO("mysql:host={$hostname}; dbname={$bancoDeDados}", $user, $senha);
        return $conn;
    }catch(\Throwable $th){
        throw $th;
    }
}