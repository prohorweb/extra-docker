<?php

use dosamigos\ckeditor\CKEditor;
use kartik\color\ColorInput;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ClubCards */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin(['id' => 'form-club-cards']); ?>

<div class="input-row">
    <?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Обновить', ['class' => $model->isNewRecord ? 'btn' : 'btn btn-primary']) ?>
</div>

<div class="input-row">
    <?= $form->field($model, 'title', ['labelOptions' => ['class' => 'input-label']])->textInput(['maxlength' => true, 'class' => 'inputbox'])->hint('осталось символов: <span id="charsLeftTitle"></span>') ?>
</div>

<div class="row input-row">
    <?= $form->field($model, 'price', ['options' => ['class' => 'col span2'], 'labelOptions' => ['class' => 'input-label']])->textInput(['maxlength' => 8, 'class' => 'inputbox']) ?>
</div>

<div class="input-row">
    <?= $form->field($model, 'comment', ['labelOptions' => ['class' => 'input-label']])->textInput(['maxlength' => true, 'class' => 'inputbox'])->hint('осталось символов: <span id="charsLeftComment"></span>') ?>
</div>

<hr>

<div class="input-row">
    <?= Html::label('Изображение для превью', '', ['class' => 'input-label']) ?>
    <?php if($model->img): ?>
        <img src="/uploads/image/club_cards/<?= $model->img ?>" height="150">
        <br><br>
    <?php endif; ?>
    <?= $form->field($model, 'img', ['template' => '{input}{label}{hint}{error}', 'options' => ['class' => 'upload-box'], 'labelOptions' => ['class' => 'btn']])->fileInput(['accept' => 'image/jpeg, image/png'])->hint('<span>Файл не выбран<span>') ?>
    <div class="hint-block">Размер изображения не меньше 1752 px * 390 px<br> Допустимые форматы: PNG, JPG</div>
</div>

<div class="input-row">
    <?= $form->field($model, 'content', ['labelOptions' => ['class' => 'input-label']])->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'custom',
        'clientOptions' => [
            'extraPlugins' => 'justify,youtube',
            'height' => 200,
            //'filebrowserUploadUrl' =>  Url::to(['/jobs/upload']),
            //'filebrowserBrowseUrl' =>  Url::to(['/uploads/image/ckeditor/']),
            'toolbarGroups' => [
                ['name' => 'undo'],
                ['name' => 'basicstyles', 'groups' => ['basicstyles', 'cleanup']],
                ['name' => 'colors'],
                ['name' => 'links', 'groups' => ['links', 'insert']],
                ['name' => 'document', 'groups' => ['mode', 'document', 'doctools']],
                ['name' => 'others', 'groups' => ['others', 'about']],
                '/',
                ['name' => 'styles'],
                ['name' => 'colors'],
                ['name' => 'clipboard', 'groups' => ['clipboard', 'undo']],
                ['name' => 'paragraph', 'groups' => [ 'list', 'indent', 'blocks', 'align', 'bidi' ]],
            ],
            'removeButtons' => 'Paste,PasteText,PasteFromWord',
            'forcePasteAsPlainText' => true
        ]
    ]) ?>
</div>

<div class="row clearfix input-row">
    <?= $form->field($model, 'code_button', ['options' => ['class' => 'col span10'], 'labelOptions' => ['class' => 'input-label']])->textInput(['maxlength' => true, 'class' => 'inputbox', 'placeholder' => 'yaCounterXXXXXX.reachGoal(\'ORDER\'); return true;'])->label('Код для кнопки') ?>
</div>

<div class="input-row">
    <?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Обновить', ['class' => $model->isNewRecord ? 'btn' : 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end();

$this->registerJs(<<<JS
	jQuery('#clubcards-title').limit('40','#charsLeftTitle');
	jQuery('#clubcards-comment').limit('65','#charsLeftComment');
	
	jQuery('#form-club-cards').on('afterValidate', function (event, messages, errorAttributes) {
        if(errorAttributes.length){
            jQuery('#alerts').append('<div class="message-box">Не все поля заполнены корректно</div>');
            //window.setTimeout(function() { jQuery("#alerts").html(''); }, 2000);
        }
        return true;
    });
	
	CKEDITOR.plugins.addExternal('youtube', '/admin/youtube/');
	CKEDITOR.config.coreStyles_bold = {element: 'b', overrides: 'strong'};
	CKEDITOR.on( 'instanceReady', function(ev) {
        // Output self-closing tags the HTML5 way, like <br>
        ev.editor.dataProcessor.writer.selfClosingEnd = '>';
    });
JS
);
