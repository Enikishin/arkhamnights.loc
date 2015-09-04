<?php

namespace app\models\storylets;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\helpers\FileHelper;
use yii\web\UploadedFile;
use app\models\User;
use yii\db\Expression;
use yii\helpers\ArrayHelper;
//use yii\imagine\Image;


class Storylet extends ActiveRecord
{
    const STATUS_HIRING = 1;
    const STATUS_ACTIVE = 2;


 public $imageFile;

public static function tableName()
    {
        return 'storylets';
    }

    public function rules()    
    {
        return [
            [['storylet_name','storylet_desc'],'required'],
            
            
            [['owner_id','status','created_at','updated_at'],'safe'],
            ['owner_id','integer'],
            ['status','default','value'=>1],
            [['storylet_img'], 'file', 'extensions' => 'png, jpg','skipOnEmpty' => true],
                    
        ];
    }
    
    public function attributeLabels()
    {
        return [

            'storylet_name' => 'Название',
            'storylet_desc' => 'Описание',
            'storylet_img' => 'Изображение'
            
          
    
        ];
    }
    public function behaviors()
{
    return [
        [
            'class' => TimestampBehavior::className(),
            'value' => new Expression('NOW()'),
        ],
    ];
}
    
    public static function findAllStorylets()
    {
    return static ::findAll(['status'=>1]);
    }
    public static function findMyMasterStorylets()
    {
    return static ::findAll(['status'=>1,'owner_id'=>yii::$app->user->identity->id]);
    }
    
    
    public function saveStorylet (){
    

    $this->owner_id=Yii::$app->user->identity->id;
    
  $file=UploadedFile::getInstance($this, 'storylet_img');
    if (!empty ($file)) {
    $this->storylet_img = UploadedFile::getInstance($this, 'storylet_img');
     }
    //var_dump ($this->storylet_img);
    $this->save();
   FileHelper::createDirectory('images/'.$this->storylet_id) ;
   
      //$this->storylet_img = UploadedFile::getInstance($this, 'storylet_img');
         //var_dump($_FILES);
   
     if (!empty ($file)) {
     $this->storylet_img->saveAs('images/'.$this->storylet_id.'/' . $this->storylet_img->baseName . '.' . $this->storylet_img->extension);
      $image=Yii::$app->image->load('images/'.$this->storylet_id.'/' . $this->storylet_img->baseName . '.' . $this->storylet_img->extension);
      
      if ($image->width>500) {
      $image->resize(50,50);
      }
            $image->save(); 
     } 
    // var_dump($_FILES);
         // $this->save(); 
   } 
   public function getOwner()
    {
    
            return $this->hasOne(User::className(), ['id' => 'owner_id']);;
      
        }
  public function getStatusString ()
  
  {
  switch ($this->status) 
  {
  case 1 : echo 'Идет набор';
  break;
  }
  }
  
  public function getStatusName()
    {
        return ArrayHelper::getValue(self::getStatusesArray(), $this->status);
    }
 
    public static function getStatusesArray()
    {
        return [
            self::STATUS_HIRING => '<span id=status-hiring>Идет набор </span>',
            self::STATUS_ACTIVE => 'Идет игра',
           
        ];
    }
}
  
  