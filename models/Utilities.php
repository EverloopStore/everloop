<?php

namespace app\models;

use Yii;
use app\models\Tag;
use yii\base\Model;
use app\models\User;
use app\models\Comment;
use app\models\Product;
use app\models\Category;
use app\models\Checkout;

class Utilities extends Model
{
      public function pre_var_dump($data, $die = false)
      {
            echo '<pre>';
            var_dump($data);
            echo '</pre>';
            $die === true ? die : '';
      }

      // Returns count of items from models
      static public function ProductCount()
      {
            return count(Product::find()->all());
      }

      static public function CategoryCount()
      {
            return count(Category::find()->all());
      }

      static public function TagCount()
      {
            return count(Tag::find()->all());
      }

      static public function UserCount()
      {
            return count(User::find()->all());
      }

      static public function CheckoutCount()
      {
            return count(Checkout::find()->all());
      }

      static public function CommentCount()
      {
            return count(Comment::find()->all());
      }
      //==============================

      // Custom RBAC via database credentials
      static public function isGuest()
      {
            if (Yii::$app->user == null) return true;
            return false;
      }

      static public function isUser()
      {
            if (Yii::$app->user == null) return false;

            $user = User::findOne(Yii::$app->user->id);

            if ($user->managers == null) return true;
            return false;
      }

      static public function isManager()
      {
            if (Yii::$app->user == null) return false;

            $user = User::findOne(Yii::$app->user->id);

            if ($user->managers == null) return false;
            if ($user->managers->credentials >= 1 && $user->managers->credentials < 3) return true;
            return false;
      }

      static public function isAdmin()
      {
            if (Yii::$app->user == null) return false;

            $user = User::findOne(Yii::$app->user->id);

            if ($user->managers == null) return false;
            if ($user->managers->credentials >= 1) return true;
            return false;
      }
      //==============================
}