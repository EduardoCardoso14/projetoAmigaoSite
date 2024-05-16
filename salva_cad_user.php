<?php
session_start();
include('class.php');
include('banco.php');
$db = new banco;
if (isset($_POST['save'])) {
    $nome = $_POST['nome'];
    $login = $_POST['login'];
    $senha = $_POST['senha'];
    $date = new DateTime();
    $datas = $date->format('Y-m-d H:i:s');
    echo $datas;
    $teste = [
        'nome' => mysqli_real_escape_string($db->conn, $nome),
        'login' => mysqli_real_escape_string($db->conn, $login),
        'datas' => mysqli_real_escape_string($db->conn, $datas),
        'senha' => mysqli_real_escape_string($db->conn, $senha)
    ];
    $cadastrar =  new usuario;
    $resultado = $cadastrar->inserir($teste);
    if ($resultado == 1) {
        $_SESSION['message2'] = "Cadastrado com sucesso, " . $login;
        header('location: users.php');
    } else {
        $_SESSION['message2'] = "Não deu certo.";
        header('location: index.php');
    }
} else {
    $_SESSION['message2'] = "deu errado";
    header('location: index.php');
}
