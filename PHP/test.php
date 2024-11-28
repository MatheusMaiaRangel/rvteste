<?php
session_start();
$uploadFile = $_SESSION['image'];
echo"<div class='box' id='imagePreview'><img src='$uploadFile' alt='Imagem Carregada' style='max-width:300px; margin-top:10px;' /></div>";
?>