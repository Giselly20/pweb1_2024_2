<?php
include"../DB.class.php";

    $db = new db('categoria');

    if(!empty($_POST) ){
        if(empty($_POST['id']) ){
            $db->insert($_POST);
            echo "<b>Resgistro inserido com sucesso</b>";
        }else {
            $db->update($_POST);
            echo "<b>Resgistro atualizado com sucesso</b>";
        }
        header("location: CategoriaList.php");
    }

    if(!empty($_GET['id'])){
        $data= $db->find($_GET['id']);
    }
?>
<form action="CategoriaForm.php" method="post">
    <h4>Formulário Categoria</h4>
    <input type="hidden" name="id" value="<?php echo $data->id ?? "" ?>">
    <label for="">Nome</label> <br>
    <input type="text" name="nome" value="<?php echo $data->nome ?? "" ?>"> <br>
    <button type="submit">Salvar</button>
    <a href='./CategoriaList.php'>Voltar</a>

</form>