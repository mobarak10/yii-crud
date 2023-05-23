<?php

namespace app\controllers;

use app\models\Product;

class ProductController extends \yii\web\Controller
{
    /**
     * @return Product[]|array|\yii\db\ActiveRecord[]
     */
    public function actionIndex()
    {
        $products = Product::find()->all();
        echo '<pre>';
        print_r($products);
        echo '<pre>';
        exit();
        return $this->render('index');
    }

}
