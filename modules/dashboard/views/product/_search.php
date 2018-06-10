<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProductSearch */
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
                <button id="StoreSearchDropdown" class="btn btn-store store-dropdown dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">ID</button>
                <div id="StoreSearchDropdownItems" class="dropdown-menu">
                    <button class="dropdown-item search" type="button" data-provider="ID">ID</button>
                    <button class="dropdown-item search" type="button" data-provider="Title">Title</button>
                    <button class="dropdown-item search" type="button" data-provider="Price">Price</button>
                    <button class="dropdown-item search" type="button" data-provider="Category">Category</button>
                    <button class="dropdown-item search" type="button" data-provider="Popular">Popular</button>
                    <div role="separator" class="dropdown-divider"></div>
                    <?= Html::resetButton('Reset', ['class' => 'dropdown-item', 'type' => 'button']) ?>
                    <?= Html::submitButton('Search', ['class' => 'dropdown-item', 'type' => 'button']) ?>
                </div>
            </div>
            <?= $form->field($model, 'id')->label(false)->textInput(['class' => 'form-control store-input', 'data-name' => 'ID']) ?>
            <?= $form->field($model, 'title')->label(false)->textInput(['class' => 'form-control store-input', 'data-name' => 'Title']) ?>
            <?= $form->field($model, 'price')->label(false)->textInput(['class' => 'form-control store-input', 'data-name' => 'Price']) ?>
            <?= $form->field($model, 'category_id')->label(false)->textInput(['class' => 'form-control store-input', 'data-name' => 'Category']) ?>
            <?= $form->field($model, 'popular')->label(false)->textInput(['class' => 'form-control store-input', 'data-name' => 'Popular']) ?>
        </div>
    <?php ActiveForm::end(); ?>

    <?php // $form->field($model, 'id') ?>

    <?php // $form->field($model, 'title') ?>

    <?php // $form->field($model, 'price') ?>

    <?php // $form->field($model, 'description') ?>

    <?php // $form->field($model, 'thumb') ?>

    <?php // echo $form->field($model, 'content') ?>

    <?php // echo $form->field($model, 'category_id') ?>

    <?php // echo $form->field($model, 'date') ?>

    <?php // echo $form->field($model, 'count') ?>

    <?php // echo $form->field($model, 'popular') ?>

    <?php // echo $form->field($model, 'forcing') ?>

    <?php // echo $form->field($model, 'ends_count') ?>

    <!--div class="form-group">
        <?php //Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?php //Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div-->

    
