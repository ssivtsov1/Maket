<?php

// Форма ввода поисковых данных
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;

$this->title = 'Формування макету перетоку електроенергії';

//$this->params['breadcrumbs'][] = $this->title;
?>
<h4 class="h3_nazv">Введіть дані для розрахунку:<h4>
<div class="form-group">
<!-- col-xs-5-->
    <div class="row">
        <div class="col-xs-5">
            <?php $form = ActiveForm::begin(['id' => 'index',
                'options' => [
                    'class' => 'form-horizontal col-xs-3',
                    'enctype' => 'multipart/form-data'
                    
                ]]); ?>
            <?= $form->field($model, 'year') ?>
            <?= $form->field($model, 'month')->dropDownList(ArrayHelper::map(app\models\spr_month::find()->all(), 'id', 'nazv'))?> 
            <?= $form->field($model, 'number') ?>
            <div class="form-group">
                <?= Html::submitButton('OK', ['class' => 'btn btn-primary']); ?>

            </div>

            <?php

            ActiveForm::end(); ?>
        </div>
    </div>
</div>
  <?php

//    Вывод картинки в случайном порядке
    /*
        $n = rand(0,9);
        if($n<2)
        {
            echo Html::tag('div', Html::encode(' '), ['class' => 'side_content1']);
        }
        if(($n>1) && ($n<3))
        {
            echo Html::tag('div', Html::encode(' '), ['class' => 'side_content2']);
        }
        if($n>2 && $n<5)
        {
            echo Html::tag('div', Html::encode(' '), ['class' => 'side_content3']);
        }
        if($n>4 && $n<7)
        {
            echo Html::tag('div', Html::encode(' '), ['class' => 'side_content4']);
        }
        if($n>6 && $n<8)
        {
            echo Html::tag('div', Html::encode(' '), ['class' => 'side_content5']);
        }
        if($n>7)
        {
            echo Html::tag('div', Html::encode(' '), ['class' => 'side_content6']);
        }
    ?>
    */



    




