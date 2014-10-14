<div class="col-md-12">
    <div class="col-sm-offset-2 col-md-7">
<?php
use CandidoSouza\Classes\Form\Util\Element;
use CandidoSouza\Classes\Form\Elements\Tag;


$element = new Element();
$element1 = clone $element;
$element2 = clone $element;
$element3 = clone $element;
$element4 = clone $element;
$element5 = clone $element;

// *** Form *** //
$form = [
    'class' => 'form-horizontal', 
    'name' => 'form-contato',
    'action' => 'dados.php',
    'method' => 'post'
    ];

$form = new Tag($form, 'Form');
$form->createField($element);

// *** Fieldset *** //  
$fieldset = [];

$fieldset = new Tag($fieldset, 'fieldset');
$fieldset->createField($element1);

// *** Legend *** //
$legend = [];

$legend = new Tag($legend, 'legend');
$legend->createField($element1);
$legend->setParam('Formulário de Produto');
echo $legend->getParam();
$legend->close($element1);

// *** input nome *** //
$div = [
    'class' => 'form-group'
    ];
$div = new Tag($div, 'div');
$div->createField($element1);

// label
$label = [
    'class' => 'col-sm-2 control-label'
    ];
$label = new Tag($label, 'label');
$label->createField($element1);
$label->setParam('Nome: ');
echo $label->getParam();
$label->close($element1);

//div
$div = [
    'class' => 'col-sm-10'
    ];
$div = new Tag($div, 'div');
$div->createField($element1);

//input nome
$input = [
    'class' => 'form-control',
    'type' => 'text',
    'name' => 'nome',
    'value' => 'Laranja'
];
$input = new Tag($input, 'input');
$input->createField($element1);

$div->close($element1);
$div->close($element1);



// *** input valor *** //
$div = [
    'class' => 'form-group'
    ];
$div = new Tag($div, 'div');
$div->createField($element2);

// label
$label = [
    'class' => 'col-sm-2 control-label'
    ];
$label = new Tag($label, 'label');
$label->createField($element2);
$label->setParam('Valor: ');
echo $label->getParam();
$label->close($element2);

//div
$div = [
    'class' => 'col-sm-10'
    ];
$div = new Tag($div, 'div');
$div->createField($element2);

//input valor
$input = [
    'class' => 'form-control',
    'type' => 'text',
    'name' => 'nome',
    'value' => 3.50
];
$input = new Tag($input, 'input');
$input->createField($element2);

$div->close($element2);
$div->close($element2);



// *** input descrição *** //
$div = [
    'class' => 'form-group'
    ];
$div = new Tag($div, 'div');
$div->createField($element3);

// label
$label = [
    'class' => 'col-sm-2 control-label'
    ];
$label = new Tag($label, 'label');
$label->createField($element3);
$label->setParam('Descrição: ');
echo $label->getParam();
$label->close($element3);

//div
$div = [
    'class' => 'col-sm-10'
    ];
$div = new Tag($div, 'div');
$div->createField($element3);

//input valor
$input = [
    'class' => 'form-control',
    'type' => 'text',
    'name' => 'nome',
    'value' => 'Laranja Iowa'
];
$input = new Tag($input, 'input');
$input->createField($element3);

$div->close($element3);
$div->close($element3);


// *** input categoria *** //
$div = [
    'class' => 'form-group'
    ];
$div = new Tag($div, 'div');
$div->createField($element4);

// label
$label = [
    'class' => 'col-sm-2 control-label'
    ];
$label = new Tag($label, 'label');
$label->createField($element4);
$label->setParam('Categoria: ');
echo $label->getParam();
$label->close($element4);

//div
$div = [
    'class' => 'col-sm-10'
    ];
$div = new Tag($div, 'div');
$div->createField($element4);

//input valor
$select = [
    'class' => 'form-control'
];
$select = new Tag($select, 'select');
$select->createField($element4);

$option = [
    'class' => 'form-control'
];

$option = new Tag($option, 'option');
$option->createField($element4);
$option->setParam('Frutas');
echo $option->getParam();
$option->close($element4);


$option->createField($element4);
$option->setParam('Legumes');
echo $option->getParam();
$option->close($element4);

$option->createField($element4);
$option->setParam('Verduras');
echo $option->getParam();
$option->close($element4);

$option->createField($element4);
$option->setParam('Frios');
echo $option->getParam();
$option->close($element4);


$select->close($element4);

$div->close($element4);
$div->close($element4);

// enviar

//div
$div = [
    'class' => 'form-group'
    ];
$div = new Tag($div, 'div');
$div->createField($element5);

$div = [
    'class' => 'col-sm-offset-2 col-sm-10'
    ];
$div = new Tag($div, 'div');
$div->createField($element5);

//input 
$input = [
    'class' => 'btn btn-primary',
    'type' => 'submit',
    'name' => 'enviar',
    'value' => 'Enviar'
];
$input = new Tag($input, 'input');
$input->createField($element5);


$div->close($element5);
$div->close($element5);

$fieldset->close($element1);
$form->close($element);

?>    
    </div>
</div>