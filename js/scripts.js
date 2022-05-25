const operadores = document.querySelectorAll('[data-type]')

let tipoCalculo = null
operadores.forEach(operador => {
    operador.addEventListener('click', event => {
        event.preventDefault();
        tipoCalculo = operador.value
    })
})

const calcular = () => {
    const num1 = document.getElementById('num1').value
    const num2 = document.getElementById('num2').value
    xajax_calcular(tipoCalculo, num1, num2)
}


