<?php

namespace app\seeds;

use yii\db\Migration;
use Faker\Factory as FakerFactory;
use yii\helpers\Inflector;

class ProductSeeder extends Migration
{
    public function run()
    {
        $faker = FakerFactory::create();

        $users = [];
        for ($i = 0; $i < 50; $i++) {
            $name = $faker->name;
            $slug = Inflector::slug($name);
            $users[] = [
                'name' => $name,
                'slug' => $slug,
                'stock_alert' => $faker->randomDigit(),
                'unit' => 'pcs',
                'sale_price' => $faker->randomDigit(),
                'purchase_price' => $faker->randomDigit(),
            ];
        }

        $this->batchInsert('product', [
            'name',
            'slug',
            'stock_alert',
            'unit',
            'sale_price',
            'purchase_price',
        ], $users);
    }
}