<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%district}}`.
 */
class m200212_091305_create_district_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%district}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(100)->notNull(),
            'status' => $this->integer()->defaultValue(1),
            //'name' => $this->string(255)
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%district}}');
    }
}
