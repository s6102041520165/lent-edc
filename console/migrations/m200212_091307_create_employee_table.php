<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%employee}}`.
 */
class m200212_091307_create_employee_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%employee}}', [
            'id' => $this->primaryKey(),
            'rfid'=>$this->string(20)->unique(),
            'firstname' => $this->string(50),
            'lastname' => $this->string(50),
            'line' => $this->string(50),
            'district_id' => $this->integer(),
            
            'created_at' => $this->integer(),
            'created_by' => $this->integer(),
            'updated_at' => $this->integer(),
            'updated_by' => $this->integer()
        ]);

        $this->addForeignKey('FK_EMPLOYEE_DISTRICT','{{%employee}}','[[district_id]]','{{district}}','[[id]]');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%employee}}');
    }
}