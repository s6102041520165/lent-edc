<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "employee".
 *
 * @property int $id
 * @property string|null $firstname
 * @property string|null $lastname
 * @property string|null $line
 * @property int|null $created_at
 * @property int|null $created_by
 * @property int|null $updated_at
 * @property int|null $updated_by
 *
 * @property Lent[] $lents
 */
class Employee extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'employee';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lastname'], 'safe'],
            [['created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['firstname', 'line'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'รหัสอ้างอิงพนักงาน',
            'employee_id' => 'รหัสพนักงาน',
            'firstname' => 'ชื่อจริง',
            'lastname' => 'นามสกุล',
            'line' => 'สายการเดินรถ',
            'created_at' => 'เพิ่มข้อมูลเมื่อ',
            'created_by' => 'เพิ่มข้อมูลโดย',
            'updated_at' => 'แก้ไขข้อมูลเมื่อ',
            'updated_by' => 'แก้ไขข้อมูลโดย',
        ];
    }

    /**
     * Gets query for [[Lents]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLents()
    {
        return $this->hasMany(Lent::className(), ['employee_id' => 'id']);
    }
}
