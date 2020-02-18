<?php

namespace app\models;

use common\models\User;
use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

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
            ['district_id','required','message' => 'กรุณาป้อน {attribute}'],
            [['import_date'], 'safe'],
            [['status', 'created_at', 'created_by', 'updated_at', 'updated_by','district_id'], 'integer'],
            [['serial_no'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'รหัสอ้างอิง ID',
            'serial_no' => 'Serial No',
            'import_date' => 'วัน เดือน ปี ที่ได้มา',
            'status' => 'สภาพการใช้งาน',
            'district_id' => 'เขต กพส.',
            'created_at' => 'เพิ่มข้อมูลเมื่อ',
            'created_by' => 'เพิ่มข้อมูลโดย',
            'updated_at' => 'แก้ไขข้อมูลเมื่อ',
            'updated_by' => 'แก้ไขข้อมูลโดย',
        ];
    }

    
    
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
            BlameableBehavior::className(),
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

    public function getEmployee()
    {
        return $this->hasOne(Employee::className(), ['id' => 'employee_id']);
    }

    public function getDistrict()
    {
        return $this->hasOne(District::className(), ['id' => 'district_id']);
    }

    public function getCreator()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    public function getUpdator()
    {
        return $this-> hasOne(User::className(), ['id'=> 'updated_by']);
    }
}
