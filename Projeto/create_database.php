<?php
$servername = "localhost";
$username = "douglas";
$password = "douglas";
$dbname = "cadastro_alunos";

// Cria a conexão
$conn = new mysqli($servername, $username, $password);

// Verifica a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Cria o banco de dados
$sql = "CREATE DATABASE $dbname";
if ($conn->query($sql) === TRUE) {
    echo "Banco de dados criado com sucesso";
} else {
    echo "Erro ao criar o banco de dados: " . $conn->error;
}

// Seleciona o banco de dados
$conn->select_db($dbname);

// Cria a tabela
$sql = "CREATE TABLE alunos (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    telefone VARCHAR(15),
    curso VARCHAR(30) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Tabela alunos criada com sucesso";
    header("Refresh: 5; url=index.html");
} else {
    echo "Erro ao criar a tabela: " . $conn->error;
}

$conn->close();