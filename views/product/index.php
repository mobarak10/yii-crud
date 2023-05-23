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
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Name</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                <tr class="table-active">
                    <th scope="row">Active</th>
                    <td>Column content</td>
                    <td>Column content</td>
                    <td>
                        <span><?= Html::a('View') ?></span>
                        <span><?= Html::a('Update') ?></span>
                        <span><?= Html::a('Delete') ?></span>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>

    </div>
</div>
