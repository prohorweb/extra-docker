<?php

use dosamigos\ckeditor\CKEditor;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Jobs */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin(['id' => 'form-jobs']); ?>

<div class="input-row">
    <?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Обновить', ['class' => $model->isNewRecord ? 'btn' : 'btn btn-primary']) ?>
</div>

<div class="input-row">
    <?= $form->field($model, 'title', ['labelOptions' => ['class' => 'input-label']])->textInput(['maxlength' => true, 'class' => 'inputbox'])->hint('осталось символов: <span id="charsLeftTitle"></span>') ?>
</div>

<div class="input-row">
    <?= $form->field($model, 'content', ['labelOptions' => ['class' => 'input-label']])->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'custom',
        'clientOptions' => [
            'extraPlugins' => 'justify',
            'height' => 200,
            //'filebrowserUploadUrl' =>  Url::to(['upload']),
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
            'removeButtons' => 'Image,Paste,PasteText,PasteFromWord',
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
	jQuery('#jobs-title').limit('35','#charsLeftTitle');
	jQuery('#jobs-alias').limit('35','#charsLeftAlias');
	jQuery('#jobs-meta_title').limit('125','#charsLeftMetaTitle');
	
	CKEDITOR.config.coreStyles_bold = {element: 'b', overrides: 'strong'};
    CKEDITOR.on( 'instanceReady', function(ev) {
        // Output self-closing tags the HTML5 way, like <br>
        ev.editor.dataProcessor.writer.selfClosingEnd = '>';
    });
JS
);
