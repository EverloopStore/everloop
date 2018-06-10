<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CommentSearch */
/* @var $form yii\widgets\ActiveForm */
?>
    <?php $form = ActiveForm::begin([
            'action' => ['index'],
            'method' => 'get',
            'options' => [
                'data-pjax' => 1,
                'class' => 'float-right mr-3'
            ],
        ]); ?>
        <div class="input-group">
            <div class="input-group-prepend">
                <button id="StoreSearchDropdown" class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">ID</button>
                <div id="StoreSearchDropdownItems" class="dropdown-menu">
                    <button class="dropdown-item search" type="button" data-provider="ID">ID</button>
                    <button class="dropdown-item search" type="button" data-provider="User">User</button>
                    <button class="dropdown-item search" type="button" data-provider="Product">Product</button>
                    <button class="dropdown-item search" type="button" data-provider="Content">Content</button>
                    <button class="dropdown-item search" type="button" data-provider="Date">Date</button>
                    <div role="separator" class="dropdown-divider"></div>
                    <?= Html::resetButton('Reset', ['class' => 'dropdown-item', 'type' => 'button']) ?>
                    <?= Html::submitButton('Search', ['class' => 'dropdown-item', 'type' => 'button']) ?>
                </div>
            </div>
            <?= $form->field($model, 'id')->label(false)->textInput(['class' => 'form-control store-input', 'data-name' => 'ID']) ?>
            <?= $form->field($model, 'user_id')->label(false)->textInput(['class' => 'form-control store-input', 'data-name' => 'User']) ?>
            <?= $form->field($model, 'product_id')->label(false)->textInput(['class' => 'form-control store-input', 'data-name' => 'Product']) ?>
            <?= $form->field($model, 'content')->label(false)->textInput(['class' => 'form-control store-input', 'data-name' => 'Content']) ?>
            <?= $form->field($model, 'date')->label(false)->textInput(['class' => 'form-control store-input', 'data-name' => 'Date']) ?>
        </div>
    <?php ActiveForm::end(); ?>
