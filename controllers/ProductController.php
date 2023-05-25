<?php

namespace app\controllers;

use app\models\Product;
use yii\helpers\Inflector;

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

    public function actionCreate()
    {
        $product = new Product();
        $formData = \Yii::$app->request->post();
        if (\Yii::$app->request->post()) {
            $formData['Product']['slug'] = Inflector::slug(\Yii::$app->request->post('Product')['name']);
        }

        if ($product->load($formData)){
            if ($product->save()){
                echo 'success';
                \Yii::$app->session->setFlash('success', 'Product Create Successfully');
                return $this->redirect(['index']);
            }else{
                echo 'not';
                \Yii::$app->session->setFlash('error', 'Fail to create product');
            }
        }
        return $this->render('create', ['product' => $product]);
    }

}
