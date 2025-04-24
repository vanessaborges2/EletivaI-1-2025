<?php
  require_once("cabecalho.php");

  function retornaCategorias(){
    require("conexao.php");
    try{
      $sql = "SELECT * from categoria";
      $stmt = $pdo->query($sql);
      return $stmt->fetchAll();
    } catch (Exception $e){
      die("Erro ao consultar as categorias: ". $e->getMessage());
    }
  }

  $categorias = retornaCategorias();

?>

<h2>Categorias</h2>
<a href="nova_categoria.php" class="btn btn-success mb-3">Novo Registro</a>

<?php
    if (isset($_GET['cadastro']) && $_GET['cadastro'] == true){
      echo '<p class="text-success">Registro salvo com sucesso!</p>';
    } elseif (isset($_GET['cadastro']) && $_GET['cadastro'] == false){
      echo '<p class="text-danger">Erro ao inserir o registro!</p>';
    }
?>

<table class="table table-hover table-striped" id="tabela">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php
          foreach($categorias as $c):
        ?>
            <tr>
                <td><?= $c['id'] ?></td>
                <td><?= $c['nome'] ?></td>
                <td>
                    <a href="editar_categoria.php?id=<?= $c['id'] ?>" class="btn btn-warning">Editar</a>
                    <a href="consultar_categoria.php?id=<?= $c['id'] ?>" class="btn btn-info">Consultar</a>
                </td>
            </tr>
        <?php
          endforeach;
        ?>
    </tbody>
</table>
                
<?php
  require_once("rodape.php");
?>