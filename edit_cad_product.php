<?php
session_start();
include('class.php');
include('banco.php');
$db = new banco;
if (isset($_POST['save'])) {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $valor = $_POST['valor'];
    $imagem = $_POST['imagem'];
    $quantidade = $_POST['quantidade'];
    $date = new DateTime();
    $datas = $date->format('Y-m-d H:i:s');
    echo $datas;
    $teste = [
        'id' => mysqli_real_escape_string($db->conn, $id),
        'nome' => mysqli_real_escape_string($db->conn, $nome),
        'valor' => mysqli_real_escape_string($db->conn, $valor),
        'imagem' => mysqli_real_escape_string($db->conn, $imagem),
        'quantidade' => mysqli_real_escape_string($db->conn, $quantidade),
        'datas' => mysqli_real_escape_string($db->conn, $datas),
    ];
    $atualizar =  new produto;
    $resultado = $atualizar->atualizar_cad_produto($teste);
    if ($resultado == 1) {
        $_SESSION['message11'] = "Atualizado com sucesso, " . $nome;
        $_SESSION['idp'] = $id;
        header('location: product_edit.php');
    } else {
        $_SESSION['message10'] = "Não deu certo.";
        header('location: index.php');
    }
} else {
    $_SESSION['message2'] = "deu errado";
    header('location: index.php');
}
