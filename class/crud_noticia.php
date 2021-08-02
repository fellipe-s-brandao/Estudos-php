<?php

Class Crud_noticia{
    public function cadastra($titulo,$noticia,$idCat){
        global $pdo;
        $sql = $pdo->prepare("SELECT*FROM noticias WHERE titulo_noticia= :t");
        $sql->bindValue(":t",$titulo);
        $sql->execute();

        if($sql->rowCount() > 0){
            return false;//noticia com mesmo titulo
        }else{
            $sql = $pdo->prepare("INSERT INTO noticias (idcategoria,noticia,titulo_noticia) VALUES (:id,:n,:t)");
            $sql->bindValue(":id",$idCat);
            $sql->bindValue(":n",$noticia);
            $sql->bindValue(":t",$titulo);
            $sql->execute();
            return true;
        }
    }
}   

?>