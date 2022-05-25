<?php 
    include("Controller/index.php.inc");
    $xajax->printJavascript("./includes/");
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/index.css">
    <title>Calculadora online</title>
</head>
<body>
    <main>
        <form action="">
            <div id="resultado"></div>
            <div id="numeros">
                <input type="numeros" name="num1" class="input-numeros" id="num1">
                <input type="numeros" name="num2" class="input-numeros" id="num2">
            </div>
            <div id="operadores-container">
                <button class="btn-operadores" data-type="adicao" type="button" value="1"><img class="operadores" src="./assets/plus.svg"></button>
                <button class="btn-operadores" data-type="subtracao" type="button" value="2"><img class="operadores" src="./assets/minus.svg"></button>
                <button class="btn-operadores" data-type="multiplicacao" type="button" value="3"><img class="operadores" src="./assets/multiplus.svg"></button>
                <button class="btn-operadores" data-type="divisao" type="button" value="4"><img class="operadores" src="./assets/divider.svg"></button>
                <button onclick="calcular()" class="btn-operadores" id="btn-igual" type="button"><img class="operadores" src="./assets/equals.svg"></button>
            </div>
        </form>
    </main>
</body>
<script src="./js/scripts.js"></script>
</html>