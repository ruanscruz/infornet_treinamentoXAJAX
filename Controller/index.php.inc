<?php

require_once("./includes/xajax.inc.php");
$xajax = new xajax("", "xajax_", 'ISO-8859-1');

function calcular($tipoCalculo, $num1, $num2)
{
    $response = new xajaxResponse('ISO-8859-1');
    switch ($tipoCalculo) {
        case 1 : $resultado = somar($num1, $num2); break;
        case 2: $resultado = subtrair($num1, $num2); break;
        case 3: $resultado = multiplicar($num1, $num2); break;
        case 4: $resultado = dividir($num1, $num2); break;
    }

    resultado($resultado, $response);
    return $response->getXML();
}

function somar($num1, $num2)
{
    return $num1 + $num2;
}

function subtrair($num1, $num2)
{
    return $num1 - $num2;
}


function multiplicar($num1, $num2)
{
    return $num1 * $num2;
}

function dividir($num1, $num2)
{
    return $num1 * $num2;
}

function resultado($resultado, $response)
{
    $response->addScript("document.getElementById('resultado').innerHTML = `$resultado`;");
}

$xajax->registerFunction("calcular");
$xajax->registerFunction("somar");
$xajax->registerFunction("subtrair");
$xajax->registerFunction("multiplicar");
$xajax->registerFunction("dividir");
$xajax->registerFunction("resultado");
$xajax->processRequests();
?>