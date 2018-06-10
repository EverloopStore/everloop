<?php

use yii\db\Migration;

/**
 * Handles the creation of table `manager`.
 */
class m180602_122835_create_manager_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('manager', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'credentials' => $this->integer()->defaultValue(0),
            'last_login' => $this->date(),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            'idx-manager-user_id',
            'manager',
            'user_id'
        );
        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-manager-user_id',
            'manager',
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
        $this->dropTable('manager');
    }
}
