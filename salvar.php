<?php

include("database.php");

if (isset($_POST['salvar'])) {
  $nome = $_POST['nome'];
  $endereco = $_POST['endereco'];
  $telefone = $_POST['telefone'];
  $estado = implode(',', $_POST['estado']);
  $cidade = implode(',', $_POST['cidade']);


  if (!$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS)) {
      $_SESSION['message'] = 'O campo nome não pode ser vazio.';
  }

  if (!$endereco = filter_input(INPUT_POST, 'endereco', FILTER_SANITIZE_SPECIAL_CHARS)) {
      $_SESSION['message'] = 'O campo endereço não pode ser vazio.';
  }
  
  $query = "INSERT INTO users(nome, endereco, telefone, cidade, estado) 
  VALUES ('$nome', '$endereco', '$telefone', '$cidade', '$estado')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Erro de SQL.");
  }

  $_SESSION['message'] = 'Cadastro criado com sucesso!';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php');

}

?>
