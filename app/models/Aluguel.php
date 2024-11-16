<?php

    class Aluguel{

        private $conn;

        private $table = 'aluguel';
        
        public function __construct($bd){
            $this->conn = $bd;
        }

        public function read(){
            $query = "SELECT aluguel.idAluguel, aluguel.data_aluguel, aluguel.data_entrega, aluguel.preco_total, carro.nome AS nomeCarro, usuario.nome AS nomeUsuario FROM aluguel INNER JOIN carro ON aluguel.idCarro = carro.idCarro INNER JOIN usuario ON aluguel.idUsuario = usuario.idUsuario";
            $sql_code = $this->conn->prepare($query);
            $sql_code->execute();
            return $sql_code->fetchAll(PDO::FETCH_ASSOC);
        }

        public function readOne($id){
            $query = "SELECT aluguel.idAluguel, aluguel.data_aluguel, aluguel.data_entrega, aluguel.preco_total, carro.nome AS nomeCarro, usuario.nome AS nomeUsuario FROM aluguel INNER JOIN carro ON aluguel.idCarro = carro.idCarro INNER JOIN usuario ON aluguel.idUsuario = usuario.idUsuario WHERE idAluguel = :id";
            $sql_code = $this->conn->prepare($query);
            $sql_code->bindParam(':id', $id);
            $sql_code->execute();
            return $sql_code->fetch(PDO::FETCH_ASSOC);
        }

        public function readAlugueis($id){
            $query = "SELECT aluguel.idAluguel, aluguel.data_aluguel, aluguel.data_entrega, aluguel.preco_total, carro.nome AS nomeCarro, usuario.nome AS nomeUsuario FROM aluguel INNER JOIN carro ON aluguel.idCarro = carro.idCarro INNER JOIN usuario ON aluguel.idUsuario = usuario.idUsuario WHERE aluguel.idUsuario = :id";
            $sql_code = $this->conn->prepare($query);
            $sql_code->bindParam(':id', $id);
            $sql_code->execute();
            return $sql_code->fetchAll(PDO::FETCH_ASSOC);
        }

        public function update($id, $data_entrega, $preco_total, $forma_pagamento) {
            $query = "UPDATE " . $this->table . " SET data_entrega = :data_entrega, preco_total = :preco_total, forma_pagamento = :forma_pagamento WHERE idAluguel = :id";
            $sql_code = $this->conn->prepare($query);
            $sql_code->bindParam(':data_entrega', $data_entrega);
            $sql_code->bindParam(':preco_total', $preco_total);
            $sql_code->bindParam(':forma_pagamento', $forma_pagamento);
            $sql_code->bindParam(':id', $id);
            
            return $sql_code->execute();
        }

        public function create($idCarro, $idUsuario, $data_aluguel, $data_entrega, $preco_total, $forma_pagamento) {
            try {
            
                $this->conn->beginTransaction();
        
                $query1 = "INSERT INTO " . $this->table . " (idCarro, idUsuario, data_aluguel, data_entrega, preco_total, forma_pagamento)
                           VALUES (:idCarro, :idUsuario, :data_aluguel, :data_entrega, :preco_total, :forma_pagamento)";
                $stmt1 = $this->conn->prepare($query1);
                $stmt1->bindParam(':idCarro', $idCarro);
                $stmt1->bindParam(':idUsuario', $idUsuario);
                $stmt1->bindParam(':data_aluguel', $data_aluguel);
                $stmt1->bindParam(':data_entrega', $data_entrega);
                $stmt1->bindParam(':preco_total', $preco_total);
                $stmt1->bindParam(':forma_pagamento', $forma_pagamento);
                $stmt1->execute();
        
                $query2 = "UPDATE carro SET alugado = 1 WHERE idCarro = :idCarro";
                $stmt2 = $this->conn->prepare($query2);
                $stmt2->bindParam(':idCarro', $idCarro);
                $stmt2->execute();

                $this->conn->commit();
        
                return true;
        
            } catch (Exception $e) {

                $this->conn->rollBack();
                throw new Exception("Erro ao processar o aluguel: " . $e->getMessage());
            }
        }

        public function delete($idAluguel) {
            try {
                $this->conn->beginTransaction();

                $query1 = "SELECT idCarro FROM aluguel WHERE idAluguel = :idAluguel";
                $stmt1 = $this->conn->prepare($query1);
                $stmt1->bindParam(':idAluguel', $idAluguel, PDO::PARAM_INT);
                $stmt1->execute();
                $result = $stmt1->fetch(PDO::FETCH_ASSOC);

                if (!$result) {
                    throw new Exception("Aluguel não encontrado!");
                }

                $idCarro = $result['idCarro'];

                $query2 = "UPDATE carro SET alugado = 0 WHERE idCarro = :idCarro";
                $stmt2 = $this->conn->prepare($query2);
                $stmt2->bindParam(':idCarro', $idCarro, PDO::PARAM_INT);
                $stmt2->execute();

                $query3 = "DELETE FROM aluguel WHERE idAluguel = :idAluguel";
                $stmt3 = $this->conn->prepare($query3);
                $stmt3->bindParam(':idAluguel', $idAluguel, PDO::PARAM_INT);
                $stmt3->execute();

                $this->conn->commit();

                return true;

            } catch (Exception $e) {
                $this->conn->rollBack();
                throw new Exception("Erro ao deletar aluguel: " . $e->getMessage());
            }
        }

    } 