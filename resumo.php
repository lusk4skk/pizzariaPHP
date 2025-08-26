<!DOCTYPE html>
<html lang="pt-br">

<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="style.css">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
      <link rel="stylesheet" href="style.css">
      <title>Resumo do Pedido - Pizzaria Legal</title>
</head>

<body>
      <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">

                  <a class="navbar-brand" href="#">Inicio</a>

                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                  </button>

                  <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav ms-auto">
                              <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                              </li>
                              <li class="nav-item">
                                    <a class="nav-link" href="#">Serviços</a>
                              </li>
                              <li class="nav-item">
                                    <a class="nav-link" href="#">Cardápio</a>
                              </li>
                        </ul>
                  </div>
            </div>
      </nav>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = isset($_POST["nome"]) ? $_POST["nome"] : '';
    $sabor = isset($_POST["sabor"]) ? $_POST["sabor"] : '';
    $borda = isset($_POST["borda"]) ? $_POST["borda"] : 'Não';
    $bebidas = isset($_POST["bebidas"]) ? $_POST["bebidas"] : [];

    $valorPizza = 0;
    if ($sabor === "Mussarela") $valorPizza = 30;
    elseif ($sabor === "Calabresa") $valorPizza = 32;
    elseif ($sabor === "Portuguesa") $valorPizza = 35;

    if ($borda === "Sim") $valorPizza += 12;

    $valorBebidas = 0;
    foreach ($bebidas as $bebida) {
        if ($bebida === "Refrigerante") $valorBebidas += 8;
        elseif ($bebida === "Suco") $valorBebidas += 12;
        elseif ($bebida === "Água") $valorBebidas += 5;
    }

    $total = $valorPizza + $valorBebidas;

    echo "<style> 
            body { 
                font-family: Arial, sans-serif; 
                margin: 20px; 
                align-items: center; 
                text-align: center; 
                } </style>";
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
    echo '<button><a href="index.html">Fazer outro pedido</a></button>';
} else {
    echo "<p>Formulário não enviado corretamente.</p>";
    echo '<a href="index.html">Voltar</a>';
}
?>

</body>

</html>