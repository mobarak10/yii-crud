<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'YII2 CRUD APPLICATION';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent">
        <h1 class="display-4">YII2 CRUD APPLICATION!</h1>
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
                                <td class="text-end">
                                    <span><?= Html::a('View') ?></span>
                                    <span><?= Html::a('Update') ?></span>
                                    <span><?= Html::a('Delete') ?></span>
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
        </div>

    </div>
</div>
