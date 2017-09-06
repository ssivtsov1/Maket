<?php

// Модель для ввода исходных данных при запуске главной страницы
namespace app\models;

use yii\base\Model;

/**
 * Форма ввода поисковых данных при запуске
 */
class Index extends Model
{
    public $year; 
    public $month;
    public $number;
    
    public function attributeLabels()
    {
        return [
            'year' => 'Рік:',
            'month' => 'Місяць:',
            'number' => 'Число:',
        ];
    }

    public function rules()
    {
        return [
           
            [['year', 'month', 'number'], 'required'],
            ['type', 'default', 'value'=>'1'],
            
        ];
    }
 
}

