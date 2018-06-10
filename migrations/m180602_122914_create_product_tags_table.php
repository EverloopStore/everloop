<?php

use yii\db\Migration;

/**
 * Handles the creation of table `product_tags`.
 */
class m180602_122914_create_product_tags_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('product_tags', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer(),
            'tag_id' => $this->integer(),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            'idx-product_tags-product_id',
            'product_tags',
            'product_id'
        );
        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-product_tags-product_id',
            'product_tags',
            'product_id',
            'product',
            'id',
            'CASCADE'
        );
        // creates index for column `user_id`
        $this->createIndex(
            'idx-product_tags-tag_id',
            'product_tags',
            'tag_id'
        );
        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-product_tags-tag_id',
            'product_tags',
            'tag_id',
            'tag',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('product_tags');
    }
}
