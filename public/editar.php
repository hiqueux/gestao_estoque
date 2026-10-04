<?php

require_once "../infra/conexao.php";

$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);
if (!$id) {
    die("Produto inválido.");
}

$sql = "SELECT * FROM produtos WHERE id = ?";
$stmt = $conexao->prepare($sql);

if (!$stmt) {
    die("Erro ao buscar produto.");
}

$stmt->bind_param("i", $id);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows == 0) {
    die("Produto não encontrado.");
}

$produto = $resultado->fetch_assoc();
$stmt->close();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produto</title>
</head>

<body>

    <h1>Editar Produto</h1>

    <form action="atualizar.php" method="POST">

        <input type="hidden" name="id" value="<?= $produto["id"] ?>">

        <label for="nome"> Nome: </label>
        <input type="text" name="nome" value="<?= htmlspecialchars($produto["nome"]) ?>" required>

        <label for="categoria"> Categoria: </label>
        <input type="text" name="categoria" value="<?= htmlspecialchars($produto["categoria"]) ?>" required>

        <label for="descricao"> Descrição: </label>
        <textarea name="descricao" required><?= htmlspecialchars($produto["descricao"]) ?></textarea>

        <label for="preco"> Preço: </label>
        <input type="number" name="preco" step="0.01" min="0" value="<?= $produto["preco"] ?>" required>

        <label for="quantidade_estoque"> Quantidade em estoque: </label>
        <input type="number" name="quantidade_estoque" min="0" value="<?= $produto["quantidade_estoque"] ?>" required>

        <label for="data_validade"> Data de validade: </label>
        <input type="date" name="data_validade" value="<?= $produto["data_validade"] ?>" required>

        <button type="submit"> Atualizar </button>

    </form>

</body>

</html>