<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
//use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;
use app\models\spr_pokaz;
use app\models\template;
use app\models\requestsearch;

class SpravController extends AppController
{  
    public $spr='0';
    public $layout = 'index';
    
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

       
    // Справочник показателей
    public function actionSprav_pokaz()
    {
        $model = new spr_pokaz();
        $model = $model::find()->all();
        $dataProvider = new ActiveDataProvider([
         'query' => spr_pokaz::find(),
         'sort' => ['defaultOrder'=> ['kod'=>SORT_ASC]]
        ]); 
       
            return $this->render('sprav_pokaz', [
                'model' => $model,'dataProvider' => $dataProvider,
            ]);
       
    }
//  Удаление строки из справочника показателей
    public function actionDelete($id,$mod)
    {
        $model = spr_pokaz::findOne($id);
        
        $model->delete();
        // Изменение таблицы шаблона
                $sql = 'DELETE FROM template';
                Yii::$app->db->createCommand($sql)->execute();
                $sql = 'INSERT INTO template (year,month,day,kod_obl,kod_pokaz,kod_obj,hour_1,hour_2,hour_3,hour_4,
                        hour_5,hour_6,hour_7,hour_8,hour_9,hour_10,hour_11,hour_12,
                        hour_13,hour_14,hour_15,hour_16,hour_17,hour_18,hour_19,hour_20,
                        hour_21,hour_22,hour_23,hour_24,hour_25,allday,id)
                         VALUES(2000,13,1,3,';
                $model = $model::find()->all();
                $i=1;
                foreach($model as $model)
                {                   
                    $sql = $sql . $model['kod'] . ','. "'".$model['kod_obj']."'" . ',';

                    $sql = $sql . '0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'.$i.')';
                    Yii::$app->db->createCommand($sql)->execute();
                    $sql = 'INSERT INTO template (year,month,day,kod_obl,kod_pokaz,kod_obj,hour_1,hour_2,hour_3,hour_4,
                        hour_5,hour_6,hour_7,hour_8,hour_9,hour_10,hour_11,hour_12,
                        hour_13,hour_14,hour_15,hour_16,hour_17,hour_18,hour_19,hour_20,
                        hour_21,hour_22,hour_23,hour_24,hour_25,allday,id)
                         VALUES(2000,13,1,3,';
                    $i++;
                    
                } 
        return $this->redirect(['sprav/sprav_pokaz']);
    }
//  Обновление справочника показателей
    public function actionUpdate($id,$mod)
    {
        $model = spr_pokaz::findOne($id);
        
        if ($model->load(Yii::$app->request->post()))
        {  
            
            if(!$model->save(false))
            {  var_dump($model);return;}
            // Изменение таблицы шаблона
                $sql = 'DELETE FROM template';
                Yii::$app->db->createCommand($sql)->execute();
                $sql = 'INSERT INTO template (year,month,day,kod_obl,kod_pokaz,kod_obj,hour_1,hour_2,hour_3,hour_4,
                        hour_5,hour_6,hour_7,hour_8,hour_9,hour_10,hour_11,hour_12,
                        hour_13,hour_14,hour_15,hour_16,hour_17,hour_18,hour_19,hour_20,
                        hour_21,hour_22,hour_23,hour_24,hour_25,allday,id)
                         VALUES(2000,13,1,3,';
                $model = $model::find()->all();
                $i=1;
                foreach($model as $model)
                {                   
                    $sql = $sql . $model['kod'] . ',' . "'".$model['kod_obj']."'" . ',';
//                    if($model['kod']==300) $sql = $sql . "'001456'" . ',';
                    $sql = $sql . '0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'.$i.')';
                    Yii::$app->db->createCommand($sql)->execute();
                    $sql = 'INSERT INTO template (year,month,day,kod_obl,kod_pokaz,kod_obj,hour_1,hour_2,hour_3,hour_4,
                        hour_5,hour_6,hour_7,hour_8,hour_9,hour_10,hour_11,hour_12,
                        hour_13,hour_14,hour_15,hour_16,hour_17,hour_18,hour_19,hour_20,
                        hour_21,hour_22,hour_23,hour_24,hour_25,allday,id)
                         VALUES(2000,13,1,3,';
                    $i++;
                    
                } 
            
                return $this->redirect(['sprav/sprav_pokaz']);
            
        } else {
            
            return $this->render('sprav_upd', [
                'model' => $model,

            ]);
        }
    }
//    Создание записи в справочнике показателей
     public function actionCreatepokaz()
    {
        $model = new spr_pokaz();
        if ($model->load(Yii::$app->request->post()))
        {  
            if($model->save(false)) 
            {
                // Изменение таблицы шаблона
                $sql = 'DELETE FROM template';
                Yii::$app->db->createCommand($sql)->execute();
                $sql = 'INSERT INTO template (year,month,day,kod_obl,kod_pokaz,kod_obj,hour_1,hour_2,hour_3,hour_4,
                        hour_5,hour_6,hour_7,hour_8,hour_9,hour_10,hour_11,hour_12,
                        hour_13,hour_14,hour_15,hour_16,hour_17,hour_18,hour_19,hour_20,
                        hour_21,hour_22,hour_23,hour_24,hour_25,allday,id)
                         VALUES(2000,13,1,3,';
                $model = $model::find()->all();
                $i=1;

                foreach($model as $model)
                {                   
                    $sql = $sql . $model['kod'] . ','. "'".$model['kod_obj']."'" . ',';

                    $sql = $sql . '0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'.$i.')';
                    Yii::$app->db->createCommand($sql)->execute();
                    $sql = 'INSERT INTO template (year,month,day,kod_obl,kod_pokaz,kod_obj,hour_1,hour_2,hour_3,hour_4,
                        hour_5,hour_6,hour_7,hour_8,hour_9,hour_10,hour_11,hour_12,
                        hour_13,hour_14,hour_15,hour_16,hour_17,hour_18,hour_19,hour_20,
                        hour_21,hour_22,hour_23,hour_24,hour_25,allday,id)
                         VALUES(2000,13,1,3,';
                    $i++;
                    
                } 
//                 Изменение таблицы показателей текущего месяца
               $z='SELECT * FROM `template` WHERE kod_pokaz not in(select kod_pokaz from data_pokaz where year='.
                    date('Y').' and month='.date('n').')';
                $model = template::findBySql($z)->all();
                
                $sql = 'INSERT INTO data_pokaz (year,month,day,kod_obl,kod_pokaz,kod_obj,hour_1,hour_2,hour_3,hour_4,
                        hour_5,hour_6,hour_7,hour_8,hour_9,hour_10,hour_11,hour_12,
                        hour_13,hour_14,hour_15,hour_16,hour_17,hour_18,hour_19,hour_20,
                        hour_21,hour_22,hour_23,hour_24,hour_25,allday)
                         VALUES('.date('Y').','.date('n').','.date('j').',3,';
                foreach($model as $model)
                {                   
                    $sql = $sql . $model['kod_pokaz'] . ','. "'".$model['kod_obj']."'" . ',';

                    $sql = $sql . '0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0)';
                    Yii::$app->db->createCommand($sql)->execute();
                    $sql = 'INSERT INTO data_pokaz (year,month,day,kod_obl,kod_pokaz,kod_obj,hour_1,hour_2,hour_3,hour_4,
                        hour_5,hour_6,hour_7,hour_8,hour_9,hour_10,hour_11,hour_12,
                        hour_13,hour_14,hour_15,hour_16,hour_17,hour_18,hour_19,hour_20,
                        hour_21,hour_22,hour_23,hour_24,hour_25,allday)
                         VALUES('.date('Y').','.date('n').','.date('j').',3,';
                    $i++;
                    
                } 
                return $this->redirect(['sprav/sprav_pokaz']);
            }    
           
        } else {
           
            return $this->render('sprav_upd', [
                'model' => $model]);
            
        }
    }
  
}
