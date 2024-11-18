<?php
include"../DB.class.php";

    $db = new db();
    $dados = $db->all();
?>

<table>
    <thead>
        <th>ID</th>
        <th>Nome</th>
    </thead>
    <tboby>
        <tr>
            <?php
                foreach ($dados as $item){
                    echo "
                        <td>$item->id</td>
                        <td>$item->nome</td>
                    ";
                }
            ?>
        </tr>
    </tboby>
</table>