<?php
use CandidoSouza\Classes\Forms\Utils\Element;
use CandidoSouza\Classes\Forms\Types\Form;
use CandidoSouza\Classes\Forms\Types\Label;
use CandidoSouza\Classes\Forms\Types\Input;

$elemento = new Element();
$form = new Form('form');
$form->render($elemento);

$elemento1  = new Element();
$label = new Label('label');
$label->render($elemento1);

$elemento2 = new Element();
$input = new Input('input');
$input->render($elemento2);





//echo "<hr>";
//
//echo '<pre>';
//print_r($elementos);
//echo '</pre>';
//
//echo "<hr>";
//
//echo '<pre>';
//print_r($form);
//echo '</pre>';


?>







<div class="col-md-12">
    <div class="col-sm-offset-3 col-md-6">
        <form class="form-horizontal" name="Form_contato" action="" method="post">
            <div class="form-group">
                <label class="col-sm-2 control-label">Nome:</label>
                <div class="col-sm-10">
                    <input class="form-control" name="nome" placeholder="Nome" type="text">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">E-mail:</label>
                <div class="col-sm-10">
                    <input class="form-control" name="email" placeholder="E-mail" type="text">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Mensagem:</label>
                <div class="col-sm-10">
                    <textarea name="mensagem" placeholder="Mensagem" class="form-control"></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <input class="btn btn-primary" type="submit" value="Enviar" name="enviar" onclick="document.action'?method=onSend'; document.submit()">
                </div>
             </div>
         </form>
    </div>
</div>