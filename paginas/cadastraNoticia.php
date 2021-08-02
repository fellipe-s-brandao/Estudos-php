<?php
require_once "./class/crud_categoria.php";
$c = new Crud_categoria;
$c->selecionar();

require_once "./class/crud_noticia.php";
$n = new Crud_noticia;

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Notícias .com</title>
</head>
<body>
<main class= "container">
  <h1 class="titulo">Cadastrar Notícias</h1>
    <section class = "conteudo">
      <form action="" method="POST">
        <input class="padrao_input" type="text" placeholder="Insira um título para a notícia" name="titulo">
        <textarea name="noticia" class="padrao_input" cols="30" rows="10" placeholder="Insira uma notícia"></textarea>
        <select name="categoria" class="padrao_input seleciona">
          <option value = "">Selecione uma categoria...</option>
          <?php
            global $categorias;
            foreach ($categorias as $cat) { 
                ?> <option name="categoria" value="<?php echo $cat['idcategoria'];?>" ><?php echo $cat['nome_categoria'];?></option> <?php 
            } 
          ?>      
        </select>
        <input class="btn btn-cadastro" type="submit" value="Cadastrar">
      </form>
    </section>

    <?php
      if(isset($_POST['titulo'])){
        $titulo = addslashes($_POST['titulo']);
        $noticia = addslashes($_POST['noticia']);
        $categoria = addslashes($_POST['categoria']);
        if(!empty($titulo)){
          if(!empty($noticia)){
            if(!empty($categoria)){
              if($n->cadastra($titulo,$noticia,$categoria)){
                echo "<h2 class='aviso verde'>Cadastrado com sucesso!</h2>";
              }else{
                echo "<h2 class='aviso vermelho'>Erro: Título já existe!</h2>";
              }
            }else{
              echo "<h2 class='aviso vermelho'>Selecione uma categoria!</h2>";
              echo "<h2 class='aviso vermelho'>Cadastre uma categoria se não houver nenhuma!</h2>";
            }
          }else{
            echo "<h2 class='aviso vermelho'>Insira uma notícia!</h2>";
          }
        }else{
          echo "<h2 class='aviso vermelho'>Insira um título para a notícia!</h2>";
        }
      }
    ?>
</body>
</html>

