<?php
// Conexão com o banco
$conn = new mysqli("localhost", "root", "root", "smartfit");
if ($conn->connect_error) {
  die("Erro na conexão: " . $conn->connect_error);
}

// Receber dados do POST
$nome = $_POST['full_name'];
$numero = $_POST['card_number'];
$validade = $_POST['validade'];
$cvv = $_POST['cvv'];
$plano = $_POST['plano_escolhido'];

// Determinar valor com base no plano
$valor = 0;
if ($plano === 'Light') $valor = 30;
elseif ($plano === 'Pro') $valor = 60;

// Inserir no banco
$sql = "INSERT INTO pagamentos (nome_cartao, numero_cartao, validade, cvv, plano_escolhido, valor)
        VALUES (?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssd", $nome, $numero, $validade, $cvv, $plano, $valor);

if ($stmt->execute()) {
  echo "<script>alert('Pagamento realizado com sucesso!'); window.location.href='index.html';</script>";
} else {
  echo "Erro: " . $conn->error;
}

$stmt->close();
$conn->close();
?>
