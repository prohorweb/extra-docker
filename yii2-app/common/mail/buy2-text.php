<?php

/* @var $this yii\web\View */
/* @var $subject string */
/* @var $info \YooKassa\Request\Payments\PaymentResponse */

?>

<?= $subject ?>
- - - - - - - - - - - - - -

Вы приобрели <?= $info->metadata->description ?> за <?= $info->amount->value ?> руб. в клубе Питер Extra Sport


Наш менеджер свяжется с вами в ближайшее время по оставленным вами контактным данным:

Имя: <?= $info->metadata->name ?>,

Телефон: <?= $info->metadata->phone ?>,

<?php if (isset($info->metadata->email)) { ?>
E-mail: <?= $info->metadata->email ?>
<?php } ?>

- - - - - - - - - - - - - -
Отправлено: <?= Yii::$app->formatter->asDatetime('now') ?>
