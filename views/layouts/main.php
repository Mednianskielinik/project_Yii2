<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\Modal;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\bootstrap\ActiveForm;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <?= Html::csrfMetaTags() ?>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>

    <meta name="keywords" content="Your,Keywords">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="index.html#">

    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body>

<?php $this->beginBody() ?>

<div class="wrap">

    <div class="header">
        <div class="container">

            <div class="row">
                <div class="col-md-4 col-sm-5">

                    <a href="index.html">
                        <div class="logo">
                            <img class="img-responsive" src="img/logo.png" alt="" />
                            <h1>CakeFactory</h1>
                        </div>
                    </a>
                </div>


                <?php
                NavBar::begin(
                        [
                                'brandLabel' => 'Навигация'
                        ]
                );


                ActiveForm::begin(
                    [
                        'action' => ['site/search'],
                        'method' => 'get',
                        'options' =>
                            ['class' => 'navbar-form navbar-right']
                    ]
                );


                echo '<div class=" header-search">
                      <div class = "input-group">';
                echo Html::input(
                    'type:text',
                    'search',
                    '',
                    [
                        'placeholder' => 'Найти...',
                        'class' => 'form-control'
                    ]
                );
                echo  '<span class="input-group-btn">';
                echo Html::submitButton(
                    '<span class = "glyphicon gliphicon-search"><i class="fa fa-search"></i></span>',
                    [
                        'class' => 'btn btn-default'
                    ]
                );
                echo '</span></div></div>';
                ActiveForm::end();

                echo Nav::widget([
                    'options' => ['class' => 'navbar-nav navbar-right'],
                    'items' => [
                        ['label' => 'Главная', 'url' => ['/site/index']],
                        ['label' => 'О нас', 'url' => ['/site/about']],
                        ['label' => 'Смотреть блюда', 'url' => ['/site/order']],
                        ['label' => 'Регистрация', 'url' => ['site/signup'], 'visible' => Yii::$app->user->isGuest],
                        Yii::$app->user->isGuest ? (
                        ['label' => 'Войти', 'url' => ['/site/login']]
                        ) : (
                            '<li>'
                            . Html::beginForm(['/site/logout'], 'post')
                            . Html::submitButton(
                                'Выйти (' . Yii::$app->user->identity->username . ')',
                                ['class' => 'btn btn-link logout']
                            )
                            . Html::endForm()
                            . '</li>'
                        )
                    ],
                ]);




                NavBar::end()
                ?>

                <!--                <div class="col-md-8 col-sm-7">-->
                <!--                    <nav class="navbar navbar-default navbar-right" role="navigation">-->
                <!--                        <div class="container-fluid">-->
                <!--
                <!--                            <div class="navbar-header">-->
                <!--                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">-->
                <!--                                    <span class="sr-only">Toggle navigation</span>-->
                <!--                                    <span class="icon-bar"></span>-->
                <!--                                    <span class="icon-bar"></span>-->
                <!--                                    <span class="icon-bar"></span>-->
                <!--                                </button>-->
                <!--                            </div>-->
                <!---->
<!--                                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">-->
<!--                                                <ul class="nav navbar-nav">-->
<!--                                                    <li><a href="index.html"><img src="img/nav-menu/nav1.jpg" class="img-responsive" alt="" /> Home</a></li>-->
<!--                                                    <li class="dropdown">-->
<!--                                                        <a href="index.html#" class="dropdown-toggle" data-toggle="dropdown"><img src="img/nav-menu/nav4.jpg" class="img-responsive" alt="" /> Shop <b class="caret"></b></a>-->
<!--                                                        <ul class="dropdown-menu">-->
<!--                                                            <li><a href="items.html">Shopping</a></li>-->
<!--                                                            <li><a href="item-single.html">Order Now</a></li>-->
<!--                                                        </ul>-->
<!--                                                    </li>-->
<!--                                                    <li><a href="/site/index.php"><img src="img/nav-menu/nav6.jpg" class="img-responsive" alt="" /> About</a></li>-->
<!--                                                </ul>-->
<!--                                            </div>-->
                <!--                        </div>-->

            </div>
            </div>
        </div> <!-- / .container -->
    </div>
    <div class="main-content">

<?= $content; ?>

    </div>


<div class="footer padd">
    <div class="container">

        <!-- Copyright -->
        <div class="footer-copyright">
            <!-- Paragraph -->
            <p>&copy; Venera 2018 <a href="index.html#">Migno</a></p>
        </div>
    </div>
</div>

<?php
\yii\bootstrap\Modal::begin([
        'header' => '<h2> Онлайн заказ </h2>',
        'id' => 'cart',
        'footer' => '<button type="button" class="btn btn-default"
    data-dismiss="modal">Продолжить покупки </button> 
    <button type = "button" class="btn btn-primary"> Оформить заказ</button> 
     <button type = "button" class="btn btn-danger" onclick="clearCart()"> Очистить корзину</button> \''
]);

\yii\bootstrap\Modal::end();
?>

<span class="totop"><a href="index.html#"><i class="fa fa-angle-up"></i></a></span>
<!-- FLEX SLIDER SCRIPTS  -->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>