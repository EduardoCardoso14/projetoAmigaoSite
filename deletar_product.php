<?php
session_start();
include('class.php');
include('banco.php');
$db = new banco;
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $date = new DateTime();
    $datas = $date->format('Y-m-d H:i:s');
    echo $datas;
    $teste = [
        'id' => mysqli_real_escape_string($db->conn, $id),
        'datas' => mysqli_real_escape_string($db->conn, $datas)
    ];
    $deletarss =  new produto;
    $resultado = $deletarss->deletar($teste);
    if ($resultado == 1) {
        $_SESSION['message4'] = "Deletado produto, id = " . $id;
        header('location: products.php');
    } else {
        $_SESSION['message4'] = "Não deu certo.";
        header('location: index.php');
    }
} else {
    $_SESSION['message2'] = "deu errado";
    header('location: index.php');
}
