<?php

namespace app\controllers;

use app\seeds\ProductSeeder;
use yii\web\Controller;

class SeederController extends Controller
{
    public function actionIndex()
    {
        $seeder = new ProductSeeder();
        $seeder->run();
        echo "Seeding completed.\n";
    }

}
