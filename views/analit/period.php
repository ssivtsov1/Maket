<?php

// Отображение показателей
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

use yii\grid\GridView;
use yii\grid\ActionColumn;
use yii\grid\CheckboxColumn;
use yii\grid\SerialColumn;

if($kind==1)
    $this->title = 'Аналітика показників з '.$date_begin.' по '.$date_end.'. Історія.';
if($kind==2)
    $this->title = 'Аналітика показників з '.$date_begin.' по '.$date_end.'. Сума по годинам доби.';
if($kind==3)
    $this->title = 'Аналітика показників з '.$date_begin.' по '.$date_end.'. Середнє значення по годинам доби.';

$this->params['breadcrumbs'][] = $this->title;
$hasAccess = false;
if($kind==1) $hasAccess = true;
?>

<div class="form-group">
    <h4 class="h3_title"><?= Html::encode($this->title) ?></h4>
    <h4 class="span_hours">години доби</h4>
    <?php
         echo GridView::widget([
        'dataProvider' => $dataProvider,
             'tableOptions' => [
                 'class' => 'table table-striped table-bordered table-condensed'],
        'summary' => false,
        'emptyText' => 'Немає данних.',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'date',
                'format' => ['date', 'php:d.m.Y'],
                'visible' => $hasAccess,
            ],
            ['attribute' =>'kod_pokaz',
                'options' => ['style' => 'width: 50px; max-width: 50px;'],
                'contentOptions' => ['style' => 'width: 50px; max-width: 50px;'],
            ],

            ['attribute' =>'kod_obj',
                'options' => ['style' => 'width: 70px; max-width: 70px;'],
                'contentOptions' => ['style' => 'width: 70px; max-width: 70px;'],
            ],
            ['attribute' =>'nazv',
                'options' => ['style' => 'width: 210px; max-width: 210px;'],
                'contentOptions' => ['style' => 'width: 210px; max-width: 210px;'],
            ],

            ['attribute' =>'hour_1',
                'format' => ['decimal', 0],    // Этот формат нужен для отображения чисел с разделителями разрядов
                'value' => function ($model){
                    if($model->hour_1 == 0)
                        return '';
                    else
                        return $model->hour_1;

                },

            ],
            ['attribute' =>'hour_2',
                'format' => ['decimal', 0],
                'value' => function ($model){
                    if($model->hour_2 == 0)
                        return '';
                    else
                        return $model->hour_2;

                },
            ],
            ['attribute' =>'hour_3',
                'format' => ['decimal', 0],
                'value' => function ($model){
                    if($model->hour_3 == 0)
                        return '';
                    else
                        return $model->hour_3;

                },
            ],
            ['attribute' =>'hour_4',
                'format' => ['decimal', 0],
                'value' => function ($model){
                    if($model->hour_4 == 0)
                        return '';
                    else
                        return $model->hour_4;

                },
            ],
            ['attribute' =>'hour_5',
                'format' => ['decimal', 0],
                'value' => function ($model){
                    if($model->hour_5 == 0)
                        return '';
                    else
                        return $model->hour_5;

                },
            ],
            ['attribute' =>'hour_6',
                'format' => ['decimal', 0],
                'value' => function ($model){
                    if($model->hour_6 == 0)
                        return '';
                    else
                        return $model->hour_6;

                },
            ],
            ['attribute' =>'hour_7',
                'format' => ['decimal', 0],
                'value' => function ($model){
                    if($model->hour_7 == 0)
                        return '';
                    else
                        return $model->hour_7;

                },
            ],
            ['attribute' =>'hour_8',
                'format' => ['decimal', 0],
                'value' => function ($model){
                    if($model->hour_8 == 0)
                        return '';
                    else
                        return $model->hour_8;

                },
            ],
            ['attribute' =>'hour_9',
                'format' => ['decimal', 0],
                'value' => function ($model){
                    if($model->hour_9 == 0)
                        return '';
                    else
                        return $model->hour_9;

                },
            ],
            ['attribute' =>'hour_10',
                'format' => ['decimal', 0],
                'value' => function ($model){
                    if($model->hour_10 == 0)
                        return '';
                    else
                        return $model->hour_10;

                },
            ],
            ['attribute' =>'hour_11',
                'format' => ['decimal', 0],
                'value' => function ($model){
                    if($model->hour_11 == 0)
                        return '';
                    else
                        return $model->hour_11;

                },
            ],
            ['attribute' =>'hour_12',
                'format' => ['decimal', 0],
                'value' => function ($model){
                    if($model->hour_12 == 0)
                        return '';
                    else
                        return $model->hour_12;

                },
            ],
            ['attribute' =>'hour_13',
                'format' => ['decimal', 0],
                'value' => function ($model){
                    if($model->hour_13 == 0)
                        return '';
                    else
                        return $model->hour_13;

                },
            ],
            ['attribute' =>'hour_14',
                'format' => ['decimal', 0],
                'value' => function ($model){
                    if($model->hour_14 == 0)
                        return '';
                    else
                        return $model->hour_14;

                },
            ],
            ['attribute' =>'hour_15',
                'format' => ['decimal', 0],
                'value' => function ($model){
                    if($model->hour_15 == 0)
                        return '';
                    else
                        return $model->hour_15;

                },
            ],
            ['attribute' =>'hour_16',
                'format' => ['decimal', 0],
                'value' => function ($model){
                    if($model->hour_16 == 0)
                        return '';
                    else
                        return $model->hour_16;

                },
            ],
            ['attribute' =>'hour_17',
                'format' => ['decimal', 0],
                'value' => function ($model){
                    if($model->hour_17 == 0)
                        return '';
                    else
                        return $model->hour_17;

                },
            ],
            ['attribute' =>'hour_18',
                'format' => ['decimal', 0],
                'value' => function ($model){
                    if($model->hour_18 == 0)
                        return '';
                    else
                        return $model->hour_18;

                },
            ],
            ['attribute' =>'hour_19',
                'format' => ['decimal', 0],
                'value' => function ($model){
                    if($model->hour_19 == 0)
                        return '';
                    else
                        return $model->hour_19;

                },
            ],
            ['attribute' =>'hour_20',
                'format' => ['decimal', 0],
                'value' => function ($model){
                    if($model->hour_20 == 0)
                        return '';
                    else
                        return $model->hour_20;

                },
            ],
            ['attribute' =>'hour_21',
                'format' => ['decimal', 0],
                'value' => function ($model){
                    if($model->hour_21 == 0)
                        return '';
                    else
                        return $model->hour_21;

                },
            ],
            ['attribute' =>'hour_22',
                'format' => ['decimal', 0],
                'value' => function ($model){
                    if($model->hour_22 == 0)
                        return '';
                    else
                        return $model->hour_22;

                },
            ],
            ['attribute' =>'hour_23',
                'format' => ['decimal', 0],
                'value' => function ($model){
                    if($model->hour_23 == 0)
                        return '';
                    else
                        return $model->hour_23;

                },
            ],
            ['attribute' =>'hour_24',
                'format' => ['decimal', 0],
                'value' => function ($model){
                    if($model->hour_24 == 0)
                        return '';
                    else
                        return $model->hour_24;

                },
            ],
            ['attribute' =>'hour_25',
                'format' => ['decimal', 0],
                'value' => function ($model){
                    if($model->hour_25 == 0)
                        return '';
                    else
                        return $model->hour_25;

                },
            ],
            ['attribute' =>'allday',
                'format' => ['decimal', 0],
            ],

        ],
    ]);

    ?>

    <?= Html::a('Сброс в Excel', ['analit/period?date_begin='.$date_begin.'&date_end='.$date_end.
        '&kind='.$kind.'&item=Excel'],
        ['class' => 'btn btn-info'])  ?>

</div>





