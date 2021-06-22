<?php
include '../conexao.php';

$ideiaId = $_POST['id'];

$sql = "DELETE FROM ideia WHERE ideiaId = $ideiaId";

if(mysqli_query($conn, $sql)){
    echo "Registro inserido com sucesso";                
}else{
    echo "Erro ao inserir registro";
}

header('Location: ../crud.php');

?>