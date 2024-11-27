<?php
if (isset($_POST['submit'])) {
    // Definir o diretório de upload
    $uploadDir = '../../uploads/';  // Certifique-se de que o caminho esteja correto
    $fileName = $_FILES['image']['name'];  // Nome original da imagem
    $uploadFile = $uploadDir . basename($fileName);  // Caminho completo

    
    // Verificar se o diretório existe, se não, criar
    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    // Arquivo temporário
    $fileTemp = $_FILES['image']['tmp_name'];
    
    // Nome do arquivo original
    $fileName = $_FILES['image']['name'];
    
    // Caminho completo para salvar o arquivo
    $uploadFile = $uploadDir . basename($fileName);
    
    // Verificar se a imagem foi carregada corretamente
    if (move_uploaded_file($fileTemp, $uploadFile)) {
        echo "Imagem carregada com sucesso!";
        
        // Exibir a imagem
        echo "$uploadFile";
    } else {
        echo "Erro ao carregar a imagem!";
    }
}
session_start();
$_SESSION['image'] = $uploadFile;
header("Location: test.php");
exit();
?>