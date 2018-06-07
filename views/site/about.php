<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\AboutForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;


?>
<div class="site-about">
    <div class="chefs padd">
        <div class="container">

            <div class="default-heading">
                <img class="img-responsive" src="img/crown.png" alt="" />
                <h2>Наши шеф-повора</h2>
                <div class="border"></div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-4">
                    <div class="chefs-member">
                        <div class="chefs-head">
                            <img class="chefs-back img-responsive" src="img/chef/c-back2.jpg" alt="" />
                            <img class="chefs-img img-responsive" src="img/chef/4.jpg" alt="" />
                        </div>
                        <h3><a href="index.html#">Галина Чиблис</a></h3>
                        <span>Шеф по дессертам</span>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4"><div class="chefs-member">
                        <div class="chefs-head">
                            <img class="chefs-back img-responsive" src="img/chef/c-back1.jpg" alt="" />
                            <img class="chefs-img img-responsive" src="img/chef/7.jpg" alt="" /></div>
                        <h3><a href="index.html#">Виктория Короткова</a></h3>
                        <span>Шеф по мясу</span>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4"><div class="chefs-member">
                        <div class="chefs-head">
                            <img class="chefs-back img-responsive" src="img/chef/c-back3.jpg" alt="" />
                            <img class="chefs-img img-responsive" src="img/chef/2.jpg" alt="" /></div>
                        <h3><a href="index.html#">Дарья Клюкина</a></h3>
                        <span>Шеф по супам</span>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="testimonial padd">
        <div class="container">
            <div class="row">
                <div class="row">

                    <div class="footer-widget">
                        <h4>Комментировать</h4>
                        <p>Вы можете оставить свои замечания и предложения.</p>
                        <?php $form = ActiveForm::begin(['options' => ['id' => 'aboutForm']]); ?>
                        <?= $form->field($model, 'user')?>
                        <?= $form->field($model, 'comment') ?>
                        <div class="form-group">
                            <?= Html::submitButton('Отправить комментарий', ['class' => 'btn btn-primary', 'name' => 'comment-button']) ?>
                        </div>
                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
                <h3>Отзывы</h3>
                <?php
                if (!empty($masters)):?>
                    <?php foreach ($masters as $master): ?>
                        <div class="flexslider-testimonial">
                            <ul class="slides">
                                <li>
                                    <div class="testimonial-item">
                                        <span class="quote lblue">&#8220;</span>
                                        <h4><?=$master->user?></h4>
                                        <blockquote>
                                            <p><?=$master->comment?></p>
                                        </blockquote>
                                        <div class="clearfix"></div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    <?php  echo '<br>'; echo '<br>'; echo '<br>'; endforeach;?>
                <?php endif; ?>
            </div>

        </div>
    </div>
</div>
