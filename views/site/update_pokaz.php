<?php
// Форма редактирования показателей
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\grid\GridView;
?>

<div class="form-group">
     <?php
     /*
      * $form = ActiveForm::begin([
        'layout' => 'inline',
        'fieldConfig' => [
            'labelOptions' => ['class' => ''],
            'enableError' => true,
        ]
      * */
   //debug($this->context->action->controller->method);

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
                 'options' => ['style' => 'width: 230px; max-width: 230px;'],
                 'contentOptions' => ['style' => 'width: 230px; max-width: 230px;'],
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


     $form = ActiveForm::begin(['layout' => 'horizontal',
         'fieldConfig' => [
             'horizontalCssClasses' => [
                 'label' => 'col-sm-lbl1',
                 'offset' => 'col-sm-offset-1',
                 'wrapper' => 'col-sm-data1',
                 'error' => '',
                 'hint' => '',
             ],
         ],]); ?>
    <h4 class="h3_nazv"><?= Html::encode("Години доби для показника з кодом $kod:") ?></h4>

    <?= $form->field($model, 'hour_1',['options' => ['onchange' => 'change_sum()']])->textInput() ?>
    <?= $form->field($model, 'hour_2',['options' => ['onchange' => 'change_sum()']])->textInput() ?>
    <?= $form->field($model, 'hour_3',['options' => ['onchange' => 'change_sum()']])->textInput() ?>
    <?= $form->field($model, 'hour_4',['options' => ['onchange' => 'change_sum()']])->textInput() ?>
    <?= $form->field($model, 'hour_5',['options' => ['onchange' => 'change_sum()']])->textInput() ?>
    <?= $form->field($model, 'hour_6',['options' => ['onchange' => 'change_sum()']])->textInput() ?>
    <?= $form->field($model, 'hour_7',['options' => ['onchange' => 'change_sum()']])->textInput() ?>
    <?= $form->field($model, 'hour_8',['options' => ['onchange' => 'change_sum()']])->textInput() ?>
    <?= $form->field($model, 'hour_9',['options' => ['onchange' => 'change_sum()']])->textInput() ?>
    <?= $form->field($model, 'hour_10',['options' => ['onchange' => 'change_sum()']])->textInput() ?>
    <?= $form->field($model, 'hour_11',['options' => ['onchange' => 'change_sum()']])->textInput() ?>
    <?= $form->field($model, 'hour_12',['options' => ['onchange' => 'change_sum()']])->textInput() ?>
    <?= $form->field($model, 'hour_13',['options' => ['onchange' => 'change_sum()']])->textInput() ?>
    <?= $form->field($model, 'hour_14',['options' => ['onchange' => 'change_sum()']])->textInput() ?>
    <?= $form->field($model, 'hour_15',['options' => ['onchange' => 'change_sum()']])->textInput() ?>
    <?= $form->field($model, 'hour_16',['options' => ['onchange' => 'change_sum()']])->textInput() ?>
    <?= $form->field($model, 'hour_17',['options' => ['onchange' => 'change_sum()']])->textInput() ?>
    <?= $form->field($model, 'hour_18',['options' => ['onchange' => 'change_sum()']])->textInput() ?>
    <?= $form->field($model, 'hour_19',['options' => ['onchange' => 'change_sum()']])->textInput() ?>
    <?= $form->field($model, 'hour_20',['options' => ['onchange' => 'change_sum()']])->textInput() ?>
    <?= $form->field($model, 'hour_21',['options' => ['onchange' => 'change_sum()']])->textInput() ?>
    <?= $form->field($model, 'hour_22',['options' => ['onchange' => 'change_sum()']])->textInput() ?>
    <?= $form->field($model, 'hour_23',['options' => ['onchange' => 'change_sum()']])->textInput() ?>
    <?= $form->field($model, 'hour_24',['options' => ['onchange' => 'change_sum()']])->textInput() ?>
    <?= $form->field($model, 'hour_25',['options' => ['onchange' => 'change_sum()']])->textInput() ?>
    <?= $form->field($model, 'allday',[
        'horizontalCssClasses' => [
            'wrapper' => 'col-sm-1','label' => 'col-sm-lblall'
        ]])->textInput() ?>



    </div>
    
    <br>
    <div class="form-horizontal">
        <?= Html::submitButton($model->isNewRecord ? 'ОК' : 'Зберегти', ['class' => $model->isNewRecord ? 'btn btn-success' :
            'btn btn-primary col-md-offset-1']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    <br>
    <button class="btn btn-info col-md-offset-1" onclick="zero()">Сброс</button>
</div>

<script>
// Автосуммирование - результат отображается в поле "весь день"
function change_sum(){
    var i=0,el,s=0,n;
    for(i=1;i<26;i++)
    {
        el='#datapokaz-hour_'+i;
        n=+$(el).val();
        s=s+n;
    }
    $('#datapokaz-allday').val(s);
}

// Обнуление всей строки
function zero(){
    var i=0,el;
    for(i=1;i<26;i++){
        el='#datapokaz-hour_'+i;
        $(el).val('');
    }
    $('#datapokaz-allday').val(0);
}

// Заменяет 0 на пустую строку во всех полях,
// если поле равно 0, срабатывает при загрузке страницы

window.onload=function(){
    var i=0,el,n;
    for(i=1;i<26;i++){
        el='#datapokaz-hour_'+i;
        n=+$(el).val();
        if(n==0)
        $(el).val('');
        $(el).addClass('add_input');
        //if(i>9) $(el).addClass('add_input');
    }
   // $('#datapokaz-allday').addClass('add_input');
}

</script>

