<?php

require_once "infra/conexao.php";

$sql = "SELECT * FROM produtos ORDER BY id DESC";
$stmt = $conexao->prepare($sql);

if (!$stmt) {
    die("Erro ao listar os produtos.");
}

$stmt->execute();
$resultado = $stmt->get_result();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestão de Estoque</title>
    <link rel="stylesheet" href="style/styles.css">
</head>

<body>

    <h1>GESTÃO DE ESTOQUE</h1>
    <h2>Cadastrar Produto</h2>

    <form action="public/cadastrar.php" method="POST">

        <label for="nome"> Nome: </label>
        <input type="text" id="nome" name="nome" required>

        <label for="categoria"> Categoria: </label>
        <input type="text" id="categoria" name="categoria" required>

        <label for="descricao"> Descrição: </label>
        <textarea id="descricao" name="descricao" required></textarea>

        <label for="preco"> Preço: </label>
        <input type="number" id="preco" name="preco" step="0.01" min="0" required>

        <label for="quantidade_estoque"> Quantidade em estoque: </label>
        <input type="number" id="quantidade_estoque" name="quantidade_estoque" min="0" required>

        <label for="data_validade"> Data de validade: </label>
        <input type="date" id="data_validade" name="data_validade" required>

        <button type="submit"> Cadastrar </button>

    </form>

    <h2>Produtos cadastrados</h2>

    <table>

        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Categoria</th>
            <th>Descrição</th>
            <th>Preço</th>
            <th>Estoque</th>
            <th>Validade</th>
            <th>Ações</th>
        </tr>

        <?php while ($produto = $resultado->fetch_assoc()) { ?>

            <tr>
                <td>
                    <?= $produto["id"] ?>
                </td>

                <td>
                    <?= htmlspecialchars($produto["nome"]) ?>
                </td>

                <td>
                    <?= htmlspecialchars($produto["categoria"]) ?>
                </td>

                <td>
                    <?= htmlspecialchars($produto["descricao"]) ?>
                </td>

                <td>
                    R$ <?= number_format($produto["preco"], 2, ",", ".") ?>
                </td>

                <td>
                    <?= $produto["quantidade_estoque"] ?>
                </td>

                <td>
                    <?= $produto["data_validade"] ?>
                </td>

                <td>
                    <a href="public/editar.php?id=<?= $produto["id"] ?>"> Editar </a>
                    <a href="public/excluir.php?id=<?= $produto["id"] ?>"> Excluir </a>
                </td>
            </tr>

        <?php } ?>

    </table>

</body>
</html>

<?php
$stmt->close();
?>