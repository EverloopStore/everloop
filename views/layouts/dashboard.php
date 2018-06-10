<?php

/* @var $this \yii\web\View */
/* @var $content string */

use Yii;
use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\DashboardAsset;
use app\models\Utilities;

DashboardAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode(Yii::$app->name) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="containter-fluid">
    <div class="store-row clearfix">
        <div class="store-column-left store-sidebar">
            <ul class="list-group">
                <?= Html::a(Yii::$app->name, [Yii::$app->homeUrl]) ?>
                <?= Html::a('<i class="fas fa-chart-line"></i><p>Главная</p>', ['/dashboard/main']) ?>
                <?= Html::a('<i class="fas fa-box-open"></i><p>Товары<span class="badge badge-light">' . Utilities::ProductCount() . '</span></p>', ['/dashboard/product']) ?>
                <?= Html::a('<i class="fas fa-boxes"></i><p>Категории<span class="badge badge-light">' . Utilities::CategoryCount() . '</span></p>', ['/dashboard/category']) ?>
                <?= Html::a('<i class="fas fa-tags"></i><p>Теги<span class="badge badge-light">' . Utilities::TagCount() . '</span></p>', ['/dashboard/tag']) ?>
                <?= Html::a('<i class="fas fa-users"></i><p>Пользователи<span class="badge badge-light">' . Utilities::UserCount() . '</span></p>', ['/dashboard/user']) ?>
                <?= Html::a('<i class="fas fa-hand-holding-usd"></i><p>Покупки<span class="badge badge-light">' . Utilities::CheckoutCount() . '</span></p>', ['/dashboard/checkout']) ?>
                <?= Html::a('<i class="fas fa-comments"></i><p>Комментарии<span class="badge badge-light">' . Utilities::CommentCount() . '</span></p>', ['/dashboard/comment']) ?>
                <div id="store-collapse"><i class="fas fa-arrow-circle-left"></i><p>Свернуть</p></div>
            </ul>
        </div>
        <div class="store-column-right">
            <?= $content ?>
        </div>
    </div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
