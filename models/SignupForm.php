<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\User;

class SignupForm extends Model
{
      public $email;
      public $password;
      public $first_name;
      public $last_name;
      public $adress;
      public $zip_code;
      public $phone;

      public function rules()
      {
            return [
                  [['first_name', 'last_name', 'password', 'email', 'phone', 'adress', 'zip_code'], 'required'],
                  [['email'], 'email'],
                  [['email'], 'unique', 'targetClass' => 'app\models\User', 'targetAttribute' => 'email'],
                  [['first_name', 'last_name', 'password', 'email', 'phone', 'adress', 'zip_code'], 'string', 'max' => 255],
            ];
      }

      public function signup()
      {
            if ($this->validate())
            {
                  $user = new User();
                  $user->attributes = $this->attributes;
                  $user->password = password_hash($user->password, PASSWORD_DEFAULT);
                  return $user->create();
            }
      }
}
