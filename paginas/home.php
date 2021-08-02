<?php
require_once "./class/crud_categoria.php";
$c = new Crud_categoria;

?>
<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notícias.com</title>
</head>
<body>
    <main class= "container">
    <h1 class="titulo">Notícias</h1>
        <section class = "painel_noticias row">
            <?php
                $sql = $pdo->prepare("SELECT*FROM noticias ORDER BY idnoticias DESC");
                $sql->execute();
                
                
                if($sql->rowCount() > 0){
                    while($dado = $sql->fetch()){
                        $noticiaCompleta[] = $dado;
                    }
                        
                    global $cat;
                    
                    foreach($noticiaCompleta as $noti){
                        $c->selecionarId($noti['idcategoria']);
                        ?><div class='noticia'>
                            <h2><?php echo $noti['titulo_noticia'] ?></h2>
                            <h3><?php echo $cat['nome_categoria'] ?></h3>
                            <p><?php echo $noti['noticia'] ?></p>
                        </div><?php
                        
                    }
                }      
            ?>

        </section>
    </main>    
</body>
</html>