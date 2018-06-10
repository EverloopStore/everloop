<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UserSearch */
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
                    <button class="dropdown-item search" type="button" data-provider="First name">First name</button>
                    <button class="dropdown-item search" type="button" data-provider="Last name">Last name</button>
                    <button class="dropdown-item search" type="button" data-provider="Email">Email</button>
                    <button class="dropdown-item search" type="button" data-provider="Phone">Phone</button>
                    <button class="dropdown-item search" type="button" data-provider="Adress">Adress</button>
                    <button class="dropdown-item search" type="button" data-provider="Zip code">Zip code</button>
                    <div role="separator" class="dropdown-divider"></div>
                    <?= Html::resetButton('Reset', ['class' => 'dropdown-item', 'type' => 'button']) ?>
                    <?= Html::submitButton('Search', ['class' => 'dropdown-item', 'type' => 'button']) ?>
                </div>
            </div>
            <?= $form->field($model, 'id')->label(false)->textInput(['class' => 'form-control store-input', 'data-name' => 'ID']) ?>
            <?= $form->field($model, 'first_name')->label(false)->textInput(['class' => 'form-control store-input', 'data-name' => 'First name']) ?>
            <?= $form->field($model, 'last_name')->label(false)->textInput(['class' => 'form-control store-input', 'data-name' => 'Last name']) ?>
            <?= $form->field($model, 'email')->label(false)->textInput(['class' => 'form-control store-input', 'data-name' => 'Email']) ?>
            <?= $form->field($model, 'phone')->label(false)->textInput(['class' => 'form-control store-input', 'data-name' => 'Phone']) ?>
            <?= $form->field($model, 'adress')->label(false)->textInput(['class' => 'form-control store-input', 'data-name' => 'Adress']) ?>
            <?= $form->field($model, 'zip_code')->label(false)->textInput(['class' => 'form-control store-input', 'data-name' => 'Zip code']) ?>
        </div>
    <?php ActiveForm::end(); ?>
