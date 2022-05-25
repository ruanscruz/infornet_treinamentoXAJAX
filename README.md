-- > XAJAX < -- <br><br>
O xajax é um framework php que permite a comunicação do frontend com o backend de maniera simplificada, sem a necessidade de se fazer o submit e recargas de página, sendo uma opção para a criação de SPA (Single page application). <br>
<br>
1 - Estrutura do projeto
<br>
Para utilizar o xajax é necessário importar para o projeto, toda sua estrutura, ou seja, todos os arquivos que contém suas funções e dependências. <br>

1º - Criar uma pasta includes armazenando os seguintes arquivos:<br>
`xajax_js`<br>
  `-- xajax.js`<br>
  `-- xajax_uncompressed.js`<br>
`xajax.inc.php`<br>
`xajaxCompress.php` <br>
`xajaxResponse.inc.php` <br>

2º - Tendo em vista que o xajax é um framework que facilita a intemediação do frontend com o backend, criaremos uma pasta "Controller", que terão os arquivos que de fato intregrarão o front e back. Por convenção o arquivo terá o mesmo nome do arquivo da view, sendo diferenciado pela extensão 'inc' ao final. <br>
3º - Estrutura final simplificada: <br>
`raiz_projeto`<br>
`- controllers`<br>
`- -- index.php.inc`<br>
`- includes`<br>
`- -- xajax_js`<br>
`- -- - xajax.js`<br>
`- -- - xajax_uncompressed.js`<br>
`- -- xajax.inc.php`<br>
`- -- xajaxCompress.php`<br>
`- -- xajaxResponse.inc.php`<br>
`- index.php`<br>

2 - Utilizando o XAJAX
<br><br>
2.1 - Parâmetros base
<br>

1º - No arquivo de controler (index.php.inc), a variável global do xajax deverá ser inicializada. A partir dela é que teremos acesso as principais funcionalidades que o framework proporciona. <br>
`require_once("./includes/xajax.inc.php");`<br>
`$xajax = new xajax("", "xajax_", 'ISO-8859-1');` <br>
`//O 3º parâmetro é opcional. Nesse projetos usaremos a codificação 'ISO-8859-1' uma vez que é 
a codificação usada no nosso servidor.`<br><br>
2º - No arquivo do view devemos incluir a variavel global do xajax do escopo do controlerr e inicializar a partir dela a função 'printJavascript', a qual será responsável por exibir os dados no front.<br>
`include("Controller/index.php.inc");`<br>
`$xajax->printJavascript("./includes/");` <br>
<br>
2.2 - Funções
<br>

1º - No arquivo de controller trabalharemos com funções. Sempre que criarmos alguma função, deveremos 'registrá-la' como uma função xajax.
O registro é feito através do método 'registerFunction' da variável global xajax, passando por parâmetro o nome da função:<br>
`$xajax->registerFunction("calcular");` <br>

2º - Ao criarmos uma função que será chamada no front end, é necessário que inicializemos um objeto de resposta do xajax e ao final retornemos seu método 'getXML'.
Através dele é feito o envio de dados no formato XML e as manipulações dos elementos do DOM. Exemplo:<br>
`function calcular($tipoCalculo, $num1, $num2)`<br>
`{`<br>
  `$response = new xajaxResponse('ISO-8859-1');`<br>
  `(lógica)`<br>
  `return $response->getXML();`<br>
`}`<br>

3º - Após criarmos as funções e registrá-lás, devemos finalizar, na última linha do código, com o médoto 'processRequests' da variável global xajax: <br>
`$xajax->processRequests();` <br>

2.3 - Manipulando o DOM <br> <br>
O XAJAX oferece alguns métodos para a manipulação do DOM, no qual, através deles, podemos passar instruções javascript que serão interpretadas pelo navegador. <br>
Exemplos:<br>
- `$response->addScripts();`<br>
  - `$response->addScript("document.getElementById('resultado').innerHTML = '$resultado';");`<br>
