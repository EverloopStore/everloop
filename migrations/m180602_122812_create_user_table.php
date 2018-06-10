<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user`.
 */
class m180602_122812_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'first_name' => $this->string(),
            'last_name' => $this->string(),
            'password' => $this->string(),
            'email' => $this->string(),
            'phone' => $this->string(),
            'adress' => $this->string(),
            'zip_code' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('user');
    }
}
