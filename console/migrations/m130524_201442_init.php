<?php

use yii\db\Schema;
use yii\db\Migration;

class m130524_201442_init extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'email' => $this->string()->notNull()->unique(),

            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->insert('{{%user}}', [
            'username' => 'admin',
            'password_hash' => '$2y$13$jWwoDOw24qwhdTKo5l9zgOFJHUnltCH5t9b57W/6JWAE7VAv3RASK',
            'status' => '10',
            'email'=>'admin@localhost.com',
        ]);$this->insert('{{%user}}',[
                'username' => 'user',
                'password_hash' => '$2y$13$gFt7ev8aeJqaTsdjsI7QH.ZohyqKAklcnW6LR/h.JYbwrgbf0iwA2',
                'status' => '10',
                'email'=>'user@localhost.com'
            ]
            );
    }

    public function down()
    {
        $this->dropTable('{{%user}}');
    }
}
