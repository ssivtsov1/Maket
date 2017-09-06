<?php
// Модель файла шаблона
namespace app\models;

class Template extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'template';
    }

    public function rules()
    {
        return [

           [['kod_pokaz','kod_obj','allday','year','month','day',
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


