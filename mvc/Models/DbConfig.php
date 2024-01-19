<?php
class DbConfig {
    // Atributos
    private $_host = 'localhost';
    private $_username ='root';
    private $_password ='';
    private $_database ='ecoride';
    protected $connection;

    // Métodos
    public function __construct(){
        // Criar a conexão sem especificar o banco de dados
        $this->connection = new mysqli($this->_host, $this->_username, $this->_password);

        // Verificar erros na conexão
        if ($this->connection->connect_error) {
            die('Erro de Conexão: ' . $this->connection->connect_error);
        }

        // Criar o banco de dados se não existir
        $this->createDatabase();

        // Selecionar o banco de dados
        $this->connection->select_db($this->_database);

        // Criar as tabelas se não existirem
        $this->createTables();
    }

    private function createDatabase() {
        $sqlCreateDatabase = "CREATE DATABASE IF NOT EXISTS ecoride";
        $this->connection->query($sqlCreateDatabase);

        if ($this->connection->error) {
            die('Erro ao criar o banco de dados: ' . $this->connection->error);
        }
    }

    private function createTables() {
        // Criar a tabela cadastrosusuarios se não existir
        $sqlCreateTableUsuarios = "CREATE TABLE IF NOT EXISTS cadastrosusuarios (
            id INT AUTO_INCREMENT PRIMARY KEY,
            nome VARCHAR(255) NOT NULL,
            email VARCHAR(255) NOT NULL,
            telefone VARCHAR(20) NOT NULL,
            senha VARCHAR(255) NOT NULL
        )";
        $this->connection->query($sqlCreateTableUsuarios);
        
        if ($this->connection->error) {
            die('Erro ao criar a tabela cadastrosusuarios: ' . $this->connection->error);
        }

        // Criar a tabela alugueis se não existir
        $sqlCreateTableAlugueis = "CREATE TABLE IF NOT EXISTS alugueis (
            id INT AUTO_INCREMENT PRIMARY KEY,
            idUsuario INT NOT NULL,
            marca VARCHAR(255) NOT NULL,
            modelo VARCHAR(255) NOT NULL,
            dataLocacao DATE NOT NULL,
            valorTotal DECIMAL(10, 2) NOT NULL,
            qtdDias INT NOT NULL,
            FOREIGN KEY (idUsuario) REFERENCES cadastrosusuarios(id)
        )";
        $this->connection->query($sqlCreateTableAlugueis);
        
        if ($this->connection->error) {
            die('Erro ao criar a tabela alugueis: ' . $this->connection->error);
        }
    }
}

?>