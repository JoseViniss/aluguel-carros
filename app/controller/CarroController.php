<?php

require_once __DIR__ . '/../models/Carro.php';
require_once __DIR__ . '/../../config/conexao.php';

class CarroController{

    private $carro;
    public function __construct($bd){
        $this->carro = new Carro( $bd );
    }

    public function read(){
        return $this->carro->read();
    }

    public function readAlugaveis(){
        return $this->carro->readAlugaveis();
    }

    public function readOne($id) {
        return $this->carro->readOne($id);
    }

    public function create($nome, $modelo, $ano, $cor, $preco_diaria, $marca) {
        return $this->carro->create($nome, $modelo, $ano, $cor, $preco_diaria, $marca);
    }

    public function delete($id){
        return $this->carro->delete($id);
    }

    public function update($id, $nome, $modelo, $ano, $cor, $preco_diaria, $marca) {
        return $this->carro->update($id, $nome, $modelo, $ano, $cor, $preco_diaria, $marca);
    }

}