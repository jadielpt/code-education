<div class="col-md-12">
    <div class="col-sm-offset-3 col-md-6">
<?php
use CandidoSouza\Classes\Forms\Utils\Element;
use CandidoSouza\Classes\Forms\Types\Form;
use CandidoSouza\Classes\Forms\Types\Label;
use CandidoSouza\Classes\Forms\Types\Tag;
use CandidoSouza\Classes\Validation\Validator;
use CandidoSouza\Classes\Http\Request;

$request = new Request();
$validation = new Validator($request);
$elemento = new Element();

$form = new Form($validation, 'form');
$form->createField($elemento);

echo "<div class=\"form-group\">";

    $elemento1  = new Element();
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
    $label->setParam("E-mail:");
    echo $label->getParam();
    $label->setClass('col-sm-2 control-label');
    $label->close($elemento1);
    
    echo "<div class=\"col-sm-10\">";

    $input->setType('text');
    $input->setClass('form-control');
    $input->setName('email');
    $input->setPlaceholder('E-mail');
    $input->createField($elemento2);
    
    echo "</div>\n";
echo "</div>\n";


echo "<div class=\"form-group\">";

    $label->createField($elemento1);
    $label->setParam("Mensagem:");
    echo $label->getParam();
    $label->setClass('col-sm-2 control-label');
    $label->close($elemento1);
    
    echo "<div class=\"col-sm-10\">";

    $textarea = new Tag('textarea');
    $textarea->setClass('form-control');
    $textarea->setType('text');
    $textarea->setName('mesagem');
    $textarea->setPlaceholder('Mensagem');
    $textarea->createField($elemento2);
    $textarea->close($elemento);
    
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
$form->close($elemento);
?>
        
    </div>
</div>