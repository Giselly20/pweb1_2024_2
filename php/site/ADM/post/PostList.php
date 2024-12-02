<?php
include"../DB.class.php";

    $db = new db('post');
    $dados = $db->all();

    if(!empty($_GET['id'])){
        $db->destroy($_GET['id']);
        header('Location:PostList.php');
    }

    if(!empty($_POST)){
        $dados=$db->search($_POST);
    }else{
        $dados=$db->all();
    }

?>
<h4>Listagem de Posts</h4>

<form action="./PostList.php" method="post">

    <div>
        <select name="tipo">
            <option value="nome">Nome</option>
        </select>
        <input type="text" name="valor">
        <button type="submit">Buscar</button>
    </div>

</form>

<a href='./PostForm.php?'>Cadastrar</a><br>
<table>
    <thead>
        <th>ID</th>
        <th>Titulo</th>
        <th>Data Publicação</th>
        <th>Status</th>
        <th>Categoria</th>
        <th>Ação</th>
        <th>Ação</th>
    </thead>
    <tboby>
        <tr>
            <?php
                foreach ($dados as $item){

                    $categoria = $db->find("categoria",$item->categoria_id);

                    echo "
                    <tr>
                        <td>$item->id</td>
                        <td>$item->titulo</td>
                        <td>$item->data_publicacao</td>
                        <td>$item->status</td>
                        <td>$item->categoria_id</td>
                        <td><a href='./PostForm.php?id=$item->id'>Editar</td>
                        <td><a onclick='return confirm(\"Deseja Excluir? \")' href='./PostList.php?id=$item->id'>Deletar</td>
                    </tr>
                    ";
                }
            ?>
        </tr>
    </tboby>
</table>