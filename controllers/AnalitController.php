<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
//use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;
use yii\data\SqlDataProvider;
use app\models\dataperiod;
use app\models\data_pokaz;


class AnalitController extends AppController
{
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

       
    // Аналитика за период (ввод данных)
    public function actionDataperiod()
    {
        $model = new dataperiod();

        if ($model->load(Yii::$app->request->post()))
        {   // Если данные в форму введены
            return $this->redirect(['period','date_begin' => $model->date_begin,'date_end' => $model->date_end,
                'kind' => $model->kind]);
        }
        else {
//  Форма для указания данных для аналитики
            return $this->render('dataperiod', [
                'model' => $model,
            ]);
        }
       
    }

    // Отображение аналитики за период показателей (происходит при нажатии на кн. OK)
    /*
     * Аргументы:
     * $date_begin - начальная дата
     * $date_end   - конечная дата
     * $kind - вид ведомости (1 - история, 2 - сумма по часам, 3 - среднее по часам)
     * вид всех ведомостей одинаковый, только для (1 - история) - добавляется колонка Дата
     * */
    public function actionPeriod($date_begin,$date_end,$kind)
    {
        //Преобразование дат
        $date_begin1 = date('Y-m-d', strtotime($date_begin));
        $date_end1 = date('Y-m-d', strtotime($date_end));
        $data = new data_pokaz();
        if($kind==1) {
//          Выборка показателей за указанный период с датами (история)
            $data = $data::find()->where(['between', 'date', $date_begin1, $date_end1])->all();
            $dataProvider = new ActiveDataProvider([
                'query' => data_pokaz::find()->where(['between', 'date', $date_begin1, $date_end1]),
            ]);
        }
        if($kind==2) {
//            Выборка показателей по сумме за каждый час за указанный период
            $sql = 'SELECT kod_pokaz,kod_obj,nazv,SUM(hour_1) as hour_1,SUM(hour_2) as hour_2,
            SUM(hour_3) as hour_3,SUM(hour_4) as hour_4,SUM(hour_5) as hour_5,
            SUM(hour_6) as hour_6,SUM(hour_7) as hour_7,SUM(hour_8) as hour_8,
            SUM(hour_9) as hour_9,SUM(hour_10) as hour_10,SUM(hour_11) as hour_11,
            SUM(hour_12) as hour_12,SUM(hour_13) as hour_14,SUM(hour_15) as hour_15,
            SUM(hour_16) as hour_16,SUM(hour_17) as hour_17,SUM(hour_18) as hour_18,
            SUM(hour_19) as hour_19,SUM(hour_20) as hour_20,SUM(hour_21) as hour_21,
            SUM(hour_22) as hour_22,SUM(hour_23) as hour_23,SUM(hour_24) as hour_24,
            SUM(hour_25) as hour_25,SUM(allday) as allday 
            FROM vPokaz
            WHERE date
            BETWEEN '."'".$date_begin1."'".
            ' AND '."'".$date_end1."'".
            ' GROUP BY kod_pokaz,kod_obj,nazv
            ORDER BY kod_pokaz';
            $data = $data::findBySql($sql)->all();
            $dataProvider = new ActiveDataProvider([
                'query' => data_pokaz::findBySql($sql),

            ]);
        }
        if($kind==3) {
//            Выборка показателей по среднему значению за каждый час за указанный период
            $sql = 'SELECT kod_pokaz,kod_obj,nazv,AVG(hour_1) as hour_1,AVG(hour_2) as hour_2,
            AVG(hour_3) as hour_3,AVG(hour_4) as hour_4,AVG(hour_5) as hour_5,
            AVG(hour_6) as hour_6,AVG(hour_7) as hour_7,AVG(hour_8) as hour_8,
            AVG(hour_9) as hour_9,AVG(hour_10) as hour_10,AVG(hour_11) as hour_11,
            AVG(hour_12) as hour_12,AVG(hour_13) as hour_14,AVG(hour_15) as hour_15,
            AVG(hour_16) as hour_16,AVG(hour_17) as hour_17,AVG(hour_18) as hour_18,
            AVG(hour_19) as hour_19,AVG(hour_20) as hour_20,AVG(hour_21) as hour_21,
            AVG(hour_22) as hour_22,AVG(hour_23) as hour_23,AVG(hour_24) as hour_24,
            AVG(hour_25) as hour_25,AVG(allday) as allday 
            FROM vPokaz
            WHERE date
            BETWEEN '."'".$date_begin1."'".
                ' AND '."'".$date_end1."'".
            ' GROUP BY kod_pokaz,kod_obj,nazv
            ORDER BY kod_pokaz';
            $data = $data::findBySql($sql)->all();
            $dataProvider = new ActiveDataProvider([
                'query' => data_pokaz::findBySql($sql),

            ]);
        }

        if (Yii::$app->request->get('item') == 'Excel' )
        {
            if($kind==1)
                $k1 = 'Аналітика показників з '.$date_begin.' по '.$date_end.'. Історія.';
            if($kind==2)
                $k1 = 'Аналітика показників з '.$date_begin.' по '.$date_end.'. Сума по годинам доби.';
            if($kind==3)
                $k1 = 'Аналітика показників з '.$date_begin.' по '.$date_end.'. Середнє значення по годинам доби.';

//             Сброс в Excel
            if($kind<>1){
            \moonland\phpexcel\Excel::widget([
                'models' => $data,
                'mode' => 'export', //default value as 'export'
                'format' => 'Excel2007',
                'hap' => $k1, //cтрока шапки таблицы
                'columns' => ['kod_pokaz','kod_obj','nazv','hour_1','hour_2','hour_3',
                    'hour_4','hour_5','hour_6','hour_7','hour_8','hour_9',
                    'hour_10','hour_11','hour_12','hour_13','hour_14','hour_15',
                    'hour_16','hour_17','hour_18','hour_19','hour_20','hour_21',
                    'hour_22','hour_23','hour_24','hour_25','allday'], //without header working, because the header will be get label from attribute label.
                'headers' => 
                    ['kod_pokaz' => 'Код','Kod_obj' => 'Код об’єкта', 'nazv' => 'Назва показника',
                    'hour_1' => '1 година',
                    'hour_2' => '2 година',
                    'hour_3' => '3 година',
                    'hour_4' => '4 година',
                    'hour_5' => '5 година',
                    'hour_6' => '6 година',
                    'hour_7' => '7 година',
                    'hour_8' => '8 година',
                    'hour_9' => '9 година',
                    'hour_10' => '10 година',
                    'hour_11' => '11 година',
                    'hour_12' => '12 година',
                    'hour_13' => '13 година',
                    'hour_14' => '14 година',
                    'hour_15' => '15 година',
                    'hour_16' => '16 година',
                    'hour_17' => '17 година',
                    'hour_18' => '18 година',
                    'hour_19' => '19 година',
                    'hour_20' => '20 година',
                    'hour_21' => '21 година',
                    'hour_22' => '22 година',
                    'hour_23' => '23 година',
                    'hour_24' => '24 година',
                    'hour_25' => '25 година',
                    'allday' =>  'Доба',
                ],
            ]);}
        else
//            Сдесь только добавляется колонка Дата
        { \moonland\phpexcel\Excel::widget([
                'models' => $data,
                'mode' => 'export', //default value as 'export'
                'format' => 'Excel2007',
                'hap' => $k1, //cтрока шапки таблицы
                'columns' => ['date','kod_pokaz','kod_obj','nazv','hour_1','hour_2','hour_3',
                    'hour_4','hour_5','hour_6','hour_7','hour_8','hour_9',
                    'hour_10','hour_11','hour_12','hour_13','hour_14','hour_15',
                    'hour_16','hour_17','hour_18','hour_19','hour_20','hour_21',
                    'hour_22','hour_23','hour_24','hour_25','allday'], //without header working, because the header will be get label from attribute label.
                'headers' => ['date' => 'Дата','kod_pokaz' => 'Код','Kod_obj' => 'Код об’єкта', 'nazv' => 'Назва показника',
                    'hour_1' => '1 година',
                    'hour_2' => '2 година',
                    'hour_3' => '3 година',
                    'hour_4' => '4 година',
                    'hour_5' => '5 година',
                    'hour_6' => '6 година',
                    'hour_7' => '7 година',
                    'hour_8' => '8 година',
                    'hour_9' => '9 година',
                    'hour_10' => '10 година',
                    'hour_11' => '11 година',
                    'hour_12' => '12 година',
                    'hour_13' => '13 година',
                    'hour_14' => '14 година',
                    'hour_15' => '15 година',
                    'hour_16' => '16 година',
                    'hour_17' => '17 година',
                    'hour_18' => '18 година',
                    'hour_19' => '19 година',
                    'hour_20' => '20 година',
                    'hour_21' => '21 година',
                    'hour_22' => '22 година',
                    'hour_23' => '23 година',
                    'hour_24' => '24 година',
                    'hour_25' => '25 година',
                    'allday' =>  'Доба',
                ],
            ]);}


            return;
        }

//  Вывод результата аналитики
        return $this->render('period', ['data' => $data,'dataProvider' => $dataProvider,
            'date_begin' => $date_begin,'date_end' => $date_end,'kind' => $kind]);
    }

}
