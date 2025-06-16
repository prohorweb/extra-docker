<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model common\models\Articles */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin(['id' => 'form-article']); ?>

<div class="input-row">
    <?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Обновить', ['class' => $model->isNewRecord ? 'btn' : 'btn btn-primary']) ?>
</div>

<div class="input-row">
    <?= $form->field($model, 'title', ['labelOptions' => ['class' => 'input-label']])->textInput(['maxlength' => true, 'class' => 'inputbox'])->hint('осталось символов: <span id="charsLeftTitle"></span>') ?>
</div>

<div class="input-row">
    <?= Html::label('Изображение для превью', '', ['class' => 'input-label']) ?>
    <?php if($model->img): ?>
        <img src="/uploads/image/article/<?= $model->img ?>" height="150">
        <br><br>
    <?php endif; ?>
    <?= $form->field($model, 'img', ['template' => '{input}{label}{hint}{error}', 'options' => ['class' => 'upload-box'], 'labelOptions' => ['class' => 'btn']])->fileInput(['accept' => 'image/jpeg, image/png'])->hint('<span>Файл не выбран<span>') ?>
    <div class="hint-block">Размер изображения не меньше 330 px * 330 px<br> Допустимые форматы: PNG, JPG</div>
</div>

<div class="input-row">
    <?= $form->field($model, 'content', ['labelOptions' => ['class' => 'input-label']])->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'custom',
        'clientOptions' => [
            'extraPlugins' => 'justify,youtube',
            'height' => 200,
            'filebrowserUploadUrl' =>  Url::to(['/jobs/upload']),
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

<dl class="tabs-list">
    <dt>Параметры оптимизации материала</dt>
    <dd>
        <div class="input-row">
            <?= $form->field($model, 'alias', ['labelOptions' => ['class' => 'input-label']])->textInput(['class' => 'inputbox span10', 'maxlength' => true])->hint('осталось символов: <span id="charsLeftAlias"></span>') ?>
        </div>

        <div class="input-row">
            <?= $form->field($model, 'meta_title', ['labelOptions' => ['class' => 'input-label']])->textInput(['class' => 'inputbox span10', 'maxlength' => true])->hint('осталось символов: <span id="charsLeftMetaTitle"></span>') ?>
        </div>

        <div class="input-row">
            <?= $form->field($model, 'meta_keywords', ['labelOptions' => ['class' => 'input-label']])->textInput(['class' => 'inputbox span10', 'maxlength' => true]) ?>
        </div>

        <div class="input-row">
            <?= $form->field($model, 'meta_description', ['labelOptions' => ['class' => 'input-label']])->textInput(['class' => 'inputbox span10', 'maxlength' => true]) ?>
        </div>
    </dd>
</dl>

<div class="input-row">
    <?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Обновить', ['class' => $model->isNewRecord ? 'btn' : 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end();

$this->registerJs(<<<JS
	jQuery('#articles-title').limit('30','#charsLeftTitle');
	jQuery('#articles-alias').limit('30','#charsLeftAlias');
	jQuery('#articles-meta_title').limit('125','#charsLeftMetaTitle');
	
	jQuery('#form-article').on('afterValidate', function (event, messages, errorAttributes) {
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
