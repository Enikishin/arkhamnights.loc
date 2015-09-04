<?php
use yii\helpers\Html;
use yii\widgets\Menu;

/* @var $this \yii\web\View */
/* @var $content string */

\yii\web\YiiAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link rel="stylesheet" href="<?= Yii::$app->request->getBaseUrl() ?>/css/site.css"/>
    <?php $this->head() ?>
</head>
<body>


<?php $this->beginBody() ?>
    <div class="header">
   <!-- <?= Html::img('@web/images/header.jpg')?>-->
        <h1><?= Html::a('ArkhamNights.ru', ['/site/index']) ?></h1>
          <div class="menu">
    <?= Menu::widget([
        'items' => [
            ['label' => 'Главная', 'url' => ['/site/index']],
            //['label' => 'About', 'url' => ['/site/about']],
            //Yii::$app->user->isGuest ?
                ['label' => 'Вход', 'url' => ['/site/login'],'visible' => Yii::$app->user->isGuest] ,
                ['label' => 'Регистрация', 'url' => ['/site/signup'],'visible' => Yii::$app->user->isGuest] ,
                ['label' => 'Создать модуль', 'url' => ['/module/create'],'visible' => !Yii::$app->user->isGuest] ,
                [
                    'label' => 'Выход (' . Yii::$app->user->identity->username . ')','visible' => !Yii::$app->user->isGuest ,
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post'],
                ],
            ],
            
            'options' => [
            
                    'class' => 'navbar-nav',
                    'id'=>'navbar-id',

                 

              

                ],

        ]);
    ?>


    </div>
    </div>

    <div class="content">
        <?= $content ?>
    </div>

    <footer class="footer">
    
    
    
        &copy; My Company <?= date('Y') ?>, <?= Yii::powered() ?>
    </footer>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
