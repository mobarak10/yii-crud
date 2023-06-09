<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\data\Pagination;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property int|null $stock_alert
 * @property string $unit
 * @property float|null $sale_price
 * @property float|null $purchase_price
 * @property string|null $image
 * @property string|null $deleted_at
 */
class Product extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'slug'], 'required'],
            [['stock_alert'], 'integer'],
            [['sale_price', 'purchase_price'], 'number'],
            [['deleted_at'], 'safe'],
            [['name', 'slug', 'unit'], 'string', 'max' => 255],
            [['image'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'slug' => 'Slug',
            'stock_alert' => 'Stock Alert',
            'unit' => 'Unit',
            'sale_price' => 'Sale Price',
            'purchase_price' => 'Purchase Price',
            'image' => 'Image',
            'deleted_at' => 'Deleted At',
        ];
    }

    public function getPaginatedData()
    {
        // Create a new query
        $query = $this->find();

        // Get the total count of records
        $count = $query->count();

        // Create a pagination object with the total count
        $pagination = new Pagination(['totalCount' => $count]);

        // Set the limit and offset for the query
        $query->limit($pagination->limit)->offset($pagination->offset);

        // Fetch the paginated data
        $data = $query->all();

        // Calculate the starting number for the current page
        $startingNumber = $pagination->getPage() * $pagination->getPageSize() + 1;

        // Return the paginated data, pagination object, and starting number
        return ['data' => $data, 'pagination' => $pagination, 'startingNumber' => $startingNumber];
    }
}
