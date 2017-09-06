<?php
// Модель справочника показателей
namespace app\models;

class Spr_pokaz extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'sprpokaz';   // Таблица справочника показателей на MySQL сервере
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kod' => 'Код',
            'kod_obj' => 'Код об’єкта',
            'nazv' => 'Назва показника',
        ];
    }
   
    public function rules()
    {
        return [

            [['kod', 'nazv','kod_obj'], 'safe'],

        ];
    }

    public function getId()
    {
        return $this->getPrimaryKey();
    }


}

