<?php

use yii\bootstrap\ActiveForm;
use yii\bootstrap\Collapse;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = $lecture->name;
$this->params['breadcrumbs'][] = $this->title;
?>
<h1><?= $this->title; ?></h1>
<?php $form = ActiveForm::begin([
    'action' => Url::to(['update'])
]) ?>
<b><?= Html::hiddenInput('id', $lecture->id) ?></b>
<div class="row">
    <div class="col-sm-4">
        <?= $form->field($lecture, 'name') ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-4">
        <?= $form->field($lecture, 'description') ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-4">
        <?= Html::submitButton('Update', ['class' => 'btn btn-primary', 'name' => 'lecture-button', 'value' => 'Update Lecture']); ?>
    </div>
</div>

<?php ActiveForm::end() ?>


<?= Collapse::widget([
    'items' => [
        [
            'label' => 'Lecture dates',
            'content' => $this->render('/_partials/_lecture_dates', [
                'lecture_dates' => $lecture_dates,
                'lecture_id' => $lecture->id
            ]),
            'options' => [
                'class' => 'lecture-collapse'
            ]
        ],
        [
            'label' => 'Lecture Participants',
            'content' => $this->render('/_partials/_lecture_participants', [
                'participants' => $participants,
                'lecture_id' => $lecture->id
            ]),
            'options' => [
                'class' => 'lecture-collapse'
            ]
        ],
    ]
]); ?>


<?= Html::a('Generate presence list', Url::to(['generatelist', 'lecture_id' => $lecture->id]), ['class' => 'btn btn-primary']); ?>
