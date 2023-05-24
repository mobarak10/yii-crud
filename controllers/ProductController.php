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
        return $this->render('index', ['products' => $products]);
    }

}
