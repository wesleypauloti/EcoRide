<?php
class DbConfig {
    // Atributos
    private $_host = 'sql303.infinityfree.com';
    private $_username ='if0_34785272';
    private $_password ='V11eXaPZcM';
    private $_database ='if0_34785272_ecoride';
    protected $connection;

    // Métodos
    public function __construct(){
        if (!isset($this->connection)){
            $this->connection = new mysqli($this->_host, $this->_username,
            $this->_password, $this->_database);
        }
        if (!$this->connection){
            echo 'Não é possível conectar ao servidor de banco de dados';
            exit;
        }
    }
}

?>