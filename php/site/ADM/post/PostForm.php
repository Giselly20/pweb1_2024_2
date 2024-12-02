<?php
include "../DB.class.php";

$db = new db('post');
$categorias = $db->all('categoria');

// var_dump($categorias);
//exit;

if (!empty($_POST)) {
    if (empty($_POST['id'])) {
        $db->insert($_POST);
        echo "<b>Resgistro inserido com sucesso</b>";
    } else {
        $db->update($_POST);
        echo "<b>Resgistro atualizado com sucesso</b>";
    }
     header("location: PostList.php");
}

if (!empty($_GET['id'])) {
    $data = $db->find($_GET['id']);
}
?>
<form action="PostForm.php" method="post">
    <h4>Formulário Post</h4>
    <input type="hidden" name="id" value="<?php echo $data->id ?? "" ?>">
    <label for="">Titulo</label> <br>
    <input type="text" name="titulo"
        value="<?php echo $data->titulo ?? "" ?>"> <br>

    <label for="">Data Publicação</label> <br>
    <input type="datetime-local" name="data_publicacao"
        value="<?php echo $data->data_publicacao ?? "" ?>"> <br>

    <label for="">Status</label> <br>
    <select name="status">
        <option value="<?php echo $data->status ?? "Sim" ?>">
            SIM </option>
        <option value="<?php echo $data->status ?? "Não" ?>">
            NÃO </option>
    </select> <br>

    <label for="">Categoria</label> <br>
    <select name="categoria_id">
        <?php
        foreach ($categorias as $categoria) {
            echo "<option value ='$categoria->id'>$categoria->nome</option>";
        }
        ?>
    </select> <br>

    <label for="">Texto</label> <br>
    <textarea name="texto" rows="4">
        <?php echo $data->texto ?? "" ?>
    </textarea><br>

    <button type="submit">Salvar</button>
    <a href='./PostList.php'>Voltar</a>

</form>