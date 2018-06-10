<?php

use app\models\User;
use yii\db\Migration;

/**
 * Handles the creation of table `product`.
 */
class m180602_122521_create_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('product', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'price' => $this->double()->defaultValue(0),
            'description' => $this->text()->defaultValue(NULL),
            'thumb' => $this->string()->defaultValue(NULL),
            'content' => $this->text()->defaultValue(NULL),
            'category_id' => $this->integer()->defaultValue(NULL),
            'date' => $this->date(),
            'count' => $this->integer()->defaultValue(0),
            'popular' => $this->integer()->defaultValue(0),
            'forcing' => $this->integer()->defaultValue(0),
            'ends_count' => $this->integer()->defaultValue(0),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('product');
    }
}
