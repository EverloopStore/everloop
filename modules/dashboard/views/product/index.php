<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\grid\BlockView;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Товары';
$this->params['breadcrumbs'][] = $this->title;
?>
<nav class="navbar clearfix">
    <p class="float-left title mr-3"><?= Html::encode($this->title) ?></p>
    <?= Html::a('Добавить товар', ['create'], ['class' => 'btn btn-outline-secondary float-left mr-3', 'role' => 'button']) ?>
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
        <?= BlockView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                'title',
                'price',
                [
                    'attribute' => 'thumb',
                    'format' => 'raw',
                    'value' => function ($model)
                    {
                        return Html::img($model->getImage(), ['style' => 'width: 200px;']);
                    }
                ],
                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
        <?php Pjax::end(); ?>
    </div>
</div>

