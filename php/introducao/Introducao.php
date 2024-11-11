<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    //ex01 ola mundo
    $nome = "Giselly";
    $idade = 21;
        echo "Olá Mundo!".$nome."<br> Idade: ".$idade;
        //ex02 if maior de idade
        if($idade < 18){
            echo "<br> Menor";
             } else {
                echo "<br> Maior";
             }
        //ex03 vetor de string
        $pessoas = [
            "<br>Lucas,"," Yuri e"," Eduardo"
        ];

        for($i = 0; $i<count($pessoas); $i++){
            echo $pessoas[$i];
        }
        //ex04 vetor de int
        $idade = [10,18,21];

        foreach ($idade as $item){
            if($item>=18)
                echo "<br>".$item;
        }
        //ex05 calculadora switch case

        $num = 10;
        $num2 = 5;
        $expressao = "4";
        switch ($expressao) {
            case 1:
                echo "<br>".$num+$num2;
            break;
            case 2:
                echo "<br>".$num-$num2;
            break;
            case 3:
                echo "<br>".$num*$num2;
            break;
            case 4:
                echo "<br>".$num/$num2;
            break;
            default:
                echo "<br> ERRO!!!!!!!!!!!!";
        }    
    ?>
</body>
</html>