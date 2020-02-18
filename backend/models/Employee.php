<?php

namespace app\models;

use common\models\User;
use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "employee".
 *
 * @property int $id
 * @property string|null $rfid
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
            [['rfid', 'firstname', 'lastname', 'line'], 'required', 'message' => 'กรุณาป้อน {attribute}'],
            [['created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['rfid'], 'string', 'max' => 20],
            [['firstname', 'lastname', 'line'], 'string', 'max' => 50],
            [['rfid'], 'unique','message' => '{attribute} ไม่สามารถเพิ่มได้ เนื่องจากพบ {value} ในฐานข้อมูล'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'รหัส',
            'rfid' => 'RFID',
            'firstname' => 'ชื่อ',
            'lastname' => 'นามสกุล',
            'line' => 'สายการเดินรถ',
            'created_at' => 'เพิ่มเมื่อ',
            'created_by' => 'เพิ่มโดย',
            'updated_at' => 'แก้ไขเมื่อ',
            'updated_by' => 'แก้ไขโดย',
        ];
    }

    public function behaviors()
    {
        return [
            BlameableBehavior::className(),
            TimestampBehavior::className(),
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

    public function getCreator()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    public function getUpdator()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }
}
