<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\models\LoginForm */
/* @var $form ActiveForm */
$this->title = 'Вход';
?>
<div class="main-login">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>Пожалуйста, заполните поля:</p>
    <?php $form = ActiveForm::begin(); ?>

    <?php if($model->scenario === 'loginWithEmail'): ?>
        <?= $form->field($model, 'email') ?>
    <?php else: ?>
        <?= $form->field($model, 'username') ?>
    <?php endif; ?>
    <?= $form->field($model, 'password')->passwordInput() ?>
    <?= $form->field($model, 'rememberMe')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Войти', ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>