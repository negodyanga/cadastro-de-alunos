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
if (!isset($_POST['id'])) {
  die("ID não fornecido");
}

$id = $_POST['id'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$curso = $_POST['curso'];

// SQL para atualizar o registro
$sql = "UPDATE alunos SET nome='$nome', email='$email', telefone='$telefone', curso='$curso' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
  echo "Registro atualizado com sucesso";
} else {
  echo "Erro ao atualizar o registro: " . $conn->error;
}

$conn->close();
?>
