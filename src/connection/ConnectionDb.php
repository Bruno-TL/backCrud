<?php


class ConnectionDb {
    function openConnection():PDO
    {
        $hostname = "127.0.0.1";
        $bancoDeDados = "crud_php";
        $user = "root";
        $senha = "1234";

        try{
            $conn = new PDO("mysql:host={$hostname}; dbname={$bancoDeDados}", $user, $senha);
            return $conn;
        }catch(\Throwable $th){
            throw $th;
        }
    }
}
