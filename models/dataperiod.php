<?php


namespace app\models;

use yii\base\Model;

/**
 * Форма ввода данных для аналитики показателей
 * за период
 */
class Dataperiod extends Model
{
    public $date_begin;
    public $date_end ;
    public $kind = 1;   // Вид ведомости (1-история, 2-общая сумма, 3-среднее значение)
    
    public function attributeLabels()
    {
        return [
            'date_begin' => 'Початкова дата:',
            'date_end'   => 'Кінцева дата:',
            'kind' => ' ',
        ];
    }

    public function rules()
    {
        return [
           
            [['date_begin', 'date_end', 'kind'], 'required' , 'message' => 'Поле обов’язкове'],

        ];
    }
 
}

