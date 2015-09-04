<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

$this->title = 'Вход';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>


    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
    ]); ?>
     <div class='field'>
    <?= $form->field($model, 'username') ?>
    </div>
    <div class='field'>
    <?= $form->field($model, 'password')->passwordInput() ?>
    </div>
    <?= $form->field($model, 'rememberMe')->checkbox() ?>


    <?= Html::submitButton('Вход') ?>

    <?php ActiveForm::end(); ?>


</div>
