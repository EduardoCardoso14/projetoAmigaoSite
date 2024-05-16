<?php
class usuario
{
    public $conn;
    public function __construct()
    {
        $db = new banco;
        $this->conn = $db->conn;
    }

    public function inserir($teste)
    {
        $nome = $teste['nome'];
        $login = $teste['login'];
        $datas = $teste['datas'];
        $senha = $teste['senha'];

        $sql = "INSERT INTO usuario (nome,login,senha,data_cad,apagado) VALUES 
        ('" . $nome . "','" . $login . "','" . $senha . "','" . $datas . "',0)";
        $result = $this->conn->query($sql);
        if ($result == 1) {
            //echo "ok";
            return true;
        } else {
            //echo "nok";
            return false;
        }
    }
    public function atualizar_cad_user($teste)
    {
        $id = $teste['id'];
        $nome = $teste['nome'];
        $login = $teste['login'];
        $datas = $teste['datas'];
        $senha = $teste['senha'];
        echo $sql = "UPDATE usuario SET nome='" . $nome . "', login='" . $login . "', data_edicao='" . $datas . "', senha='" . $senha . "' WHERE id='" . $id . "'";
        $result = $this->conn->query($sql);
        if ($result == 1) {
            //echo "ok";
            return true;
        } else {
            //echo "nok";
            return false;
        }
    }
    public function validar($inputData)
    {
        $login = $inputData['login'];
        $senha = $inputData['senha'];

        echo $sql = "select * from usuario where login='" . $login . "' and senha='" . $senha . "' and apagado = 0 or nome='" . $login . "' and senha='" . $senha . "' and apagado = 0";
        $result = $this->conn->query($sql);
        $linha = $result->fetch_array();
        $result = $result->num_rows;

        if ($result == 1) {
            $_SESSION["nome"] = $linha['nome'];
            return true;
        } else {
            echo "n salvou";
            return false;
        }
    }

    public function pegar_user($login)
    {
        $xpto = "select * from usuario where nome='" . $login . "' or login='" . $login . "' and apagado = 0";
        $dados = $this->conn->query($xpto);
        return $dados;
    }

    public function buscar_um_usuario($search)
    {
        $xpto = "select * from usuario where nome like '%" . $search . "%' and apagado = 0";
        $dados = $this->conn->query($xpto);
        return $dados;
    }

    public function contar()
    {
        $sql = "select count(*) as contador from usuario";
        $resultado = $this->conn->query($sql);
        return $resultado;
    }

    public function deletar($teste)
    {
        $id = $teste['id'];
        $datas = $teste['datas'];
        $apagar = 1;

        $sql = "update usuario set apagado='" . $apagar . "', data_delete='" . $datas . "' where id='" . $id . "' ";
        $result = $this->conn->query($sql);

        if ($result == 1) {
            //echo "ok";
            return true;
        } else {
            //echo "nok";
            return false;
        }
    }

    public function listar()
    {
        $sql = "SELECT * FROM usuario WHERE apagado = 0";
        $resultado = $this->conn->query($sql);
        return $resultado;
    }
}
class produto
{
    public $conn;
    public function __construct()
    {
        $db = new banco;
        $this->conn = $db->conn;
    }
    public function inserir($teste)
    {
        $nome = $teste['nome'];
        $valor = $teste['valor'];
        $imagem = $teste['imagem'];
        $quantidade = $teste['quantidade'];
        $datas = $teste['datas'];

        $sql = "INSERT INTO produto (nome,valor,imagem,quantidade,tempo, apagado) VALUES 
        ('" . $nome . "','" . $valor . "','" . $imagem . "','" . $quantidade . "','" . $datas . "',0)";
        $result = $this->conn->query($sql);
        if ($result == 1) {
            //echo "ok";
            return true;
        } else {
            //echo "nok";
            return false;
        }
    }

    public function deletar($teste)
    {
        $id = $teste['id'];
        $datas = $teste['datas'];
        $apagar = 1;

        $sql = "update produto set apagado='" . $apagar . "', dt_delete='" . $datas . "' where id='" . $id . "' ";
        $result = $this->conn->query($sql);

        if ($result == 1) {
            //echo "ok";
            return true;
        } else {
            //echo "nok";
            return false;
        }
    }
    public function atualizar_cad_produto($teste)
    {
        $id = $teste['id'];
        $nome = $teste['nome'];
        $valor = $teste['valor'];
        $imagem = $teste['imagem'];
        $quantidade = $teste['quantidade'];
        $datas = $teste['datas'];
        echo $sql = "UPDATE produto SET nome='" . $nome . "', valor='" . $valor . "', imagem='" . $imagem . "', quantidade='" . $quantidade . "', dt_edicao='" . $datas . "' WHERE id='" . $id . "'";
        $result = $this->conn->query($sql);
        if ($result == 1) {
            //echo "ok";
            return true;
        } else {
            //echo "nok";
            return false;
        }
    }

    public function listaratualizados1()
    {
        $sql = "select * from produto where apagado = 0 order by tempo desc limit 8";
        $resultado = $this->conn->query($sql);
        return $resultado;
    }
    public function listaratualizados2()
    {
        $sql = "select * from produto where apagado = 0 order by dt_edicao desc limit 8";
        $resultado = $this->conn->query($sql);
        return $resultado;
    }
    public function contar()
    {
        $sql = "select count(*) as contador from produto where apagado=0";
        $resultado = $this->conn->query($sql);
        return $resultado;
    }

    public function criar($inputData)
    {
        $nome = $inputData['nome'];
        $login = $inputData['login'];
        $senha = $inputData['senha'];
        $cargo = $inputData['cargo'];

        echo  $sql = "INSERT INTO usuario (nome,login,senha,idcargo) VALUES 
        ('$nome','$login','$senha','$cargo')";
        $result = $this->conn->query($sql);

        if ($result == 1) {
            //echo "ok";
            return true;
        } else {
            //echo "nok";
            return false;
        }
    }

    public function buscar_um_produto($search)
    {
        $xpto = "select * from produto where nome like '%" . $search . "%'";
        $dados = $this->conn->query($xpto);
        return $dados;
    }

    public function pegar_produto($id)
    {
        $xpto = "select * from produto where id = '" . $id . "' and apagado=0";
        $dados = $this->conn->query($xpto);
        return $dados;
    }

    public function listar()
    {
        $sql = "SELECT * FROM produto WHERE apagado = 0";
        $resultado = $this->conn->query($sql);
        return $resultado;
    }
}
