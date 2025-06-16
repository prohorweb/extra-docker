<?php

/* @var $this yii\web\View */
/* @var $subject string */
/* @var $info \YooKassa\Request\Payments\PaymentResponse */

?>

<?= $subject ?>
- - - - - - - - - - - - - -

Пользователь:

Имя: <?= $info->metadata->name ?>,

Телефон: <?= $info->metadata->phone ?>,

<?php if (isset($info->metadata->email)) { ?>
E-mail: <?= $info->metadata->email ?>
<?php } ?>

Приобрёл <?= $info->metadata->description ?> за <?= $info->amount->value ?> руб. в клубе "Питер"

- - - - - - - - - - - - - -
Отправлено: <?= Yii::$app->formatter->asDatetime('now') ?>
