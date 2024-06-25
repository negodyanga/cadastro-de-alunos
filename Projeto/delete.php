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

// sql to delete a record
$sql = "DELETE FROM alunos WHERE id=$id";

if ($conn->query($sql) === TRUE) {
  echo "Registro excluído com sucesso";
  header("Location: listar_alunos.html"); // Redirecionar para a lista de alunos
} else {
  echo "Erro ao excluir o registro: " . $conn->error;
}

$conn->close();
?>
