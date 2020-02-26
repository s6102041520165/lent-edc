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
            'id' => $this->integer()->notNull(),
            'division' => $this->integer()->notNull(),
            //'name' => $this->string(255)
        ]);

        $this->addPrimaryKey('diet_pk', 'district', ['id', 'division']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%district}}');
    }
}
