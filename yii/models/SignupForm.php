<?php
namespace app\models;
 
use yii\base\Model;
use Yii;
 
/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $password;

 
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            ['username', 'match', 'pattern' => '#^[\w_-]+$#i'],
            ['username', 'unique', 'targetClass' => User::className(), 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],
 
            
 
            ['password', 'required'],
            ['password', 'string', 'min' => 6],
 
        ];
    }
 
    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        //if ($this->validate()) {
            $model = new User();
            $model->username = $this->username;
           // $user->email = $this->email;
            $model->setPassword($this->password);
            //$user->status = User::STATUS_WAIT;
           // $user->generateAuthKey();
           // $user->generateEmailConfirmToken();
 
            //if ($user->save()) {
           //     Yii::$app->mailer->compose('confirmEmail', ['user' => $user])
          //          ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name])
          //          ->setTo($this->email)
          //          ->setSubject('Email confirmation for ' . Yii::$app->name)
          //          ->send();
          echo $model->username;
          echo $model->password_hash;
         $model->save(false);
            //}
 
            return $model;
        }
 
       // return null;
    //}
}
?>