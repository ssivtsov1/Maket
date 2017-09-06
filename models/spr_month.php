<?php
// Вспомогательная модель - используется как справочник месяцев
namespace app\models;

class Spr_month extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'spr_month';
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nazv' => 'Місяць',
        ];
    }
   
    public function rules()
    {
        return [

            [['nazv', 'id'], 'required'],

        ];
    }

    public function getId()
    {
        return $this->getPrimaryKey();
    }
}

