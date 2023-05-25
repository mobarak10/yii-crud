<?php

/** @var yii\web\View $this */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'YII2 CRUD APPLICATION';
?>
<div class="site-index">
    <h1 class="display-4">Create Product</h1>
    <span><?= Html::a('Product List', ['product/index'], ['class' => 'btn btn-primary mb-2']) ?></span>
    <div class="body-content">
        <?php
            $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']])
        ?>
        <div class="row">
            <div class="form-control">
               <div class="row">
                   <div class="col-lg-6">
                       <?= $form->field($product, 'name'); ?>
                   </div>

                   <div class="col-lg-6">
                       <?= $form->field($product, 'unit'); ?>
                   </div>

                   <div class="col-lg-6">
                       <?= $form->field($product, 'stock_alert'); ?>
                   </div>

                   <div class="col-lg-6">
                       <?= $form->field($product, 'sale_price'); ?>
                   </div>

                   <div class="col-lg-6">
                       <?= $form->field($product, 'purchase_price'); ?>
                   </div>

                   <div class="col-lg-6">
                       <?= $form->field($product, 'image')->fileInput(['class' => 'form-control']); ?>
                   </div>

                   <div class="col-lg-12 mt-2">
                       <?= Html::submitButton('Create', ['class' => 'btn btn-primary float-end']); ?>
                   </div>
               </div>
            </div>
        </div>
        <?php
            ActiveForm::end();
        ?>
    </div>
</div>
