<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = isset($_POST["nome"]) ? trim($_POST["nome"]) : '';
    $sabor = isset($_POST["sabor"]) ? $_POST["sabor"] : '';
    $borda = isset($_POST["borda"]) ? $_POST["borda"] : 'nao';
    $bebidas = isset($_POST["bebidas"]) ? $_POST["bebidas"] : [];

    $valorPizza = 0;
    if ($sabor === "mussarela") $valorPizza = 30;
    elseif ($sabor === "calabresa") $valorPizza = 32;
    elseif ($sabor === "portuguesa") $valorPizza = 35;

    if ($borda === "sim") $valorPizza += 12;

    $valorBebidas = 0;
    foreach ($bebidas as $bebida) {
        if ($bebida === "refrigerante") $valorBebidas += 8;
        elseif ($bebida === "suco") $valorBebidas += 12;
        elseif ($bebida === "agua") $valorBebidas += 5;
    }

    $total = $valorPizza + $valorBebidas;

    echo "<h2>Resumo do Pedido</h2>";
    echo "<p><strong>Nome:</strong> " . htmlspecialchars($nome) . "</p>";
    echo "<p><strong>Sabor:</strong> " . htmlspecialchars($sabor) . "</p>";
    echo "<p><strong>Borda Recheada:</strong> " . htmlspecialchars($borda) . "</p>";

    if (!empty($bebidas)) {
        echo "<p><strong>Bebidas:</strong></p><ul>";
        foreach ($bebidas as $b) {
            echo "<li>" . htmlspecialchars($b) . "</li>";
        }
        echo "</ul>";
    } else {
        echo "<p><strong>Bebidas:</strong> Nenhuma</p>";
    }

    echo "<p><strong>Total a pagar:</strong> R$" . number_format($total, 2, ',', '.') . "</p>";
    echo '<a href="index.html">Fazer outro pedido</a>';
} else {
    echo "<p>Formulário não enviado corretamente.</p>";
    echo '<a href="index.html">Voltar</a>';
}
?>
