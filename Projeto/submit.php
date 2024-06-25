<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cadastro_alunos";

// Conectar ao banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome       = htmlspecialchars($_POST['nome']);
    $email      = htmlspecialchars($_POST['email']);
    $telefone   = htmlspecialchars($_POST['telefone']);
    $curso      = htmlspecialchars($_POST['curso']);

    // Preparar e vincular
    $stmt = $conn->prepare("INSERT INTO alunos(nome, email, telefone, curso) VALUES (?, ?, ?, ?)");

    /**
     * $countryId = isset($_POST['country']) ? (int)$_POST['country'] : 0;

    $inserSQL = "INSERT INTO Table1(country_id) VALUES($countryId)";

    $Result1 = mysql_query($inserSQL ) or die(mysql_error());
     */



    $stmt->bind_param("ssis", $nome, $email, $telefone, $curso);

    // Executar a declaração
    if ($stmt->execute()) {
        header("Location: listar_alunos.html");
    } else {
        echo "Erro: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();