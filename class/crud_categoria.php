<?php

Class Crud_categoria{
    public function cadastrarCat($nome){
        global $pdo;
        $sql = $pdo->prepare("SELECT*FROM categoria WHERE nome_categoria= :e");
        $sql->bindValue(":e", $nome);
        $sql->execute();

        if($sql->rowCount() > 0){
            return false;//ja existe essa categoria
        }else{
            $sql = $pdo->prepare("INSERT INTO categoria (nome_categoria) VALUES(:e)");
            $sql->bindValue(":e", $nome);
            $sql->execute();
            return true; //casdastrou
        }
    }

    public function deletarCat($nome){
        global $pdo;
        $sql = $pdo->prepare("SELECT*FROM categoria WHERE nome_categoria= :e");
        $sql->bindValue(":e", $nome);
        $sql->execute();

        if($sql->rowCount() > 0){
            $dado = $sql->fecth();

            $sql = $pdo->prepare("DELETE FROM categoria WHERE idcategoria= :id");
            $sql->bindValue(":id", $dado['idcategoria']);
            $sql->execute(); 
            return true;
        }else{
            return false;//nao existe essa categoria
        }
    }

    public function atualizar($nome,$id){
        global $pdo;
        $sql = $pdo->prepare("UPDATE categoria SET nome_categoria= :e WHERE idcategoria= :id");
        $sql->bindValue(":e", $nome);
        $sql->bindValue(":id", $id);
        $sql->execute();
    }

    public function selecionar(){
        global $pdo;
        $sql = $pdo->prepare("SELECT*FROM categoria");
        $sql->execute();

        if($sql->rowCount() > 0){
            global $categorias;
            
            while($dado = $sql->fetch()){
                $categorias[] = $dado;
            }

            return true;
        }else{
            return false;//categoria vazia
        }
    }

    public function selecionarId($id){
        global $pdo;
        $sql = $pdo->prepare("SELECT*FROM categoria WHERE idcategoria= :id");
        $sql->bindValue(":id", $id);
        $sql->execute();

        if($sql->rowCount() > 0){
            global $cat;
            $dado = $sql->fetch();
            $cat = $dado;

            return true;
        }else{
            return false;//categoria vazia
        }
    }

}

?>