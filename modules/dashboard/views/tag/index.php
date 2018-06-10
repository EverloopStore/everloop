<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\TagSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tags';
$this->params['breadcrumbs'][] = $this->title;
?>
<nav class="navbar clearfix">
    <p class="float-left title mr-3"><?= Html::encode($this->title) ?></p>
    <?= Html::a('Добавить тег', ['create'], ['class' => 'btn btn-outline-secondary float-left mr-3', 'role' => 'button']) ?>
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
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>
</nav>
<div class='container-fluid'>
    <div class="container">
        <?php Pjax::begin(); ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id',
                'title',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
        <?php Pjax::end(); ?>
    </div>
</div>