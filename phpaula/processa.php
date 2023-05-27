<?php 
session_start();

include_once("conexao.php");
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);

$result_usuario = "INSERT INTO usuarios(nome, email, cpf,created) values('$nome', '$email','$cpf', NOW())";
$resultado_usuario = mysqli_query($conn, $result_usuario);

if (mysqli_insert_id($conn)) {
    $_SESSION['msg'] = "<div class='alert alert-success' role='alert'>
    Cadastrado com sucesso
  </div>";
  header("location: cadastrocliente.php");
} else {
    $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>
    Erro ao cadastrar
  </div>";}
  header("location: cadastrocliente.php");
?>