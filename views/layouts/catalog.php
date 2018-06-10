<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\CatalogAsset;

CatalogAsset::register($this);
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
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="containter-fluid ">
    <nav class="navbar clearfix">
        <div class="container">
            <div class="navbar-brand"><?= Html::encode(Yii::$app->name) ?></div>
            <?php if (!Yii::$app->user->isGuest) : ?>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?= Html::encode(Yii::$app->user->identity->first_name . ' ' . Yii::$app->user->identity->last_name) ?>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item disabled">Настройки</a>
                        <a class="dropdown-item disabled">Оповещения</a>
                        <div class="dropdown-divider"></div>
                        <?=
                        Html::beginForm(['/auth/logout'], 'post', ['class' => 'form-inline my-2 my-lg-0']) .
                            Html::submitButton('Выход', ['class' => 'dropdown-item', 'type' => 'button']) .
                            Html::endForm();
                        ?>
                    </div>
                </div> 
            <?php endif; ?>
        </div>
    </nav>
    <nav class="navbarContent">
        <div class="container"> 
                <div class="row">
                    <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg">
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Dropdown
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Dropdown
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Link</a>
                                </li>
                            </ul>
                            <form class="form-inline my-2 my-lg-0">
                                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                                <a><i class="fas fa-search"></i></a>
                                <i class="fas fa-shopping-cart"></i>
                            </form>
                        </div>
                        </nav>
                   </div>
            </div>
        </div>
    </nav>
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
            <?= $content ?>
        </div>
    </div>
</div>

<footer class="footer">
    <div class="container">
        
    </div>
</footer>
<script src="https://unpkg.com/popper.js/dist/umd/popper.min.js"></script>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
