<?php

use yii\bootstrap\ActiveForm;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

?>
<?= GridView::widget([
    'dataProvider' => $participants,
    'columns' => [
        'album_no',
        'name',
        'surname',
        [
            'class' => 'yii\grid\ActionColumn',
            'header' => 'Actions',
            'template' => '{delete}',
            'urlCreator' => function ($action, $model, $key, $index, $column) use ($lecture_id) {
                if ('delete' === $action) {
                    return Url::to(['deleteparticipant', 'participant_external_ref' => $model['id'], 'lecture_id' => $lecture_id]);
                }
                throw new \yii\base\Exception(sprintf('Undefined action [%s] in lecture view', $action));
            }
        ],
    ]
]); ?>

    <h2>Add new Participant</h2>
<?php $form = ActiveForm::begin([
    'id' => 'lecture-date-form',
    'action' => Url::to(['addparticipant']),
    'method' => 'get'
]); ?>

<?= Html::label('Album number: '); ?>
<?= Html::textInput('album_no'); ?>
<?= Html::hiddenInput('lecture_id', $lecture_id) ?>
<?= Html::submitButton('Add', ['class' => 'btn btn-primary', 'name' => 'lecture-date-button']); ?>

<?php ActiveForm::end() ?>