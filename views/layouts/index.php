<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body>
<?php $this->beginBody() ?>

<div class="wrap">
        <?php
        NavBar::begin([
            'brandLabel' => 'Макет перетоку електроенергії',
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
               'class' => 'navbar-inverse navbar-fixed-top',
            ],
        ]);
        if (isset(Yii::$app->user->identity->role)) {
            if (Yii::$app->user->identity->role === \app\models\User::ROLE_ADMIN ||
                Yii::$app->user->identity->role === \app\models\User::ROLE_MANAGER
            )
                echo Nav::widget([
                    'options' => ['class' => 'navbar-nav navbar-left '],
                    'items' =>
                        [
                            ['label' => 'Головна', 'url' => ['/site/index']],

                            ['label' => 'Аналітика', 'url' => ['/analit/dataperiod'],
                                'options' => ['id' => 'down_menu'],
                                'items' => [
                                    ['label' => 'Показники за період', 'url' => ['/analit/dataperiod']],

                                ]
                            ],

                            ['label' => 'Довідники', 'url' => ['/sprav/sprav_pokaz'],
                                'options' => ['id' => 'down_menu'],
                                'items' =>
                                    [
                                        ['label' => 'Довідник показників', 'url' => ['/sprav/sprav_pokaz']],
                                    ]
                            ],
                            ['label' => 'Настройки', 'url' => ['/site/set']],
                            ['label' => 'Про программу', 'url' => ['/site/about']],
                            ['label' => 'Вийти', 'url' => ['/site/logout'], 'linkOptions' => ['data-method' => 'post']],
                        ],
                ]);
            else
                echo Nav::widget([
                    'options' => ['class' => 'navbar-nav navbar-right'],
                    'items' =>
                        [
                            ['label' => 'Головна', 'url' => ['/site/index']],

                            ['label' => 'Аналітика', 'url' => ['/analit/dataperiod'],
                                'options' => ['id' => 'down_menu'],
                                'items' => [
                                    ['label' => 'Показники за період', 'url' => ['/analit/dataperiod']],

                                ]
                            ],

//                    ['label' => 'Довідники', 'url' => ['/sprav/sprav_pokaz'],
//                        'options' => ['id' => 'down_menu'],
//                        'items' =>
//                            [
//                                ['label' => 'Довідник показників', 'url' => ['/sprav/sprav_pokaz']],
//                            ]
//                    ],
//                    ['label' => 'Настройки', 'url' => ['/site/set']],
                            ['label' => 'Про программу', 'url' => ['/site/about']],
                            ['label' => 'Вийти', 'url' => ['/site/logout'], 'linkOptions' => ['data-method' => 'post']],
                        ],
                ]);
        }
        if (!isset(Yii::$app->user->identity->role)) {
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' =>
                    [
                        ['label' => 'Головна', 'url' => ['/site/index']],

                        ['label' => 'Аналітика', 'url' => ['/analit/dataperiod'],
                            'options' => ['id' => 'down_menu'],
                            'items' => [
                                ['label' => 'Показники за період', 'url' => ['/analit/dataperiod']],

                            ]
                        ],

//                    ['label' => 'Довідники', 'url' => ['/sprav/sprav_pokaz'],
//                        'options' => ['id' => 'down_menu'],
//                        'items' =>
//                            [
//                                ['label' => 'Довідник показників', 'url' => ['/sprav/sprav_pokaz']],
//                            ]
//                    ],
//                    ['label' => 'Настройки', 'url' => ['/site/set']],
                        ['label' => 'Про программу', 'url' => ['/site/about']],
                        ['label' => 'Вийти', 'url' => ['/site/logout'], 'linkOptions' => ['data-method' => 'post']],
                    ],
            ]);
        }
        NavBar::end();
        ?>

        <?php if($this->context->action->controller->method!='update_pokaz'): ?>
        <div id="content_container">
       	  <div id="header"> <div class="header_content_mainline"> Макет перетоку електроенергії </div>
              <div id="header_content_tagline">  </div>

          </div>
        </div>
        <?php endif; ?>

        <?php if($this->context->action->controller->method=='update_pokaz'): ?>
            <br/>  <br/> <br/>
        <?php endif; ?>

            <?= $content ?>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; ЦЕК <?= date('Y') ?></p>
        <p class="pull-right"><?//= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
