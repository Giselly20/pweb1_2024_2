<?php
include"../DB.class.php";

    $db = new db('categoria');
    $dados = $db->all();

    if(!empty($_GET['id'])){
        $db->destroy($_GET['id']);
        header('Location:CategoriaList.php');
    }

    if(!empty($_POST)){
        $dados=$db->search($_POST);
    }else{
        $dados=$db->all();
    }

?>
<h4>Listagem de Categorias</h4>

<form action="./CategoriaList.php" method="post">

    <div>
        <select name="tipo">
            <option value="nome">Nome</option>
        </select>
        <input type="text" name="valor">
        <button type="submit">Buscar</button>
    </div>

</form>

<a href='./CategoriaForm.php?'>Cadastrar</a><br>
<table>
    <thead>
        <th>ID</th>
        <th>Nome</th>
        <th>Ação</th>
        <th>Ação</th>
    </thead>
    <tboby>
        <tr>
            <?php
                foreach ($dados as $item){
                    echo "
                    <tr>
                        <td>$item->id</td>
                        <td>$item->nome</td>
                        <td><a href='./PostForm.php?id=$item->id'>Editar</td>
                        <td><a onclick='return confirm(\"Deseja Excluir? \")' href='./PostList.php?id=$item->id'>Deletar</td>
                    </tr>
                    ";
                }
            ?>
        </tr>
    </tboby>
</table>