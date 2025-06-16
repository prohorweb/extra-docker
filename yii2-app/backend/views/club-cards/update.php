<?php

use common\widgets\Alert;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\ClubCards */

$this->title = 'Абонементы: обновить материал';

$_SESSION['referrer'] = strpos(Yii::$app->request->referrer, 'page') !== false ? Yii::$app->request->referrer : (isset($_SESSION['referrer']) && strpos($_SESSION['referrer'], 'club-cards') !== false ? $_SESSION['referrer'] : Url::to(['/club-cards']));

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
        <a href="<?= $_SESSION['referrer'] ?>" class="btn btn--grey"><i class="flaticon-left-arrow"></i>Назад</a>
    </div>
    <div class="wrapper">

        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>

    </div>
</div>
