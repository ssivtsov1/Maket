<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
//use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;
use app\models\index;
use app\models\data_pokaz;
use app\models\datapokaz;
use app\models\data_conf;
use app\models\spr_month;
use app\models\User;
use app\models\loginform;


class SiteController extends AppController
{  /**
 * 
 * @return type
 */
    public $layout = 'index';   // Выбор файла шаблона
    //public $method = '';        // Нужно для передачи параметра в шаблон

//    public $layout = 'main';

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
//  Происходит при запуске сайта
    public function actionIndex()
    {

        if (!\Yii::$app->user->isGuest) {
            return $this->redirect(['site/formpokaz']);
        }

        $model = new loginform();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect(['site/formpokaz']);
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }

    }

    // Отображение данных по показателям
     public function actionFormpokaz()
    {
        $model = new index();

        $model->year = date('Y');
        $model->month = date('n');
        $model->number = date('j');
        $mon = new spr_month();
        $mon = $mon::find()->where(['id' => $model->month])->all();


            if ($model->load(Yii::$app->request->post()))
        {   
            return $this->redirect(['pokaz','year' => $model->year,'month' => $model->month,
                'number' => $model->number,'mon' => $mon[0]->nazv]);
            }
         else {

            return $this->render('index', [
                'model' => $model,
            ]);
        }
    }

//  Установки программы
    public function actionSet()
    {
        $model = new data_conf();
        $model = $model::find()->one();
        $dataProvider = new ActiveDataProvider([
            'query' => data_conf::find(),
        ]);
        return $this->render('set_prog', ['model' => $model,
            'dataProvider' => $dataProvider]);

    }

    // Отображение показателей (происходит при нажатии на кн. OK)
    /*
     * Аргументы:
     * $year - выбраный год
     * $month - выбраный месяц
     * $number - выбраное число
     * $mon - название месяца
     * */
    public function actionPokaz($year,$month,$number,$mon)
    {
        $data = new data_pokaz();
        $data = $data::find()->where(['year' => $year,'month' => $month,'day' => $number])->all();
        if(!$data) {
//  Если нет данных за выбранный день - то делаем запись пустых данных за этот день с таблицы шаблона
            unset($data);
            $sql = 'insert into data_pokaz(year,month,day,kod_obl,kod_pokaz,kod_obj,hour_1,hour_2,hour_3,hour_4,
                        hour_5,hour_6,hour_7,hour_8,hour_9,hour_10,hour_11,hour_12,
                        hour_13,hour_14,hour_15,hour_16,hour_17,hour_18,hour_19,hour_20,
                        hour_21,hour_22,hour_23,hour_24,hour_25,allday) 
                        select year,month,day,kod_obl,kod_pokaz,kod_obj,hour_1,hour_2,hour_3,hour_4,
                        hour_5,hour_6,hour_7,hour_8,hour_9,hour_10,hour_11,hour_12,
                        hour_13,hour_14,hour_15,hour_16,hour_17,hour_18,hour_19,hour_20,
                        hour_21,hour_22,hour_23,hour_24,hour_25,allday from template';
            Yii::$app->db->createCommand($sql)->execute();
//  Заменяем год, месяц и день на выбранные значения
            $sql = 'update data_pokaz set month='.$month.',year='.$year.',day='.$number.' where month=13';
            Yii::$app->db->createCommand($sql)->execute();
            
            $data = new data_pokaz();
            $data = $data::find()->where(['year' => $year,'month' => $month,'day' => $number])->all();
            $dataProvider = new ActiveDataProvider([
             'query' => data_pokaz::find()->where(['year' => $year,'month' => $month,'day' => $number]),

              ]); 
        }
        else
        $dataProvider = new ActiveDataProvider([
             'query' => data_pokaz::find()->where(['year' => $year,'month' => $month,'day' => $number]),
              ]);

        if (Yii::$app->request->get('item') == 'Excel' )
        {
//                Сброс в Excel
                \moonland\phpexcel\Excel::widget([
                    'models' => $data,
                    'mode' => 'export', //default value as 'export'
                    'format' => 'Excel2007',
                    'hap' => 'Показники за '.mb_strtolower($mon,'UTF-8').' місяць '.$year.' року. '.$number. ' число.', //cтрока шапки таблицы
                    'columns' => ['kod_pokaz','kod_obj','nazv','hour_1','hour_2','hour_3',
                        'hour_4','hour_5','hour_6','hour_7','hour_8','hour_9',
                        'hour_10','hour_11','hour_12','hour_13','hour_14','hour_15',
                        'hour_16','hour_17','hour_18','hour_19','hour_20','hour_21',
                        'hour_22','hour_23','hour_24','hour_25','allday'], //without header working, because the header will be get label from attribute label.
                    'headers' => ['kod_pokaz' => 'Код','Kod_obj' => 'Код об’єкта', 'nazv' => 'Назва показника',
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
                ]);
            return;
            }

        return $this->render('pokaz', ['year' => $year,'month' => $month,
            'number' => $number,'data' => $data,'dataProvider' => $dataProvider,'mon' => $mon]);
    }

