<div class="col-md-12">
    <div class="col-sm-offset-3 col-md-6">
<?php
use CandidoSouza\Classes\Form\Elements\Form;
use CandidoSouza\Classes\Form\Util\Element;

$element = new Element();
$form = new Form('form');
$form->createField($element);
$form->close($element);

?>    
    </div>
</div>