<?php

use yii\db\Migration;

/**
 * Handles the creation of table `checkout`.
 */
class m180602_122859_create_checkout_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('checkout', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer(),
            'user_id' => $this->integer(),
            'date' => $this->date(),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            'idx-checkout-product_id',
            'checkout',
            'product_id'
        );
        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-checkout-product_id',
            'checkout',
            'product_id',
            'product',
            'id',
            'CASCADE'
        );
        // creates index for column `user_id`
        $this->createIndex(
            'idx-checkout-user_id',
            'checkout',
            'user_id'
        );
        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-checkout-user_id',
            'checkout',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('checkout');
    }
}
