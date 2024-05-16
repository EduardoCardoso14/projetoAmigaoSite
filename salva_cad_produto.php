<?php
session_start();
include('class.php');
include('banco.php');
$db = new banco;
if (isset($_POST['save'])) {
    $nome = $_POST['nome'];
    $valor = $_POST['valor'];
    $imagem = $_POST['imagem'];
    $quantidade = $_POST['quantidade'];
    $date = new DateTime();
    $datas = $date->format('Y-m-d H:i:s');
    echo $datas;
    $teste = [
        'nome' => mysqli_real_escape_string($db->conn, $nome),
        'valor' => mysqli_real_escape_string($db->conn, $valor),
        'imagem' => mysqli_real_escape_string($db->conn, $imagem),
        'quantidade' => mysqli_real_escape_string($db->conn, $quantidade),
        'datas' => mysqli_real_escape_string($db->conn, $datas),
    ];
    $cadastrar =  new produto;
    $resultado = $cadastrar->inserir($teste);
    if ($resultado == 1) {
        $_SESSION['message2'] = "Cadastrado com sucesso, " . $nome;
        header('location: products.php');
    } else {
        $_SESSION['message2'] = "Não deu certo.";
        header('location: index.php');
    }
} else {
    $_SESSION['message2'] = "deu errado";
    header('location: index.php');
}
