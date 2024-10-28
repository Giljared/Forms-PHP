// Exemplo de script PHP para processar o formulário
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $mensagem = $_POST['mensagem'];

  // Lógica para enviar o e-mail ou salvar os dados em um banco de dados
}
?>