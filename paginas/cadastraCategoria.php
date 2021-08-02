<?php
require_once "./class/crud_categoria.php";
$c = new Crud_categoria;

?>

<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Notícias .com</title>
  <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>
  <main class= "container">
  <h1 class="titulo">Cadastrar categoria</h1>
    <section class = "conteudo">
      <form action="" method="POST">
        <input class="categoria" type="text" placeholder="Insira uma categoria" name="categoria">
        <input class="btn btn-categoria" type="submit" value="Cadastrar">
      </form>
    </section>
    <?php
      if(isset($_POST['categoria'])){
        $cate = addslashes($_POST['categoria']);
        if(!empty($cate)){
          if($c->cadastrarCat($cate)){
            echo "<h2 class='aviso verde'>Cadastrado com sucesso!</h2>";  
          }else{
            echo "<h2 class='aviso vermelho'>Categoria já existe!</h2>";
          }
        }else{
          echo "<h2 class='aviso vermelho'>Insira uma categoria !</h2>";
        }
      }

    ?>

  </main>
  
</body>
</html>