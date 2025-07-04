<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ProgramClasses */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Program Classes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="program-classes-view">

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
            'status',
            'position',
            'title',
            'duration',
            'intro',
            'content:ntext',
            'group_programs_id',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
