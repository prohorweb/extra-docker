<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $subject string */
/* @var $info \YooKassa\Request\Payments\PaymentResponse */

?>
<div>
    <p><?= $subject ?></p>
    <hr>

    Пользователь:

    <p>Имя: <?= Html::encode($info->metadata->name) ?></p>

    <p>Телефон: <?= Html::encode($info->metadata->phone) ?></p>

    <?php if (isset($info->metadata->email)) { ?>
    <p>E-mail: <?= Html::encode($info->metadata->email) ?></p>
    <?php } ?>

    Приобрёл <?= Html::encode($info->metadata->description) ?> за <?= Html::encode($info->amount->value) ?> руб. в клубе "Питер"

    <hr>
    <p>Отправлено: <?= Yii::$app->formatter->asDatetime('now') ?></p>

</div>
