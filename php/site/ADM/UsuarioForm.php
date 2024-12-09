<?php
include"../DB.class.php";

    $db = new db('usuario');

    if(!empty($_POST) ){

        if($_POST['senha'] === $_POST['c_senha']){
            $_POST['senha'] = password_hash($_POST['senha'],PASSWORD_BCRYPT);
            unset($_POST['c_senha']);

            $db->insert($_POST);
            echo "<b>Resgistro inserido com sucesso</b>";
            header("location: post/PostList.php");
        }else{
            echo "<b style='color:red'>Senhas não coincidem!</b>";
        }
    }

?>
<form action="UsuarioForm.php" method="post">
    <h4>Formulário Usuario</h4>

    <input type="hidden" name="status" value="1">

    <label for="">Nome</label> <br>

    <input type="text" name="nome"> <br>

    <label for="">Login</label> <br>
    
    <input type="text" name="login"> <br>

    <label for="">Senha</label> <br>
    
    <input type="password" name="senha"> <br>

    <button type="submit">Salvar</button>
    <a href='./UsuarioList.php'>Voltar</a>

</form>