//      Обновление справочника показателей
/*
     * Аргументы:
     * $id - id записи
 *   * $kod - код показателя
     * $mod - название модели
     * $year - выбраный год
     * $month - выбраный месяц
     * $number - выбраное число
     *
 * */
       public function actionUpdate($id,$kod,$mod,$year,$month,$number)
    {
        $mon = new spr_month();
        $mon = $mon::find()->where(['id'=>$month])->all();
        $dataProvider = new ActiveDataProvider([
            'query' => data_pokaz::find()->where(['year' => $year,'month' => $month,'day' => $number]),
        ]);


        $model = datapokaz::findOne($id);
//        debug($model);
//        return;



        if ($model->load(Yii::$app->request->post()))
        {

            for($i=1;$i<26;$i++){  // Избавляемся от null в полях ввода показаний
            $pole = 'hour_'.$i;
            if(empty($model->$pole)) $model->$pole = 0;

        }

            if(!$model->save(false))
            {  var_dump($model);return;}
            
            if($mod=='data_pokaz')
                return $this->redirect(['pokaz','year' => $year,'month' => $month,
                'number' => $number,'mon' => $mon[0]->nazv]);
        } else {
            $this->method = 'update_pokaz';
            if($mod=='data_pokaz')
            return $this->render('update_pokaz', ['model' => $model,'kod' => $kod,
                'dataProvider' => $dataProvider,'method' => $this->method ]);
        }
    }

    //      Обновление справочника настроек
    public function actionUpdate_set_prog($id,$mod)
    {
        $model = data_conf::findOne($id);
        if ($model->load(Yii::$app->request->post()))
        {
            if(!$model->save(false))
            {  var_dump($model);return;}

            if($mod=='model')
                return $this->redirect(['site/set']);
        } else {

            if($mod=='model')
                return $this->render('update_set_prog', ['model' => $model,]);
        }
    }
    
    // Формирование файла макета
    // Аргументы - год, месяц и число
    public function actionMake($year,$month,$number)
    {
        $data = new data_pokaz();
        $data = $data::find()->where(['year' => $year,'month' => $month,'day' => $number])->all();
        $conf = new data_conf();
        $conf = $conf::find()->all();

        date_default_timezone_set('Europe/Kiev');  // Установка правильной временной зоны (чтобы избавиться от мирового времени)

        $dir = getcwd();
        chdir('../result');

        array_map('unlink', glob("*_10019.txt")); // Удаляем все файлы макетов
        //Форм. имя файла
        $_name = date('d').date('m').date('Y').'_'.date('His').'_10019.txt';
        $f = fopen($_name,'w');
        $s = '((//10019:'.$year.$month.$number.':'.$conf[0]->kod_ek.':'.$conf[0]->edrpou.':3:++';
        fputs($f,$s."\r\n");

        foreach($data as $data)
        {
              $s = "($data->kod_pokaz):" . $data->allday . ':' . $data->hour_1 . ':' . $data->hour_2 . ':'
                    . $data->hour_3 . ':' . $data->hour_4 . ':' . $data->hour_5 . ':' . $data->hour_6 . ':'
                    . $data->hour_7 . ':' . $data->hour_8 . ':' . $data->hour_9 . ':' . $data->hour_10 . ':'
                    . $data->hour_11 . ':'. $data->hour_12 . ':'. $data->hour_13 . ':'. $data->hour_14 . ':'
                    . $data->hour_15 . ':'. $data->hour_16 . ':'. $data->hour_17 . ':'. $data->hour_18 . ':'
                    . $data->hour_19 . ':'. $data->hour_20 . ':'. $data->hour_21 . ':'. $data->hour_22 . ':'
                    . $data->hour_23 . ':'. $data->hour_24 . ':'. $data->hour_25 . ':'
                    . "\r\n";
            fputs($f,$s);

        }
        fputs($f,'==))');
        fclose($f);
//        chdir($dir);
        Yii::$app->session->setFlash('mess','Файл з результатами '.$_name.' завантажений в каталог Загрузки');
        return Yii::$app->response->sendFile($_name);    //    Сохранение файла макета на локальной машине

    }

    // Удаление информации за день
    public function actionDelete($year,$month,$number)
    {
        $data = new datapokaz();
        $data::deleteAll(['year' => $year, 'month' => $month,'day' => $number]);

        return $this->redirect(['index']);
    }
    
//    Сохранение файла макета на локальной машине
    public function actionDownload($f)
    {
        $file = Yii::getAlias($f);
        return Yii::$app->response->sendFile($file); 
    }

//    Страница о программе
    public function actionAbout()
    {
        return $this->render('about');
    }
// Вход пользователя на сайт
    public function actionLogin()
    {
        $this->redirect('/');
        //return true;

        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            //return $this->goBack();
            return $this->goHome();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionAddAdmin() {
        $model = User::find()->where(['username' => 'user2'])->one();
        if (empty($model)) {
            $user = new User();
            $user->username = 'user2';
            $user->email = '1';
            $user->setPassword('lj,hjt enhj');
            $user->generateAuthKey();
            if ($user->save()) {
                echo 'good';
            }
        }
    }
}
