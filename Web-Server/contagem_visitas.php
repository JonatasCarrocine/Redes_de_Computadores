<?php
$contagem_visitas = 0;
$arquivo_visitas = 'visitas.txt';

if (file_exists($arquivo_visitas)) {
    $contagem_visitas = (int) file_get_contents($arquivo_visitas);
}

$contagem_visitas++; // Incrementa a contagem

file_put_contents($arquivo_visitas, $contagem_visitas); // Salva a nova contagem

echo "Você é o visitante número " . $contagem_visitas;
?>
