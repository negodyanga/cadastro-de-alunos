<?php
$servername = "localhost";
$username = "douglas";
$password = "douglas";
$dbname = "cadastro_alunos";

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
  die("Conexão falhou: " . $conn->connect_error);
}

// Verificar se o ID foi fornecido
if (!isset($_GET['id'])) {
  die("ID não fornecido");
}

$id = $_GET['id'];

// SQL para buscar o registro
$sql = "SELECT * FROM alunos WHERE id=$id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  $row = $result->fetch_assoc();
} else {
  die("Nenhum registro encontrado com o ID fornecido");
}

// Lista de cursos
$cursos = array("Curso Matematica", "Curso Portugues", "Curso Ciencia", "Curso Historia", "Curso Fisica");

$data = array('aluno' => $row, 'cursos' => $cursos);

$conn->close();

echo json_encode($data);
?>
