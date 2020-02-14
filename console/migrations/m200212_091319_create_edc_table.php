<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%edc}}`.
 */
class m200212_091319_create_edc_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%edc}}', [
            'id' => $this->primaryKey(),
            'serial_no' => $this->string(50),
            'import_date' => $this->date(),
            'status' => $this->integer(),
            'district_id' => $this->integer(),
            
            'created_at' => $this->integer(),
            'created_by' => $this->integer(),
            'updated_at' => $this->integer(),
            'updated_by' => $this->integer()
        ]);

        $this->addForeignKey('FK_EDC_DISTRICT','{{%edc}}','[[district_id]]','{{%district}}','[[id]]');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%edc}}');
    }
}
