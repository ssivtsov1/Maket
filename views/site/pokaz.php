<?php

// Отображение показателей
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

use yii\grid\GridView;
use yii\grid\ActionColumn;
use yii\grid\SerialColumn;
// $mon - название месяца
$this->title = 'Показники за '.mb_strtolower($mon,'UTF-8').' місяць '.$year.' року. '.$number. ' число.';
$this->params['breadcrumbs'][] = $this->title;
$y = date('Y');
$m = date('n');
$n = date('j');
?>

<div class="form-group">
    <h3 class="h3_title"><?= Html::encode($this->title) ?></h3>
    <h4 class="span_hours">години доби</h4>
    <?php if($year==$y && $month==$m && $number>=$n){
        // Редактировать можно только настоящее и будущее
              echo GridView::widget([
        'dataProvider' => $dataProvider,
        'summary' => false,
           'tableOptions' => [
            'class' => 'table table-striped table-bordered table-condensed'
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

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
                'options' => ['style' => 'width: 210px; max-width: 210px;'],
                'contentOptions' => ['style' => 'width: 210px; max-width: 210px;'],
             'format' => ['decimal', 0],    // Этот формат нужен для отображения чисел с разделителями разрядов
             'value' => function ($model){
                    if($model->hour_1 == 0)
                        return '';
                    else
                        return $model->hour_1;
                    
                },
                       
            ],
            ['attribute' =>'hour_2',
                'options' => ['style' => 'width: 210px; max-width: 210px;'],
                'contentOptions' => ['style' => 'width: 210px; max-width: 210px;'],
             'format' => ['decimal', 0],
            'value' => function ($model){
                    if($model->hour_2 == 0)
                        return '';
                    else
                        return $model->hour_2;
                    
                },
            ],
            ['attribute' =>'hour_3',
                'options' => ['style' => 'width: 210px; max-width: 210px;'],
                'contentOptions' => ['style' => 'width: 210px; max-width: 210px;'],
             'format' => ['decimal', 0],   
            'value' => function ($model){
                    if($model->hour_3 == 0)
                        return '';
                    else
                        return $model->hour_3;
                    
                },
            ],
            ['attribute' =>'hour_4',
                'options' => ['style' => 'width: 210px; max-width: 210px;'],
                'contentOptions' => ['style' => 'width: 210px; max-width: 210px;'],
             'format' => ['decimal', 0],   
            'value' => function ($model){
                    if($model->hour_4 == 0)
                        return '';
                    else
                        return $model->hour_4;
                    
                },
            ],
            ['attribute' =>'hour_5',
                'options' => ['style' => 'width: 210px; max-width: 210px;'],
                'contentOptions' => ['style' => 'width: 210px; max-width: 210px;'],
            'format' => ['decimal', 0],    
            'value' => function ($model){
                    if($model->hour_5 == 0)
                        return '';
                    else
                        return $model->hour_5;
                    
                },
            ],
            ['attribute' =>'hour_6',
                'options' => ['style' => 'width: 210px; max-width: 210px;'],
                'contentOptions' => ['style' => 'width: 210px; max-width: 210px;'],
            'format' => ['decimal', 0],    
            'value' => function ($model){
                    if($model->hour_6 == 0)
                        return '';
                    else
                        return $model->hour_6;
                    
                },
            ],
            ['attribute' =>'hour_7',
                'options' => ['style' => 'width: 210px; max-width: 210px;'],
                'contentOptions' => ['style' => 'width: 210px; max-width: 210px;'],
            'format' => ['decimal', 0],    
            'value' => function ($model){
                    if($model->hour_7 == 0)
                        return '';
                    else
                        return $model->hour_7;
                    
                },
            ],
            ['attribute' =>'hour_8',
                'options' => ['style' => 'width: 210px; max-width: 210px;'],
                'contentOptions' => ['style' => 'width: 210px; max-width: 210px;'],
            'format' => ['decimal', 0],    
            'value' => function ($model){
                    if($model->hour_8 == 0)
                        return '';
                    else
                        return $model->hour_8;
                    
                },
            ],
            ['attribute' =>'hour_9',
                'options' => ['style' => 'width: 210px; max-width: 210px;'],
                'contentOptions' => ['style' => 'width: 210px; max-width: 210px;'],
             'format' => ['decimal', 0],   
            'value' => function ($model){
                    if($model->hour_9 == 0)
                        return '';
                    else
                        return $model->hour_9;
                    
                },
            ],
            ['attribute' =>'hour_10',
                'options' => ['style' => 'width: 210px; max-width: 210px;'],
                'contentOptions' => ['style' => 'width: 210px; max-width: 210px;'],
             'format' => ['decimal', 0],
            'value' => function ($model){
                    if($model->hour_10 == 0)
                        return '';
                    else
                        return $model->hour_10;
                    
                },
            ],
           ['attribute' =>'hour_11',
               'options' => ['style' => 'width: 210px; max-width: 210px;'],
               'contentOptions' => ['style' => 'width: 210px; max-width: 210px;'],
            'format' => ['decimal', 0],   
            'value' => function ($model){
                    if($model->hour_11 == 0)
                        return '';
                    else
                        return $model->hour_11;
                    
                },
            ],
           ['attribute' =>'hour_12',
               'options' => ['style' => 'width: 210px; max-width: 210px;'],
               'contentOptions' => ['style' => 'width: 210px; max-width: 210px;'],
            'format' => ['decimal', 0],   
            'value' => function ($model){
                    if($model->hour_12 == 0)
                        return '';
                    else
                        return $model->hour_12;
                    
                },
            ],
            ['attribute' =>'hour_13',
                'options' => ['style' => 'width: 210px; max-width: 210px;'],
                'contentOptions' => ['style' => 'width: 210px; max-width: 210px;'],
            'format' => ['decimal', 0],    
            'value' => function ($model){
                    if($model->hour_13 == 0)
                        return '';
                    else
                        return $model->hour_13;
                    
                },
            ],
            ['attribute' =>'hour_14',
                'options' => ['style' => 'width: 210px; max-width: 210px;'],
                'contentOptions' => ['style' => 'width: 210px; max-width: 210px;'],
            'format' => ['decimal', 0],    
            'value' => function ($model){
                    if($model->hour_14 == 0)
                        return '';
                    else
                        return $model->hour_14;
                    
                },
            ],
            ['attribute' =>'hour_15',
                'options' => ['style' => 'width: 210px; max-width: 210px;'],
                'contentOptions' => ['style' => 'width: 210px; max-width: 210px;'],
            'format' => ['decimal', 0],    
            'value' => function ($model){
                    if($model->hour_15 == 0)
                        return '';
                    else
                        return $model->hour_15;
                    
                },
            ],
            ['attribute' =>'hour_16',
                'options' => ['style' => 'width: 210px; max-width: 210px;'],
                'contentOptions' => ['style' => 'width: 210px; max-width: 210px;'],
            'format' => ['decimal', 0],    
            'value' => function ($model){
                    if($model->hour_16 == 0)
                        return '';
                    else
                        return $model->hour_16;
                    
                },
            ],
            ['attribute' =>'hour_17',
                'options' => ['style' => 'width: 210px; max-width: 210px;'],
                'contentOptions' => ['style' => 'width: 210px; max-width: 210px;'],
            'format' => ['decimal', 0],    
            'value' => function ($model){
                    if($model->hour_17 == 0)
                        return '';
                    else
                        return $model->hour_17;
                    
                },
            ],
            ['attribute' =>'hour_18',
                'options' => ['style' => 'width: 210px; max-width: 210px;'],
                'contentOptions' => ['style' => 'width: 210px; max-width: 210px;'],
            'format' => ['decimal', 0],    
            'value' => function ($model){
                    if($model->hour_18 == 0)
                        return '';
                    else
                        return $model->hour_18;
                    
                },
            ],
           ['attribute' =>'hour_19',
               'options' => ['style' => 'width: 210px; max-width: 210px;'],
               'contentOptions' => ['style' => 'width: 210px; max-width: 210px;'],
            'format' => ['decimal', 0],   
            'value' => function ($model){
                    if($model->hour_19 == 0)
                        return '';
                    else
                        return $model->hour_19;
                    
                },
            ],
            ['attribute' =>'hour_20',
                'options' => ['style' => 'width: 210px; max-width: 210px;'],
                'contentOptions' => ['style' => 'width: 210px; max-width: 210px;'],
            'format' => ['decimal', 0],    
            'value' => function ($model){
                    if($model->hour_20 == 0)
                        return '';
                    else
                        return $model->hour_20;
                    
                },
            ],
           ['attribute' =>'hour_21',
               'options' => ['style' => 'width: 210px; max-width: 210px;'],
               'contentOptions' => ['style' => 'width: 210px; max-width: 210px;'],
            'format' => ['decimal', 0],   
            'value' => function ($model){
                    if($model->hour_21 == 0)
                        return '';
                    else
                        return $model->hour_21;
                    
                },
            ],
            ['attribute' =>'hour_22',
                'options' => ['style' => 'width: 210px; max-width: 210px;'],
                'contentOptions' => ['style' => 'width: 210px; max-width: 210px;'],
            'format' => ['decimal', 0],    
            'value' => function ($model){
                    if($model->hour_22 == 0)
                        return '';
                    else
                        return $model->hour_22;
                    
                },
            ],
           ['attribute' =>'hour_23',
               'options' => ['style' => 'width: 210px; max-width: 210px;'],
               'contentOptions' => ['style' => 'width: 210px; max-width: 210px;'],
            'format' => ['decimal', 0],   
            'value' => function ($model){
                    if($model->hour_23 == 0)
                        return '';
                    else
                        return $model->hour_23;
                    
                },
            ],
            ['attribute' =>'hour_24',
                'options' => ['style' => 'width: 210px; max-width: 210px;'],
                'contentOptions' => ['style' => 'width: 210px; max-width: 210px;'],
            'format' => ['decimal', 0],    
            'value' => function ($model){
                    if($model->hour_24 == 0)
                        return '';
                    else
                        return $model->hour_24;
                    
                },
            ],
            ['attribute' =>'hour_25',
                'options' => ['style' => 'width: 210px; max-width: 210px;'],
                'contentOptions' => ['style' => 'width: 210px; max-width: 210px;'],
            'format' => ['decimal', 0],    
            'value' => function ($model){
                    if($model->hour_25 == 0)
                        return '';
                    else
                        return $model->hour_25;
                    
                },
            ],
            ['attribute' =>'allday',
                'options' => ['style' => 'width: 210px; max-width: 210px;'],
                'contentOptions' => ['style' => 'width: 210px; max-width: 210px;'],
            'format' => ['decimal', 0],  
            ],    
             [
                /**
                 * Указываем класс колонки
                 */
                'class' => \yii\grid\ActionColumn::class,
                 'buttons'=>[
                                    
                  'update'=>function ($url, $model) {
                        $customurl=Yii::$app->getUrlManager()->createUrl(['/site/update',
                            'id'=>$model['id'],'kod'=>$model['kod_pokaz'],'mod'=>'data_pokaz','year'=>$model['year'],
                            'month'=>$model['month'],'number'=>$model['day']]);
                        return \yii\helpers\Html::a( '<span class="glyphicon glyphicon-pencil"></span>', $customurl,
                                                ['title' => Yii::t('yii', 'Редагувати'), 'data-pjax' => '0']);
                  }
                ],
                /**
                 * Определяем набор кнопочек. По умолчанию {view} {update} {delete}
                 */
                'template' => '{update}',
            ],
        ],
    ]);}
    else
      echo GridView::widget([
        'dataProvider' => $dataProvider,
          'tableOptions' => [
              'class' => 'table table-striped table-bordered table-condensed'],

        'summary' => false,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'kod_pokaz',
            'kod_obj',
            'nazv',

            ['attribute' =>'hour_1',
                'options' => ['style' => 'width: 210px; max-width: 210px;'],
                'contentOptions' => ['style' => 'width: 210px; max-width: 210px;'],
                'format' => ['decimal', 0],    // Этот формат нужен для отображения чисел с разделителями разрядов
                'value' => function ($model){
                    if($model->hour_1 == 0)
                        return '';
                    else
                        return $model->hour_1;

                },

            ],
            ['attribute' =>'hour_2',
                'options' => ['style' => 'width: 210px; max-width: 210px;'],
                'contentOptions' => ['style' => 'width: 210px; max-width: 210px;'],
                'format' => ['decimal', 0],
                'value' => function ($model){
                    if($model->hour_2 == 0)
                        return '';
                    else
                        return $model->hour_2;

                },
            ],
            ['attribute' =>'hour_3',
                'options' => ['style' => 'width: 210px; max-width: 210px;'],
                'contentOptions' => ['style' => 'width: 210px; max-width: 210px;'],
                'format' => ['decimal', 0],
                'value' => function ($model){
                    if($model->hour_3 == 0)
                        return '';
                    else
                        return $model->hour_3;

                },
            ],
            ['attribute' =>'hour_4',
                'options' => ['style' => 'width: 210px; max-width: 210px;'],
                'contentOptions' => ['style' => 'width: 210px; max-width: 210px;'],
                'format' => ['decimal', 0],
                'value' => function ($model){
                    if($model->hour_4 == 0)
                        return '';
                    else
                        return $model->hour_4;

                },
            ],
            ['attribute' =>'hour_5',
                'options' => ['style' => 'width: 210px; max-width: 210px;'],
                'contentOptions' => ['style' => 'width: 210px; max-width: 210px;'],
                'format' => ['decimal', 0],
                'value' => function ($model){
                    if($model->hour_5 == 0)
                        return '';
                    else
                        return $model->hour_5;

                },
            ],
            ['attribute' =>'hour_6',
                'options' => ['style' => 'width: 210px; max-width: 210px;'],
                'contentOptions' => ['style' => 'width: 210px; max-width: 210px;'],
                'format' => ['decimal', 0],
                'value' => function ($model){
                    if($model->hour_6 == 0)
                        return '';
                    else
                        return $model->hour_6;

                },
            ],
            ['attribute' =>'hour_7',
                'options' => ['style' => 'width: 210px; max-width: 210px;'],
                'contentOptions' => ['style' => 'width: 210px; max-width: 210px;'],
                'format' => ['decimal', 0],
                'value' => function ($model){
                    if($model->hour_7 == 0)
                        return '';
                    else
                        return $model->hour_7;

                },
            ],
            ['attribute' =>'hour_8',
                'options' => ['style' => 'width: 210px; max-width: 210px;'],
                'contentOptions' => ['style' => 'width: 210px; max-width: 210px;'],
                'format' => ['decimal', 0],
                'value' => function ($model){
                    if($model->hour_8 == 0)
                        return '';
                    else
                        return $model->hour_8;

                },
            ],
            ['attribute' =>'hour_9',
                'options' => ['style' => 'width: 210px; max-width: 210px;'],
                'contentOptions' => ['style' => 'width: 210px; max-width: 210px;'],
                'format' => ['decimal', 0],
                'value' => function ($model){
                    if($model->hour_9 == 0)
                        return '';
                    else
                        return $model->hour_9;

                },
            ],
            ['attribute' =>'hour_10',
                'options' => ['style' => 'width: 210px; max-width: 210px;'],
                'contentOptions' => ['style' => 'width: 210px; max-width: 210px;'],
                'format' => ['decimal', 0],
                'value' => function ($model){
                    if($model->hour_10 == 0)
                        return '';
                    else
                        return $model->hour_10;

                },
            ],
            ['attribute' =>'hour_11',
                'options' => ['style' => 'width: 210px; max-width: 210px;'],
                'contentOptions' => ['style' => 'width: 210px; max-width: 210px;'],
                'format' => ['decimal', 0],
                'value' => function ($model){
                    if($model->hour_11 == 0)
                        return '';
                    else
                        return $model->hour_11;

                },
            ],
            ['attribute' =>'hour_12',
                'options' => ['style' => 'width: 210px; max-width: 210px;'],
                'contentOptions' => ['style' => 'width: 210px; max-width: 210px;'],
                'format' => ['decimal', 0],
                'value' => function ($model){
                    if($model->hour_12 == 0)
                        return '';
                    else
                        return $model->hour_12;

                },
            ],
            ['attribute' =>'hour_13',
                'options' => ['style' => 'width: 210px; max-width: 210px;'],
                'contentOptions' => ['style' => 'width: 210px; max-width: 210px;'],
                'format' => ['decimal', 0],
                'value' => function ($model){
                    if($model->hour_13 == 0)
                        return '';
                    else
                        return $model->hour_13;

                },
            ],
            ['attribute' =>'hour_14',
                'options' => ['style' => 'width: 210px; max-width: 210px;'],
                'contentOptions' => ['style' => 'width: 210px; max-width: 210px;'],
                'format' => ['decimal', 0],
                'value' => function ($model){
                    if($model->hour_14 == 0)
                        return '';
                    else
                        return $model->hour_14;

                },
            ],
            ['attribute' =>'hour_15',
                'options' => ['style' => 'width: 210px; max-width: 210px;'],
                'contentOptions' => ['style' => 'width: 210px; max-width: 210px;'],
                'format' => ['decimal', 0],
                'value' => function ($model){
                    if($model->hour_15 == 0)
                        return '';
                    else
                        return $model->hour_15;

                },
            ],
            ['attribute' =>'hour_16',
                'options' => ['style' => 'width: 210px; max-width: 210px;'],
                'contentOptions' => ['style' => 'width: 210px; max-width: 210px;'],
                'format' => ['decimal', 0],
                'value' => function ($model){
                    if($model->hour_16 == 0)
                        return '';
                    else
                        return $model->hour_16;

                },
            ],
            ['attribute' =>'hour_17',
                'options' => ['style' => 'width: 210px; max-width: 210px;'],
                'contentOptions' => ['style' => 'width: 210px; max-width: 210px;'],
                'format' => ['decimal', 0],
                'value' => function ($model){
                    if($model->hour_17 == 0)
                        return '';
                    else
                        return $model->hour_17;

                },
            ],
            ['attribute' =>'hour_18',
                'options' => ['style' => 'width: 210px; max-width: 210px;'],
                'contentOptions' => ['style' => 'width: 210px; max-width: 210px;'],
                'format' => ['decimal', 0],
                'value' => function ($model){
                    if($model->hour_18 == 0)
                        return '';
                    else
                        return $model->hour_18;

                },
            ],
            ['attribute' =>'hour_19',
                'options' => ['style' => 'width: 210px; max-width: 210px;'],
                'contentOptions' => ['style' => 'width: 210px; max-width: 210px;'],
                'format' => ['decimal', 0],
                'value' => function ($model){
                    if($model->hour_19 == 0)
                        return '';
                    else
                        return $model->hour_19;

                },
            ],
            ['attribute' =>'hour_20',
                'options' => ['style' => 'width: 210px; max-width: 210px;'],
                'contentOptions' => ['style' => 'width: 210px; max-width: 210px;'],
                'format' => ['decimal', 0],
                'value' => function ($model){
                    if($model->hour_20 == 0)
                        return '';
                    else
                        return $model->hour_20;

                },
            ],
            ['attribute' =>'hour_21',
                'options' => ['style' => 'width: 210px; max-width: 210px;'],
                'contentOptions' => ['style' => 'width: 210px; max-width: 210px;'],
                'format' => ['decimal', 0],
                'value' => function ($model){
                    if($model->hour_21 == 0)
                        return '';
                    else
                        return $model->hour_21;

                },
            ],
            ['attribute' =>'hour_22',
                'options' => ['style' => 'width: 210px; max-width: 210px;'],
                'contentOptions' => ['style' => 'width: 210px; max-width: 210px;'],
                'format' => ['decimal', 0],
                'value' => function ($model){
                    if($model->hour_22 == 0)
                        return '';
                    else
                        return $model->hour_22;

                },
            ],
            ['attribute' =>'hour_23',
                'options' => ['style' => 'width: 210px; max-width: 210px;'],
                'contentOptions' => ['style' => 'width: 210px; max-width: 210px;'],
                'format' => ['decimal', 0],
                'value' => function ($model){
                    if($model->hour_23 == 0)
                        return '';
                    else
                        return $model->hour_23;

                },
            ],
            ['attribute' =>'hour_24',
                'options' => ['style' => 'width: 210px; max-width: 210px;'],
                'contentOptions' => ['style' => 'width: 210px; max-width: 210px;'],
                'format' => ['decimal', 0],
                'value' => function ($model){
                    if($model->hour_24 == 0)
                        return '';
                    else
                        return $model->hour_24;

                },
            ],
            ['attribute' =>'hour_25',
                'options' => ['style' => 'width: 210px; max-width: 210px;'],
                'contentOptions' => ['style' => 'width: 210px; max-width: 210px;'],
                'format' => ['decimal', 0],
                'value' => function ($model){
                    if($model->hour_25 == 0)
                        return '';
                    else
                        return $model->hour_25;

                },
            ],
            ['attribute' =>'allday',
                'options' => ['style' => 'width: 210px; max-width: 210px;'],
                'contentOptions' => ['style' => 'width: 210px; max-width: 210px;'],
                'format' => ['decimal', 0],
            ],

        ],
    ]);

    ?>


    <?= Html::a('Сформувати макет', ['site/make?year='.$year.'&month='.$month.'&number='.$number],
            ['class' => 'btn btn-primary'])  ?>
    <?php
       if($year==$y && $month==$m && $number>=$n)  // За прошедшие периоды кнопка не показывается
        echo Html::a('Видалити', ['site/delete?year='.$year.'&month='.$month.'&number='.$number],
        ['class' => 'btn btn-danger']);  ?>
    <?= Html::a('Сброс в Excel', ['site/pokaz?year='.$year.'&month='.$month.'&number='.$number.'&mon='.$mon.'&item=Excel'],
        ['class' => 'btn btn-info'])  ?>

    <?php
        
            echo Yii::$app->session->getFlash('mess');
            
    ?>
</div>





