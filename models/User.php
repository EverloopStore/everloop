<?php

namespace app\models;

use Yii;
use app\models\Manager;
use app\models\Utilities;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $password
 * @property string $email
 * @property string $phone
 * @property string $adress
 * @property string $zip_code
 *
 * @property Checkout[] $checkouts
 * @property Manager[] $managers
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'password', 'email', 'phone', 'adress', 'zip_code'], 'required'],
            [['first_name', 'last_name', 'password', 'email', 'phone', 'adress', 'zip_code'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'Имя',
            'last_name' => 'Фамилия',
            'password' => 'Пароль',
            'email' => 'Email',
            'phone' => 'Телефон',
            'adress' => 'Адрес',
            'zip_code' => 'Почтовый индекс',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCheckouts()
    {
        return $this->hasMany(Checkout::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getManagers()
    {
        return $this->hasOne(Manager::className(), ['user_id' => 'id']);
    }

    public static function findIdentity($id)
    {
        return User::findOne($id);
    }
    public function getId()
    {
        return $this->id;
    }
    public function getAuthKey()
    {
        // TODO: Implement getAuthKey() method.
    }
    public function validateAuthKey($authKey)
    {
        // TODO: Implement validateAuthKey() method.
    }
    public static function findIdentityByAccessToken($token, $type = null)
    {
        // TODO: Implement findIdentityByAccessToken() method.
    }
    public static function findByUsername($username)
    {
        return User::find()->where(['name'=>$username])->one();
    }

    public static function findByEmail($email)
    {
        return User::find()->where(['email'=>$email])->one();
    }
    public function validatePassword($password)
    {
        return false;
    }
    
    public function create()
    {
        return $this->save(false);
    }
}
