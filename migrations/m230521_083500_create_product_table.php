<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product}}`.
 */
class m230521_083500_create_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'slug' => $this->string()->notNull(),
            'stock_alert' => $this->integer(),
            'unit' => $this->string()->notNull()->defaultValue('pcs'),
            'sale_price' => $this->decimal(10, 2)->defaultValue(0.00),
            'purchase_price' => $this->decimal(10, 2)->defaultValue(0.00),
            'image' => $this->string(),
            'deleted_at' => $this->timestamp(),
        ]);

        // creates index for column `name`
        $this->createIndex(
            'idx-product-name',
            'product',
            'name'
        );

        // creates index for column `slug`
        $this->createIndex(
            'idx-product-slug',
            'product',
            'slug'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops index for column `name`
        $this->dropIndex(
            'idx-product-name',
            'product'
        );

        // drops index for column `slug`
        $this->dropIndex(
            'idx-product-slug',
            'product'
        );

        $this->dropTable('{{%product}}');
    }
}
