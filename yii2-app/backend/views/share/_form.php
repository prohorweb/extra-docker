<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Shares */
/* @var $form yii\widgets\ActiveForm */

?>
<!-- Note: It includes ckeditor5-paragraph too. -->
<script src="/admin/ckeditor/ckeditor5-dll.js"></script>

<!-- DLL-compatible build of ckeditor5-editor-classic. -->
<script src="/admin/ckeditor/ckeditor5-editor-classic/build/editor-classic.js"></script>

<!-- DLL-compatible builds of editor features. -->
<script src="/admin/ckeditor/ckeditor5-autoformat/build/autoformat.js"></script>
<script src="/admin/ckeditor/ckeditor5-basic-styles/build/basic-styles.js"></script>
<script src="/admin/ckeditor/ckeditor5-block-quote/build/block-quote.js"></script>
<script src="/admin/ckeditor/ckeditor5-essentials/build/essentials.js"></script>
<script src="/admin/ckeditor/ckeditor5-heading/build/heading.js"></script>
<script src="/admin/ckeditor/ckeditor5-image/build/image.js"></script>
<script src="/admin/ckeditor/ckeditor5-indent/build/indent.js"></script>
<script src="/admin/ckeditor/ckeditor5-link/build/link.js"></script>
<script src="/admin/ckeditor/ckeditor5-list/build/list.js"></script>
<script src="/admin/ckeditor/ckeditor5-media-embed/build/media-embed.js"></script>
<script src="/admin/ckeditor/ckeditor5-paste-from-office/build/paste-from-office.js"></script>
<script src="/admin/ckeditor/ckeditor5-table/build/table.js"></script>
<script src="/admin/ckeditor/ckeditor5-font/build/font.js"></script>
<script src="/admin/ckeditor/ckeditor5-ckfinder/build/ckfinder.js"></script>
<script src="/admin/ckeditor/ckeditor5-adapter-ckfinder/build/adapter-ckfinder.js"></script>
<script src="/admin/ckeditor/ckeditor5-source-editing/build/source-editing.js"></script>

<?php $form = ActiveForm::begin(['id' => 'form-share']); ?>

<div class="input-row">
    <?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Обновить', ['class' => $model->isNewRecord ? 'btn' : 'btn btn-primary']) ?>
</div>

<div class="input-row">
    <?= $form->field($model, 'only_url', ['options' => ['class' => 'checkbox'], 'template' => "{input}\n{label}\n{hint}\n{error}"])->checkbox(['label' => '<label for="shares-only_url">Доступ только по ссылке</label>'], false) ?>
</div>

<?php if(!$model->isNewRecord) { ?>
<div class="input-row">
    <a href="<?= 'https://' . $model->getNameClub()  . '.' . $_SERVER['SERVER_NAME'] . '/card/shares/' . $model->alias . '/' ?>" target="_blank"><?= 'https://' . $model->getNameClub()  . '.' . $_SERVER['SERVER_NAME'] . '/card/shares/' . $model->alias . '/' ?></a>
</div>
<?php } ?>

<div class="input-row">
    <?= $form->field($model, 'title', ['labelOptions' => ['class' => 'input-label']])->textInput(['maxlength' => true, 'class' => 'inputbox'])->hint('осталось символов: <span id="charsLeftTitle"></span>') ?>
</div>

<div class="input-row">
    <?= $form->field($model, 'comment', ['labelOptions' => ['class' => 'input-label']])->textInput(['maxlength' => true, 'class' => 'inputbox'])->hint('осталось символов: <span id="charsLeftComment"></span>') ?>
</div>

<div class="row input-row">
    <?= $form->field($model, 'price', ['options' => ['class' => 'col span2'], 'labelOptions' => ['class' => 'input-label']])->textInput(['maxlength' => 8, 'class' => 'inputbox']) ?>
</div>

<div class="input-row">
    <?= $form->field($model, 'title2', ['labelOptions' => ['class' => 'input-label']])->textInput(['maxlength' => true, 'class' => 'inputbox'])->hint('осталось символов: <span id="charsLeftTitle"></span>') ?>
