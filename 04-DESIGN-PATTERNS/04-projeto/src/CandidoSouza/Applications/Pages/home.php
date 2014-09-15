<?php
use CandidoSouza\Classes\Products\Types\Products;


$dados = new Products();
$dados->setId(1)
        ->setNome('Banana')
        ->setValor(3.50)
        ->setDescricao('Banana Nanica')
;
echo '<pre>';
var_dump($dados);
echo '</pre>';


?>
<div class="col-md-12">
    <div class="col-sm-offset-3 col-md-6">
<?php
use CandidoSouza\Classes\Forms\Utils\Element;
use CandidoSouza\Classes\Forms\Types\Form;
use CandidoSouza\Classes\Forms\Types\Label;
use CandidoSouza\Classes\Forms\Types\Tag;
use CandidoSouza\Classes\Forms\Types\Fieldsets;
use CandidoSouza\Classes\Forms\Types\Select;
use CandidoSouza\Classes\Forms\Types\Options;
use CandidoSouza\Classes\Validation\Validator;
use CandidoSouza\Classes\Http\Request;

$request = new Request();
$validation = new Validator($request);
$elemento = new Element();
$elemento1  = new Element();
$elemento2  = new Element();
$elemento3  = new Element();

$form = new Form($validation, 'form');
$form->createField($elemento);

$fieldset = new Fieldsets('fieldset');
$fieldset->setValue('formcontato');
$fieldset->createField($elemento2);

$legend = new Label('legend');
$legend->createField($elemento1);
$legend->setParam('Formulário de Produto');
echo $legend->getParam();
$legend->close($elemento1);


echo "<div class=\"form-group\">";

    $label = new Label('label');
    $label->setClass('col-sm-2 control-label');
    $label->createField($elemento1);
    $label->setParam("Nome:");
    echo $label->getParam();
    $label->close($elemento1);
    
    echo "<div class=\"col-sm-10\">";

    $elemento2 = new Element();
    $input = new Tag('input');
    $input->setType('text');
    $input->setClass('form-control');
    $input->setName('nome');
    $input->setPlaceholder('Nome');
    $input->createField($elemento2);
    
    
    echo "</div>\n";
echo "</div>\n";

echo "<div class=\"form-group\">";

    $label->createField($elemento1);
    $label->setParam("Valor:");
    echo $label->getParam();
    $label->setClass('col-sm-2 control-label');
    $label->close($elemento1);
    
    echo "<div class=\"col-sm-10\">";

    $input->setType('text');
    $input->setClass('form-control');
    $input->setName('valor');
    $input->setPlaceholder('Valor');
    $input->createField($elemento2);
    
    echo "</div>\n";
echo "</div>\n";


echo "<div class=\"form-group\">";

    $label->createField($elemento1);
    $label->setParam("Descrição:");
    echo $label->getParam();
    $label->setClass('col-sm-2 control-label');
    $label->close($elemento1);
    
    echo "<div class=\"col-sm-10\">";

    $input->setType('text');
    $input->setClass('form-control');
    $input->setName('descricao');
    $input->setPlaceholder('Descrição');
    $input->createField($elemento2);
    
    echo "</div>\n";
echo "</div>\n";


echo "<div class=\"form-group\">";

    $label->createField($elemento1);
    $label->setParam("Categoria:");
    echo $label->getParam();
    $label->setClass('col-sm-2 control-label');
    $label->close($elemento1);
    
    echo "<div class=\"col-sm-10\">";

    $select = new Select('select');
    $select->setClass('form-control');
    $select->createField($elemento1);
    
    
    
    $selecao = new \PDO("sqlite:select.db");
    $categoria = $selecao->query("select * from opcoes")->fetchALL();

    
    $option = new Options('option');
    $option->createField($elemento3);
    $option->setParam($categoria[0]['nome']);
    echo $option->getParam();
    $option->close($elemento3);
    
    $option->createField($elemento3);
    $option->setParam($categoria[1]['nome']);
    echo $option->getParam();
    $option->close($elemento3);
    
    $option->createField($elemento3);
    $option->setParam($categoria[2]['nome']);
    echo $option->getParam();
    $option->close($elemento3);
    
    $option->createField($elemento3);
    $option->setParam($categoria[3]['nome']);
    echo $option->getParam();
    $option->close($elemento3);
    
    $select->close($elemento);
    
    echo "</div>\n";
echo "</div>\n";

echo "<div class=\"form-group\">";
    echo "<div class=\"col-sm-offset-2 col-sm-10\">";

    $button = new Tag('input');
    $button->setClass('btn btn-primary');
    $button->setType('submit');
    $button->setName('enviar');
    $button->setPlaceholder('Enviar');
    $button->createField($elemento2);
    $button->close($elemento);
    
    echo "</div>\n";
echo "</div>\n";
$fieldset->close($elemento1);
$form->close($elemento);


var_dump($_POST);
?>    
    </div>
</div>