# Forms-PHP
Criando um formulário PHP

## FORMULÁRIO em PHP com um guia passo a passo, incluindo todas as integrações para configurá-lo em um repositório no GitHub.

#### 1. Estrutura do Projeto no GitHub
Crie o Repositório no GitHub:

No GitHub, vá até "New Repository" e crie um novo repositório com o nome desejado (por exemplo, php-formulario-projeto).
Adicione um arquivo .gitignore para PHP, marcando opções para excluir arquivos desnecessários como cache e dependências específicas.
Clone o repositório para o seu ambiente local.
Estrutura de Pastas e Arquivos do Projeto:

No seu projeto local, crie a seguinte estrutura de pastas e arquivos:

php-formulario-projeto/
├── index.php
├── process_form.php
├── style.css
├── config/
│   └── db.php
└── README.md

#### 2. Criação do Formulário (index.php)
Abra o arquivo index.php e insira o código HTML e PHP para o formulário:

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Formulário de Projeto</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Formulário de Contato</h2>
    <form action="process_form.php" method="POST">
        <label for="name">Nome:</label>
        <input type="text" id="name" name="name" required><br><br>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>
        
        <label for="message">Mensagem:</label>
        <textarea id="message" name="message" required></textarea><br><br>
        
        <button type="submit">Enviar</button>
    </form>
</body>
</html>


#### 3. Configuração do Banco de Dados (config/db.php)
No arquivo db.php, insira o código para conectar o PHP ao banco de dados MySQL.

<?php
$host = 'localhost';
$db_name = 'nome_do_banco';
$username = 'usuario';
$password = 'senha';

try {
    $conn = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo 'Erro: ' . $e->getMessage();
}
?>


### Dica: Adapte as configurações host, db_name, username e password conforme necessário.

#### 4. Processamento do Formulário (process_form.php)
No arquivo process_form.php, insira o código para processar e armazenar os dados no banco de dados.

<?php
require 'config/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $query = "INSERT INTO contacts (name, email, message) VALUES (:name, :email, :message)";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':message', $message);

    if ($stmt->execute()) {
        echo "Mensagem enviada com sucesso!";
    } else {
        echo "Erro ao enviar a mensagem.";
    }
}
?>




#### 5. Arquivo de Estilos (style.css)
O arquivo style.css melhora o design básico do formulário. Insira o CSS para estilização:

body {
    font-family: Arial, sans-serif;
    display: flex;
    flex-direction: column;
    align-items: center;
}

h2 {
    color: #333;
}

form {
    width: 300px;
    padding: 20px;
    border: 1px solid #ddd;
    background-color: #f9f9f9;
}

label, input, textarea {
    display: block;
    width: 100%;
    margin-top: 10px;
}

button {
    margin-top: 20px;
    padding: 10px;
    background-color: #28a745;
    color: white;
    border: none;
    cursor: pointer;
}


#### 6. Criação do Banco de Dados
No MySQL, crie o banco de dados e a tabela para armazenar os dados do formulário.

CREATE DATABASE nome_do_banco;
USE nome_do_banco;

CREATE TABLE contacts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50),
    email VARCHAR(100),
    message TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


git add .
git commit -m "Primeira versão do formulário PHP"
git push origin main


#### 7. Adicionando Arquivos e Fazendo Commit no Git
No terminal, dentro do diretório do projeto, execute os seguintes comandos:

git add .
git commit -m "Primeira versão do formulário PHP"
git push origin main


#### 8. Atualização do README.md
Edite o arquivo README.md para incluir uma descrição do projeto e instruções de instalação, como dependências e configurações.

# Projeto de Formulário em PHP

Este projeto é um formulário simples em PHP para envio e armazenamento de mensagens.

## Configuração

1. Clone o repositório.
2. Configure o banco de dados em `config/db.php`.
3. Crie a tabela de contatos conforme descrito.
4. Execute o projeto em um servidor local ou com um software como XAMPP.

## Estrutura

- `index.php`: Página do formulário.
- `process_form.php`: Processamento do formulário.
- `config/db.php`: Configurações de conexão ao banco de dados.
- `style.css`: Estilos para o formulário.


#### 9. Teste e Deploy
Teste o formulário localmente: Use um servidor local (como o XAMPP) para verificar se o envio de dados está funcionando.
Configuração para Produção (Opcional): Configure o servidor de produção para conexões seguras e revise as permissões de banco de dados.
Atualize o Repositório GitHub: Faça commits regulares para manter o código atualizado no repositório.

### Considerações Finais
Pronto! Agora você tem um projeto de formulário em PHP no GitHub, com todas as integrações necessárias para armazenamento em banco de dados e interface básica.