</div>

<div class="input-row">
    <?= $form->field($model, 'intro', ['labelOptions' => ['class' => 'input-label']])->textarea()->hint('осталось символов: <span id="charsLeftIntro"></span>') ?>
</div>

<div class="input-row">
    <?= Html::label('Изображение для превью', '', ['class' => 'input-label']) ?>
    <?php if($model->img): ?>
        <img src="/uploads/image/share/<?= $model->img ?>" height="150">
        <br><br>
    <?php endif; ?>
    <?= $form->field($model, 'img', ['template' => '{input}{label}{hint}{error}', 'options' => ['class' => 'upload-box'], 'labelOptions' => ['class' => 'btn']])->fileInput(['accept' => 'image/jpeg, image/png'])->hint('<span>Файл не выбран<span>') ?>
    <div class="hint-block">Размер изображения не меньше 876 px * 680 px<br> Допустимые форматы: PNG, JPG</div>
</div>

<div class="input-row">
    <?= $form->field($model, 'content')->textarea() ?>
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
    const config = {
        plugins: [
            CKEditor5.autoformat.Autoformat,
            CKEditor5.basicStyles.Bold,
            CKEditor5.basicStyles.Italic,
            CKEditor5.blockQuote.BlockQuote,
            CKEditor5.essentials.Essentials,
            CKEditor5.heading.Heading,
            CKEditor5.image.Image,
            CKEditor5.image.ImageCaption,
            CKEditor5.image.ImageStyle,
            CKEditor5.image.ImageToolbar,
            CKEditor5.image.ImageUpload,
            CKEditor5.indent.Indent,
            CKEditor5.link.Link,
            CKEditor5.list.List,
            CKEditor5.mediaEmbed.MediaEmbed,
            CKEditor5.paragraph.Paragraph,
            CKEditor5.pasteFromOffice.PasteFromOffice,
            CKEditor5.table.Table,
            CKEditor5.table.TableToolbar,
            CKEditor5.font.Font,
            CKEditor5.ckfinder.CKFinder,
            CKEditor5.adapterCkfinder.UploadAdapter,
            CKEditor5.sourceEditing.SourceEditing
            
        ],
        toolbar: {
            items: [
                'heading',
                '|',
                'bold',
                'italic',
                'link',
                'bulletedList',
                'numberedList',
                'fontColor',
                'fontBackgroundColor',
                '|',
                'outdent',
                'indent',
                '|',
                'uploadImage',
                'blockQuote',
                'insertTable',
                'mediaEmbed',
                'undo',
                'redo',
                'sourceEditing'
            ]
        },
        image: {
            toolbar: [
                'imageStyle:inline',
                'imageStyle:block',
                'imageStyle:side',
                '|',
                'toggleImageCaption',
                'imageTextAlternative'
            ]
        },
        table: {
            contentToolbar: [
                'tableColumn',
                'tableRow',
                'mergeTableCells'
            ]
        },
        ckfinder: {
            uploadUrl:'/admin/jobs/upload2'
        }
    };

    CKEditor5.editorClassic.ClassicEditor
    .create(document.querySelector('#shares-content'),config)
    .then(editor => {
        window.editor = editor;
    });
    

	jQuery('#shares-title').limit('60','#charsLeftTitle');
    jQuery('#shares-comment').limit('125','#charsLeftComment');
	jQuery('#shares-intro').limit('500','#charsLeftIntro');
	jQuery('#shares-alias').limit('100','#charsLeftAlias');
	jQuery('#shares-meta_title').limit('125','#charsLeftMetaTitle');
	
	jQuery('#form-share').on('afterValidate', function (event, messages, errorAttributes) {
        if(errorAttributes.length){
            jQuery('#alerts').append('<div class="message-box">Не все поля заполнены корректно</div>');
            //window.setTimeout(function() { jQuery("#alerts").html(''); }, 2000);
        }
        return true;
    });
JS
);
