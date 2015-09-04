<?php
use yii\helpers\Html;
use yii\widgets\Menu;
use yii\base\View;

use app\components\FirstWiget;


/* @var $this \yii\web\View */
/* @var $content string */

yii\web\YiiAsset::register($this);
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

 <div class="wrapper">

	<header class="header">
  

  
   
          <div class="menu">
    <?= Menu::widget([
        'items' => [
            ['label' => 'Главная', 'url' => ['/site/index']],
            //['label' => 'About', 'url' => ['/site/about']],
            //Yii::$app->user->isGuest ?
                ['label' => 'Вход', 'url' => ['/site/login'],'visible' => Yii::$app->user->isGuest] ,
                ['label' => 'Регистрация', 'url' => ['/site/signup'],'visible' => Yii::$app->user->isGuest] ,
                ['label' => 'Создать модуль', 'url' => ['/storylet/create'],'visible' => !Yii::$app->user->isGuest] ,
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
  
	</header><!-- .header-->

	<div class="middle">

		<div class="container">
			<main class="content">
 
	     		 <?= $content ?>	
			</main><!-- .content -->
		</div><!-- .container-->

		<aside class="left-sidebar">

  <div class="left-sidebar-one">
  <h1>Модули с набором игроков:</h1><br>
	<?= FirstWiget::widget() ?>	
    
  	

  
  </div>
  <div class="left-sidebar-two">
fgd
  </div>
    
		</aside><!-- .left-sidebar -->

		<aside class="right-sidebar">
			fghfgh
		</aside><!-- .right-sidebar -->

	</div><!-- .middle-->

</div><!-- .wrapper -->

<footer class="footer">
	<em>“The oldest and strongest emotion of mankind is fear, and the oldest and strongest kind of fear is fear of the unknown”</em><br>
― H.P. Lovecraft, Supernatural Horror in Literature
</footer><!-- .footer -->


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>