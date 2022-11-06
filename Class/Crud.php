<?php

class Crud{
    private $connect;
    private $descricao;
    private $cliente;
    private $cpf;
    
    function __construct($conexao){

        $this->connect = $conexao;
    }

    public function setDados($descricao,$cliente,$cpf){
        $this->descricao= $descricao;
        $this->cliente=$cliente;
        $this->cpf=$cpf;
    }

    public function insertDados(){
            
        $sql = $this->connect->prepare("INSERT INTO teste (descricao, cliente, cpf) VALUES (?,?,?)");
        $sql->bindParam(1,$this->descricao);
        $sql->bindParam(2,$this->cliente);
        $sql->bindParam(3,$this->cpf);

        $sql->execute();
        
       echo "<script> alert('Dados inseridos com sucesso!')
             window.location = 'index.php'
       </script>";

       
    
   
}
}   
  