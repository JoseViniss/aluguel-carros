<?php
    class Carro{

        private $conn;

        private $table = 'carro';
        
        public function __construct($bd){
            $this->conn = $bd;
        }

        public function read(){
            $query = "SELECT * FROM ". $this->table;
            $sql_code = $this->conn->prepare($query);
            $sql_code->execute();
            return $sql_code->fetchAll(PDO::FETCH_ASSOC);
        }

        public function readAlugaveis(){
            $query = "SELECT * FROM $this->table WHERE alugado=0";
            $sql_code = $this->conn->prepare($query);
            $sql_code->execute();
            return $sql_code->fetchAll(PDO::FETCH_ASSOC);
        }

        public function readOne($id){
            $query = "SELECT * FROM " . $this->table . " WHERE idCarro = :id";
            $sql_code = $this->conn->prepare($query);
            $sql_code->bindParam(':id', $id);
            $sql_code->execute();
            return $sql_code->fetch(PDO::FETCH_ASSOC);
        }

        public function update($id, $nome, $modelo, $ano, $cor, $preco_diaria, $marca) {
            $query = "UPDATE " . $this->table . " SET nome = :nome, modelo = :modelo, ano = :ano, cor = :cor, preco_diaria = :preco_diaria, marca = :marca, alugado=0 WHERE idCarro = :id";
            $sql_code = $this->conn->prepare($query);
            $sql_code->bindParam(':nome', $nome);
            $sql_code->bindParam(':modelo', $modelo);
            $sql_code->bindParam(':ano', $ano);
            $sql_code->bindParam(':cor', $cor);
            $sql_code->bindParam(':preco_diaria', $preco_diaria);
            $sql_code->bindParam(':marca', $marca);
            $sql_code->bindParam(':id', $id);
            
            return $sql_code->execute();
        }

        public function create($nome, $modelo, $ano, $cor, $preco_diaria, $marca) {
            $query = "INSERT INTO " . $this->table . " (nome, modelo, ano, cor, preco_diaria, marca, alugado) VALUES (:nome, :modelo, :ano, :cor, :preco_diaria, :marca, 0)";
            $sql_code = $this->conn->prepare($query);
            $sql_code->bindParam(':nome', $nome);
            $sql_code->bindParam(':modelo', $modelo);
            $sql_code->bindParam(':ano', $ano);
            $sql_code->bindParam(':cor', $cor);
            $sql_code->bindParam(':preco_diaria', $preco_diaria);
            $sql_code->bindParam(':marca', $marca);
            
            return $sql_code->execute();
        }

        public function delete($id) {
            $query = "DELETE FROM " . $this->table . " WHERE idCarro = :id";
            $sql_code = $this->conn->prepare($query);
            $sql_code->bindParam(':id', $id);
            return $sql_code->execute();
        }

    }