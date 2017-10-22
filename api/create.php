<?php
require 'db_config.php';

  $post = $_POST;

  $sql = "INSERT INTO pessoas (nome,sobrenome, endereco) 

	VALUES ('".$post['nome']."','".$post['sobrenome']."','".$post['endereco']."')";


  $result = $mysqli->query($sql);


  $sql = "SELECT * FROM pessoas Order by nome desc LIMIT 1"; 

  $result = $mysqli->query($sql);

  $data = $result->fetch_assoc();


echo json_encode($data);
?>
