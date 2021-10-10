<?php

class Manager extends Conexao{

    public function insertUser($table, $data)
    {   
        $pdo = parent::get_instance();
        $fields = implode(", ", array_keys($data));
        $values = ":" . implode(", :", array_keys($data));
        $sql = "INSERT INTO $table ($fields) VALUES ($values)";
        $statement = $pdo->prepare($sql);
        foreach ($data as $key => $value) {
            $statement->bindValue(":$key", $value, PDO::PARAM_STR);
        }
        $statement->execute();

        $this->insertLog('Insert User'. implode(',',$data));
    }

    public function listUser($table)
    {
        $pdo = parent::get_instance();
        $sql = "SELECT * FROM $table  ORDER BY nome ASC";
        $statement = $pdo->query($sql);
        $statement->execute();

        $this->insertLog('List User');

        return $statement->fetchAll();
    }

    public function updateUser($table, $data, $id)
    {
        $pdo = parent::get_instance();
        $new_values = "";
        foreach ($data as $k => $v) {
            $new_values .= "$k=:$k, ";
        }
        $new_values = substr($new_values, 0, -2);
        $sql = "Update $table SET $new_values WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        foreach ($data as $k => $v) {
            $stmt->bindValue(":$k", $v, PDO::PARAM_STR);
        }
        $stmt->execute();

        $this->insertLog('Update User'. implode(',',$data));

    }

    public function getInfo($table, $id)
    {
        $pdo = parent::get_instance();
        $sql = "SELECT * FROM $table WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();

        $this->insertLog('Get Info');

        return $stmt->fetchAll();
    }

    public function deleteUser($table, $id){
        $pdo = parent::get_instance();
        $sql = "DELETE FROM $table WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();

        $this->insertLog('Insert User' . $id);

    }

    public function insertLog($operation){
        
        session_start();
        $usuarioLogado = $_SESSION['cpf'];
        $today = date("Y-m-d H:i:s");

        $pdo = parent::get_instance();
        $sql = "INSERT INTO LOG (USUARIO, DATA, OPERACAO) VALUES (:usu, :data, :oper)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(":usu", $usuarioLogado);
        $stmt->bindValue(":data", $today);
        $stmt->bindValue(":oper", $operation);
        $stmt->execute();
    }
}