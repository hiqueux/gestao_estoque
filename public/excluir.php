<?php

require_once "../infra/conexao.php";
$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

if (!$id) {
    die("Produto inválido.");
}

$sql = "DELETE FROM produtos WHERE id = ?";
$stmt = $conexao->prepare($sql);

if (!$stmt) {
    die("Erro ao preparar exclusão.");
}

$stmt->bind_param("i", $id);

if (!$stmt->execute()) {
    die("Erro ao excluir produto.");
}

$stmt->close();
header("Location: ../index.php");
exit;

?>