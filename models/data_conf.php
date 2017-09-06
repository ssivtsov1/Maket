<?php
// Модель для данных настройки сайта
namespace app\models;

class Data_conf extends \yii\db\ActiveRecord
{

   
    public static function tableName()
    {
        return 'data_config';   // Таблица настроек
    }

    public function attributeLabels()
    {
        return [

            'kod_ek' => 'Код ЕК по ГКПО',
            'edrpou' => 'ЄДРПОУ ПНТ',

        ];
    }
   
    public function rules()
    {
        return [

            [['kod_ek','edrpou','id'], 'safe'],

        ];
    }

    public function getId()
    {
        return $this->getPrimaryKey();
    }

}

