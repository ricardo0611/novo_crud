<?php

include("database.php");

if(isset($_GET['id'])) {
	filter_var($id, FILTER_SANITIZE_SPECIAL_CHARS);
  $id = $_GET['id'];
  $query = "DELETE FROM users WHERE id = $id";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Erro");
  }

  $_SESSION['message'] = 'O cadastro foi excluido com sucesso!';
  $_SESSION['message_type'] = 'danger';
  header('Location: index.php');
}

?>
