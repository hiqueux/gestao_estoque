<?php

require_once "../infra/conexao.php";

$nome = trim($_POST["nome"] ?? "");
$categoria = trim($_POST["categoria"] ?? "");
$descricao = trim($_POST["descricao"] ?? "");
$preco = $_POST["preco"] ?? "";
$quantidade_estoque = $_POST["quantidade_estoque"] ?? "";
$data_validade = $_POST["data_validade"] ?? "";

if (
    $nome === "" ||
    $categoria === "" ||
    $descricao === "" ||
    $preco === "" ||
    $quantidade_estoque === "" ||
    $data_validade === ""
) {
    die("Todos os campos são obrigatórios.");
}

if (!is_numeric($preco) || $preco < 0) {
    die("Preço inválido.");
}

if (
    filter_var($quantidade_estoque, FILTER_VALIDATE_INT) === false ||
    $quantidade_estoque < 0
) {
    die("Quantidade em estoque inválida.");
}

$preco = (float) $preco;
$quantidade_estoque = (int) $quantidade_estoque;

$sql = "INSERT INTO produtos
        (nome, categoria, descricao, preco, quantidade_estoque, data_validade) VALUES (?, ?, ?, ?, ?, ?)";

$stmt = $conexao->prepare($sql);

if (!$stmt) {
    die("Erro ao preparar o cadastro.");
}

$stmt->bind_param("sssdis", $nome, $categoria, $descricao, $preco, $quantidade_estoque, $data_validade);

if (!$stmt->execute()) {
    die("Erro ao cadastrar produto.");
}

$stmt->close();

header("Location: ../index.php");
exit;

?>