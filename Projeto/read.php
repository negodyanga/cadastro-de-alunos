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

$sql = "SELECT id, nome, email, telefone, curso FROM alunos";
$result = $conn->query($sql);

$data = array();

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $data[] = $row;
  }
} else {
  echo "0 results";
}
$conn->close();

echo json_encode($data);
?>
