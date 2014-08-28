<div class="col-md-12">
    <div class="col-sm-offset-3 col-md-6">
        <?php
        use CandidoSouza\Classes\Forms\Form;
        use CandidoSouza\Classes\Forms\Types\Label;
        use CandidoSouza\Classes\Forms\Types\Entry;
        use CandidoSouza\Classes\Forms\Element;
        use CandidoSouza\Classes\Forms\Types\TextArea;
        use CandidoSouza\Classes\Forms\Types\Button;
        use CandidoSouza\Classes\Forms\Types\Action;

        /**
         * Formulário
         */
        $elementos  = new Element('form');
        $elementos1 = new Element('label');
        $elementos2 = new Element('label');
        $elementos3 = new Element('label');
        $elementos4 = new Element('textarea');
        $elementos5 = new Element('input');
        $elementos6 = new Element('input');
        $form = new Form('Form_contato');
        $form->render($elementos);

        echo "<div class=\"form-group\">";
            // input nome
            $titulo = new Label($elementos1, 'Nome:');
            $titulo->setClass('col-sm-2 control-label');
            $titulo->render();
            echo "<div class=\"col-sm-10\">";
                $nome = new Entry($elementos5 ,'nome');
                $nome->setNome('nome');
                $nome->setPlaceholder('Nome');
                $nome->setClass('form-control');
                $nome->render();
            echo "</div>";
        echo "</div>";

        echo "<div class=\"form-group\">";
            // input email
            $titulo = new Label($elementos2, 'E-mail:');
            $titulo->setClass('col-sm-2 control-label');
            $titulo->render();
            echo "<div class=\"col-sm-10\">";
                $email = new Entry($elementos5,'email');
                $email->setNome('email');
                $email->setPlaceholder('E-mail');
                $email->setClass('form-control');
                $email->render();
            echo "</div>";
        echo "</div>";

        echo "<div class=\"form-group\">";
            // input textarea mensagem
            $titulo = new Label($elementos3, 'Mensagem:');
            $titulo->setClass('col-sm-2 control-label');
            $titulo->render();
            echo "<div class=\"col-sm-10\">";
                $text = new TextArea($elementos4, '');
                $text->setPlaceholder('Mensagem');
                $text->setNome('mensagem');
                $text->setClass('form-control');
                $text->render();
            echo "</div>";
        echo "</div>";

        // botão enviar
        echo "<div class=\"form-group\">";
            echo "<div class=\"col-sm-offset-2 col-sm-10\">";
                $action = new Button($elementos6,'btn btn-primary');
                $action->setAction( new Action('onSend'), 'Enviar');
                $action->render();
            echo "</div>";
        echo "</div>";
        ?>
    </div>
</div>
<?php
if (isset($_POST['enviar'])){
    echo '<pre>';
    var_dump($_POST);
    echo '</pre>';
}