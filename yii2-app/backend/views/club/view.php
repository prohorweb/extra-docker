<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Club */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Clubs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="club-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'meta_title',
            'meta_keywords',
            'meta_description',
            'tel',
            'address',
            'url_appstore:url',
            'url_googleplay:url',
            'url_windowsmarket:url',
            'url_vk:url',
            'url_facebook:url',
            'url_instagram:url',
            'url_ok:url',
            'email:email',
            'start_work',
            'end_work',
            'start_work_weekend',
            'end_work_weekend',
            'url_3d_tour:url',
            'start_year',
            'square',
            'title',
            'content:ntext',
            'latitude',
            'longitude',
        ],
    ]) ?>

</div>
