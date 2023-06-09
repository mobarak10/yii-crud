<?php

/** @var yii\web\View $this */

use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\web\JsExpression;

$this->title = 'YII2 CRUD APPLICATION';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent">
        <h1 class="display-4">YII2 CRUD APPLICATION!</h1>
    </div>
    <div class="row">
        <span><?= Html::a('Create', ['product/create'], ['class' => 'btn btn-primary mb-2']) ?></span>
    </div>
    <div class="body-content">

        <div class="row">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Unit</th>
                    <th scope="col" class="text-end">Sale Price</th>
                    <th scope="col" class="text-end">Purchase Price</th>
                    <th scope="col" class="text-end">Image</th>
                    <th scope="col" class="text-end">Action</th>
                </tr>
                </thead>
                <tbody>
                    <?php if (count($products) > 0): ?>
                        <?php foreach ($products as $index => $product): ?>
                            <tr>
                                <th scope="row"><?php echo $index + 1 ?></th>
                                <td><?php echo $product->name ?></td>
                                <td><?php echo ucfirst($product->unit) ?></td>
                                <td class="text-end"><?php echo ucfirst($product->sale_price) ?></td>
                                <td class="text-end"><?php echo ucfirst($product->purchase_price) ?></td>
<!--                                <td>--><?php //echo $product->image ?><!--</td>-->
                                <td>
                                    <?= Html::img(Yii::getAlias('@web/uploads/'). $product->image,
                                        [
                                            'style' => 'width: 150px; height: 100px;',
                                            'alt' => 'Product Image',
                                            'class' => "rounded img-fluid img-thumbnail"
                                        ])
                                    ?>
                                </td>
                                <td class="text-end">
                                    <span><?= Html::a('Update', ['update', 'id' => $product->id], ['class' => 'btn btn-primary btn-sm']) ?></span>
                                    <span>
                                        <?php
                                        echo Html::a('Delete', ['delete', 'id' => $product->id], [
                                            'class' => 'btn btn-danger btn-sm',
                                            'data' => [
                                                'confirm' => 'Are you sure you want to delete this item?',
                                                'method' => 'post',
                                            ],
                                        ]);
                                        ?>
                                    </span>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                    <tr>
                        <td colspan="10" class="text-center">
                            No record found
                        </td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
            <div >
                <?php
                echo LinkPager::widget([
                    'pagination' => $pagination,
                    'options' => ['class' => 'pagination justify-content-end'],
                    'linkContainerOptions' => ['class' => 'page-item'],
                    'linkOptions' => ['class' => 'page-link'],
                    'disabledListItemSubTagOptions' => ['tag' => 'a', 'class' => 'page-link'],
                ]);
                ?>
            </div>
        </div>

    </div>
</div>
