<?php
session_start();
include('class.php');
include('banco.php');
$db = new banco;
if (isset($_POST['save'])) {
    echo "<pre>";
    print_r($_POST);
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $login = $_POST['login'];
    $senha = $_POST['senha'];
    $date = new DateTime();
    $datas = $date->format('Y-m-d H:i:s');
    echo $datas;
    $teste = [
        'id' => mysqli_real_escape_string($db->conn, $id),
        'nome' => mysqli_real_escape_string($db->conn, $nome),
        'login' => mysqli_real_escape_string($db->conn, $login),
        'datas' => mysqli_real_escape_string($db->conn, $datas),
        'senha' => mysqli_real_escape_string($db->conn, $senha)
    ];
    $atualizar =  new usuario;
    $resultado = $atualizar->atualizar_cad_user($teste);
    if ($resultado == 1) {
        $_SESSION['message10'] = "Atualizado com sucesso, " . $login;
        header('location: profile.php');
    } else {
        $_SESSION['message10'] = "Não deu certo.";
        header('location: index.php');
    }
} else {
    $_SESSION['message2'] = "deu errado";
    header('location: index.php');
}
