<?php include("database.php"); ?>

<?php include('includes/header.php'); ?>

<main class="container p-4">
  <div class="row">

    <div class="col-md-12">
      <!-- MESSAGES -->
      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>
      <a style="margin-bottom: 10px;" class="btn btn-outline-success" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
      Cadastrar
      </a>
      <!-- ADD TASK FORM -->
      <div class="collapse card card-body" id="collapseExample">
        <form id="myform" action="salvar.php" method="POST">
          <div class="form-group">
            <input type="text" name="nome" class="form-control" placeholder="Nome completo" autofocus required="">
          </div>

          <div class="form-group">
            <input type="tel" name="telefone" class="form-control" placeholder="Telefone" autofocus required="">
          </div>

          <div class="form-group">
            <textarea name="endereco" rows="2" class="form-control" placeholder="Endereço" required=""></textarea>
          </div>

          <div class="form-group">
            <label for="exampleFormControlSelect2">Selecione sua Cidade</label>
              <select multiple class="form-control" id="exampleFormControlSelect2" name=cidade[]>
                <option value="Goiania">Goiânia</option>
                <option value="Imperatriz">Imperatriz</option>
                <option value="Rio de Janeiro">Rio de Janeiro</option>
                <option value="Sao Paulo">São Paulo</option>
                <option value="Aparecida de Goiânia">Aparecida de Goiânia</option>
              </select>
          </div>

          <div class="form-group">
            <label for="exampleFormControlSelect2">Selecione seu Estado</label>
              <select multiple class="form-control" id="exampleFormControlSelect2" name=estado[] required="">
                <option value="GO">GO</option>
                <option value="MA">MA</option>
                <option value="RJ">RJ</option>
                <option value="SP">SP</option>
              </select>
          </div>

        <input type="submit" id="register" name="salvar" class="btn btn-success btn-block" value="Salvar">
        </form>
      </div>


    </div>
    <div class="col-md-12">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Nome</th>
            <th>Endereço</th>
            <th>Telefone</th>
            <th>Cidade</th>
            <th>Estado</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM users";
          $result_users = mysqli_query($conn, $query); 
  

          while($row = mysqli_fetch_assoc($result_users)) { ?>
          <tr>
            <td><?php echo $row['nome']; ?></td>
            <td><?php echo $row['endereco']; ?></td>
            <td><?php echo $row['telefone']; ?></td>
            <td><?php echo $row['cidade']; ?></td>
            <td><?php echo $row['estado']; ?></td>
            <td>
              <a href="editar.php?id=<?php echo $row['id']?>" class="btn btn-outline-primary">
                <i class="fas fa-marker"></i>&nbsp;Editar
              </a>
              
              <a href="deletar.php?id=<?php echo $row['id']?>" class="btn btn-outline-danger">
                <i class="far fa-trash-alt"></i>&nbsp;Excluir
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<?php include('includes/footer.php'); ?>
