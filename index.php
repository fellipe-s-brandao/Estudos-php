<?php
require_once "class/conexao.php";
$c = new Conexao;

$c->conectar("bd_noticias","localhost","root","");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Notícias.com</title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
  <header class="layout container row">
    <h2>Notícias.com</h2>
    <nav class="menu">
      <ul class="row">
        <li>
          <a class="btn" href="index.php">Pagina Inicial</a>
        </li>
        <li>
          <a class="btn" href="index.php?pag=cadastraNoticia">Cadastrar notícia</a>
        </li>
        <li>
          <a class="btn" href="index.php?pag=cadastraCategoria">Cadastrar categoria</a>
        </li>
      </ul>
    </nav>

    <div>
      <form action="index.php?pag=buscaNoticia" method="GET">
          <input type="text" placeholder="Buscar" name="buscar">
          <input  class="btn btn-busca" type="submit" value="Buscar">
      </form>
    </div>
  </header>
  
  <?php
    $pag = "";
    if(isset($_GET['pag'])){
      $pag = addslashes($_GET['pag']);
    }
    
    switch ($pag) {
      case 'cadastraNoticia':
        require 'paginas/cadastraNoticia.php';
        break;

      case 'cadastraCategoria':
        require 'paginas/cadastraCategoria.php';
        break;

      case 'buscaNoticia':
        require 'paginas/buscaNoticia.php';
        break;
      default:
        require 'paginas/home.php';
        break;
    }
  ?>


</body>
</html>