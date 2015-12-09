<?php

use yii\db\Schema;
use yii\db\Migration;

class m151208_214415_init_roles extends Migration
{
    public function up()
    {
        $this->insert('auth_item',[
            'name' =>'admin',
            'type' => '1',
            'description' =>'Администратор'
        ]);
        $this->insert('auth_item',[
            'name' =>'user',
            'type' => '1',
            'description' =>'Пользователь'
        ]);
        $this->insert('auth_assignment',[
            'item_name' =>'admin',
            'user_id' => '1',
        ]);
        $this->insert('auth_assignment',[
            'item_name' =>'user',
            'user_id' => '2',
        ]);

    }

    public function down()
    {
        echo "m151208_214415_init_roles cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
