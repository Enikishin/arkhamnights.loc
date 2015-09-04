<?php
namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\storylets\Storylet;
use yii\helpers\FileHelper;
use yii\web\UploadedFile;

class StoryletController extends Controller
{

 
    

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
            ],
        ];
    }

    public function actionIndex()
    {
 
   
   
        return $this->render('index',['storylet'=> $storylet,]);
    }
    public function actionCreate()
    {
    
       $model= New Storylet();
    if ($model->load(Yii::$app->request->post())&& $model->validate())  {
   
   // $model->attributes=Yii::$app->request->post();
   // $model->owner_id=Yii::$app->user->identity->id;
      $model->attributes=Yii::$app->request->post();
     // $model->saveStorylet();
     // $model->storylet_img = UploadedFile::getInstance($model, 'storylet_img');
      $model->saveStorylet();
      //FileHelper::createDirectory('images/'.$model->storylet_id) ;
      
    //echo $model->storylet_name;
    //echo $model->storylet_desc;

            return $this->goBack();
            }
        else {
   
        return $this->render('create',['model'=> $model]);
    }
    }
    
    public function actionView($id)
    {
    $model=Storylet::findOne($id);
    
    return $this->render('view',['model'=> $model]);
    }
    public function actionUpdate($id)
    {
      $model=Storylet::findOne($id);
      
    if ($model->load(Yii::$app->request->post())&& $model->validate())  {
      $model->attributes=Yii::$app->request->post();
      $model->saveStorylet();  
     }
    
    return $this->render('create',['model'=> $model]);
    }
    }