<?php
namespace app\components;

use yii\base\Widget;
use Yii;
use yii\helpers\Html;
use app\models\storylets\Storylet;
 

class FirstWiget extends Widget{

    

     

    public function init(){

        parent::init();

       
        

    }
     

    public function run(){
      // $users=User::find()
      // ->indexBy('id')
     // ->all();
     
     $Allstorylets=Storylet::findMyMasterStorylets() ;
       //var_dump ($users);
       foreach ($Allstorylets as $storylet) { 
         echo "- <a href=/storylet/view?id=$storylet->storylet_id>$storylet->storylet_name</a><br>";
         } 
       //echo "/storylet/view?id=$storylet->storylet_id>$storylet->storylet_name<br>"; }
       //echo $user->username;
       //foreach($user as $key=>$value){
       //echo $users; 
        }
  

}

?>
