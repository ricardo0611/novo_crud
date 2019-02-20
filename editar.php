<?php
include("database.php");

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM users WHERE id=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $nome = $row['nome'];
    $endereco = $row['endereco'];
    $telefone = $row['telefone'];
    $cidade = $row['cidade'];
  }
}

if (isset($_POST['editar'])) {
  $id = $_GET['id'];
  $nome = $_POST['nome'];
  $endereco = $_POST['endereco'];
  $telefone = $_POST['telefone'];
  $estado = implode(',', $_POST['estado']);
  $cidade = implode(',', $_POST['cidade']);

  $query = "UPDATE users set nome = '$nome', endereco = '$endereco', telefone = '$telefone', cidade = '$cidade', estado = '$estado' WHERE id=$id";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Dados atualizado com sucesso!';
  $_SESSION['message_type'] = 'warning';
  header('Location: index.php');
}

?>

<?php include('includes/header.php'); ?>
<div class="container p-4">
  <h4>Atualização de Cadastro</h4>
  <div class="row">
    <div class="col-md-12 mx-auto">
      <div class="card card-body">
      <form action="editar.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <div class="form-group">
          <label for="exampleFormControlSelect2">Nome Completo</label>
          <input name="nome" type="text" class="form-control" value="<?php echo $nome; ?>" placeholder="Atualizar nome">
        </div>

        <div class="form-group">
          <label for="exampleFormControlSelect2">Telefone</label>
          <input name="telefone" type="text" class="form-control" value="<?php echo $telefone; ?>" placeholder="Atualizar telefone">
        </div>

        <div class="form-group">
          <label for="exampleFormControlSelect2">Endereço</label>
          <textarea name="endereco" class="form-control" cols="30" rows="10"><?php echo $endereco;?></textarea>
        </div>

        <div class="form-group">
          <label for="exampleFormControlSelect2">Selecione seu Estado</label>
            <select class="form-control" id="exampleFormControlSelect2" name=estado[]>
              <option value="GO">GO</option>
              <option value="MA">MA</option>
              <option value="RJ">RJ</option>
              <option value="SP">SP</option>
            </select>
        </div>

        <div class="form-group">
          <label for="exampleFormControlSelect2">Selecione sua Cidade</label>
            <select class="form-control" id="exampleFormControlSelect2" name=cidade[]>
              <option value="Goiania">Goiânia</option>
              <option value="Maranhao">Imperatriz</option>
              <option value="Rio de Janeiro">Rio de Janeiro</option>
              <option value="Sao Paulo">São Paulo</option>
              <option value="Ap. de Goiania">Aparecida de Goiânia</option>
            </select>
        </div>

      
        <button style="width: 100%;" class="btn btn-success" name="editar">
          Atualizar
        </button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>
