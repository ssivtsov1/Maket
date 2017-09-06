<?php
// Модель используется для редактирования данных показателей
namespace app\models;

class Datapokaz extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'data_pokaz';  // Табл. в БД
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'year' => 'Рік',
            'month' => 'Місяць',
            'day' => 'Число',
            'kod_pokaz' => 'Код показ.',
            'kod_obj' => 'Код об’єкта',
            'allday' => 'Доба:',
            'hour_1' => ' 1','hour_2' => ' 2','hour_3' => ' 3','hour_4' => ' 4',
            'hour_5' => ' 5','hour_6' => ' 6','hour_7' => ' 7','hour_8' => ' 8',
            'hour_9' => ' 9','hour_10' => '10','hour_11' => '11','hour_12' => '12',
            'hour_13' => '13','hour_14' => '14','hour_15' => '15','hour_16' => '16',
            'hour_17' => '17','hour_18' => '18','hour_19' => '19','hour_20' => '20',
            'hour_21' => '21','hour_22' => '22','hour_23' => '23','hour_24' => '24',
            'hour_25' => '25'
        ];
    }
   
    public function rules()
    {
        return [
            [['id','kod_pokaz','kod_obj','allday','year','month','day',
              'hour_1','hour_2','hour_3','hour_4','hour_5','hour_6','hour_7','hour_8','hour_9'
                ,'hour_10','hour_11','hour_12','hour_13','hour_14','hour_15','hour_16','hour_17','hour_18','hour_19'
                ,'hour_20','hour_21','hour_22','hour_23','hour_24','hour_25'],'safe'],
        ];
    }

    public function getId()
    {
        return $this->getPrimaryKey();
    }

}


