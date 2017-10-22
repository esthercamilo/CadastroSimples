<?php
require 'db_config.php';


  $id  = $_POST["id"];
  $post = $_POST;

  $sql = "UPDATE pessoas SET nome = '".$post['nome']."'

    ,sobrenome = '".$post['sobrenome']."' 

    ,endereco = '".$post['endereco']."'

    WHERE id = '".$id."'";

  $result = $mysqli->query($sql);


  $sql = "SELECT * FROM pessoas WHERE id = '".$id."'"; 

  $result = $mysqli->query($sql);

  $data = $result->fetch_assoc();


echo json_encode($data);
?>
