<?php

namespace app\controllers;

use app\models\Product;
use yii\web\Controller;
use Yii;
use yii\helpers\Inflector;
use yii\web\UploadedFile;

class ProductController extends Controller
{
    /**
     * view product list
     * @return Product[]|array|\yii\db\ActiveRecord[]
     */
    public function actionIndex()
    {
        $products = Product::find()->all();
        return $this->render('index', ['products' => $products]);
    }

    /**
     * create new product
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $product = new Product();
        $formData = \Yii::$app->request->post();
        if (\Yii::$app->request->post()) {
            $formData['Product']['slug'] = Inflector::slug(\Yii::$app->request->post('Product')['name']);
        }

        if ($product->load($formData)){
            $uploadDir = Yii::getAlias('@web/web/uploads');

            $product->image = UploadedFile::getInstance($product, 'image');
            $fileName = time().'.'.$product->image->extension;
            $product->image->saveAs('uploads/'.$fileName);
            $product->image = $fileName;

            if ($product->save()){
                \Yii::$app->session->setFlash('success', 'Product Create Successfully');
                return $this->redirect(['index']);
            }else{
                \Yii::$app->session->setFlash('error', 'Fail to create product');
            }
        }
        return $this->render('create', ['product' => $product]);
    }

    /**
     * update product record
     * @param $id
     * @return string|\yii\web\Response
     */
    public function actionUpdate($id)
    {
        $product = Product::findOne($id);
        $oldFilePath = $product->image;
        $formData = \Yii::$app->request->post();
        if (\Yii::$app->request->post()) {
            $formData['Product']['slug'] = Inflector::slug(\Yii::$app->request->post('Product')['name']);
        }

        if ($product->load($formData)){
            // Check if a file has been uploaded
            //if it has new image
            if (isset($_FILES['Product']['name']['image']) && $_FILES['Product']['name']['image'] !== '') {
                // Get the path of the old file
                $oldImage = $product->image;
                $oldImagePath = Yii::getAlias('@web/uploads/') . $oldImage;

                // Delete the old file
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }

                // get new image instance
                $newImage = UploadedFile::getInstance($product, 'image');
                // upload new image
                $fileName = time().'.'.$newImage->extension;
                $newImage->saveAs('uploads/'.$fileName);
                $product->image = $fileName;
            }else {
                // No file has been uploaded, use the existing file
                $product->image = $oldFilePath; // Replace 'oldFileName' with the actual file name
            }


            if ($product->save()){
                \Yii::$app->session->setFlash('success', 'Product Update Successfully');
                return $this->redirect('index');
            }else{
                $this->render('update', ['product' => $product]);
            }
        }
        return $this->render('update', ['product' => $product]);
    }

    public function actionDelete($id)
    {
        $product = Product::findOne($id);
        if ($product->delete()) {
            \Yii::$app->session->setFlash('danger', 'Product Delete Successfully');
            return $this->redirect('index');
        }
    }

}
