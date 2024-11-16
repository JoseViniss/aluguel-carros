<?php

require_once __DIR__ . '/../models/Aluguel.php';
require_once __DIR__ . '/../../config/conexao.php';

class AluguelController {

    private $aluguel;

    public function __construct($bd) {
        $this->aluguel = new Aluguel($bd);
    }

    public function read() {
        return $this->aluguel->read();
    }

    public function readOne($id) {
        return $this->aluguel->readOne($id);
    }

    public function readAlugueis($id){
        return $this->aluguel->readAlugueis($id);
    }

    public function create($idCarro, $idUsuario, $data_aluguel, $data_entrega, $preco_total, $forma_pagamento) {
        return $this->aluguel->create($idCarro, $idUsuario, $data_aluguel, $data_entrega, $preco_total, $forma_pagamento);
    }

    public function delete($idAluguel) {
        return $this->aluguel->delete($idAluguel);
    }

    public function update($idAluguel, $data_entrega, $preco_total, $forma_pagamento) {
        return $this->aluguel->update($idAluguel, $data_entrega, $preco_total, $forma_pagamento);
    }
}
