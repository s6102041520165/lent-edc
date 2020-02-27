<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%lent}}`.
 */
class m200212_091415_create_lent_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%lent}}', [
            'id' => $this->primaryKey(),
            'employee_id' => $this->integer(),
            'edc_id' => $this->integer(),
            'status' => $this->integer()->defaultValue(1),
            'return_date' => $this->integer(),
            
            'created_at' => $this->integer(),
            'created_by' => $this->integer(),
            'updated_at' => $this->integer(),
            'updated_by' => $this->integer()
        ]);

        $this->addForeignKey('FK_LENT_EMPLOYEE','{{%lent}}','[[employee_id]]','{{%employee}}','[[id]]');
        $this->addForeignKey('FK_LENT_EDC','{{%lent}}','[[edc_id]]','{{%edc}}','[[id]]');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%lent}}');
    }
}
