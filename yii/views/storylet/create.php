<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use vova07\imperavi\Widget;
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */


$this->title = 'Создай свое приключение';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="form-4">
    <h1><?= Html::encode($this->title) ?></h1>
 

 
    
            <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
            <ul>
            <li>
            <?= $form->field($model, 'storylet_name')->widget(Widget::className(), [
    'settings' => [
    'lang' => 'ru',
    'minHeight' => 200,
    'width' => 100,
    'plugins' => [
    'fontcolor',
    'imagemanager',
    'filemanager',
    ]
    ]
    ])?> 
          
             </li>
             <li>
            <?= $form->field($model, 'storylet_desc')->textarea(['rows' => '6']);?>
            </li>
             <li>
            <?= $form->field($model, 'storylet_img')->fileInput();?>
            </li>
            </ul>
            <div class="form-group">
                <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
            </div>
            <?php ActiveForm::end(); ?>
   
</div>