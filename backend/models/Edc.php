<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "edc".
 *
 * @property int $id
 * @property string|null $serial_no
 * @property string|null $import_date
 * @property int|null $status
 * @property int|null $created_at
 * @property int|null $created_by
 * @property int|null $updated_at
 * @property int|null $updated_by
 *
 * @property Lent[] $lents
 */
class Edc extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'edc';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['import_date'], 'safe'],
            [['status', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['serial_no'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'serial_no' => 'Serial No',
            'import_date' => 'Import Date',
            'status' => 'Status',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * Gets query for [[Lents]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLents()
    {
        return $this->hasMany(Lent::className(), ['edc_id' => 'id']);
    }
}
