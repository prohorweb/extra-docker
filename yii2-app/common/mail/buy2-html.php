<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $subject string */
/* @var $info \YooKassa\Request\Payments\PaymentResponse */

?>
<div>
    <p><?= $subject ?></p>
    <hr>

    Вы приобрели <?= Html::encode($info->metadata->description) ?> за <?= Html::encode($info->amount->value) ?> руб. в клубе Питер Extra Sport

    Наш менеджер свяжется с вами в ближайшее время по оставленным вами контактным данным:

    <p>Имя: <?= Html::encode($info->metadata->name) ?></p>

    <p>Телефон: <?= Html::encode($info->metadata->phone) ?></p>

    <?php if (isset($info->metadata->email)) { ?>
    <p>E-mail: <?= Html::encode($info->metadata->email) ?></p>
    <?php } ?>



    <hr>
    <p>Отправлено: <?= Yii::$app->formatter->asDatetime('now') ?></p>

</div>
