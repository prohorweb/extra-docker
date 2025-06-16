<?php

/* @var $this yii\web\View */
/* @var $model \common\models\Seo */

use yii\helpers\Html;
use yii\helpers\Url;
use common\widgets\Alert;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;

$this->title = 'Параметры услуг';

if(Yii::$app->session->getAllFlashes()) {
    $this->registerJs(<<<JS
	window.setTimeout(function() { jQuery(".message-box").alert('close'); }, 2000);
JS
);
}
?>
<div class="content-box clearfix">
    <?= Alert::widget(['closeButton' => false, 'options' => ['class' => 'message-box']]) ?>
    <div class="title-box clearfix">
        <h1 class="page-title"><?= Html::encode($this->title) ?></h1>
        <a href="<?= Url::to(['/services']) ?>" class="btn btn--grey"><i class="flaticon-left-arrow"></i>Назад</a>
    </div>
    <div class="wrapper">
        <h2>Параметры оптимизации материала</h2>
        <?php $form = ActiveForm::begin(['action' => 'params', 'options' => ['data-pjax' => true]]); ?>

        <div class="input-row">
            <?= $form->field($model, 'text', ['labelOptions' => ['class' => 'input-label']])->widget(CKEditor::className(), [
                'options' => ['rows' => 6],
                'preset' => 'custom',
                'clientOptions' => [
                    'extraPlugins' => 'justify',
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
                ]
            ]) ?>
        </div>

        <div class="input-row">
            <?= $form->field($model, 'title', ['labelOptions' => ['class' => 'input-label']])->textInput(['class' => 'inputbox span10', 'maxlength' => true])->hint('осталось символов: <span id="charsLeftMetaTitle"></span>') ?>
        </div>

        <div class="input-row">
            <?= $form->field($model, 'keywords', ['labelOptions' => ['class' => 'input-label']])->textInput(['class' => 'inputbox span10', 'maxlength' => true]) ?>
        </div>

        <div class="input-row">
            <?= $form->field($model, 'description', ['labelOptions' => ['class' => 'input-label']])->textInput(['class' => 'inputbox span10', 'maxlength' => true]) ?>
        </div>

        <div class="input-row">
            <?= Html::submitButton('Обновить', ['class' => 'btn btn-primary']) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
<?php
$this->registerJs(<<<JS
	jQuery('#seo-title').limit('125','#charsLeftMetaTitle');

    CKEDITOR.config.coreStyles_bold = {element: 'b', overrides: 'strong'};
    CKEDITOR.on( 'instanceReady', function(ev) {
        // Output self-closing tags the HTML5 way, like <br>
        ev.editor.dataProcessor.writer.selfClosingEnd = '>';
    });
JS
);
