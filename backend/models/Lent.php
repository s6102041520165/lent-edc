<?php

namespace app\models;

use common\models\User;
use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "lent".
 *
 * @property int $id
 * @property string|null $lent_date
 * @property int|null $employee_id
 * @property int|null $edc_id
 * @property int|null $status
 * @property string|null $return_date
 * @property int|null $created_at
 * @property int|null $created_by
 * @property int|null $updated_at
 * @property int|null $updated_by
 *
 * @property Edc $edc
 * @property Employee $employee
 */
class Lent extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lent';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['edc_id','employee_id'],'required','message'=>'กรุณาป้อน {attribute}'],
            [['lent_date', 'return_date'], 'safe'],
            [['employee_id', 'edc_id', 'status', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['edc_id'], 'exist', 'skipOnError' => true, 'targetClass' => Edc::className(), 'targetAttribute' => ['edc_id' => 'id']],
            [['employee_id'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::className(), 'targetAttribute' => ['employee_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'รหัสอ้างอิงการยืม',
            'lent_date' => 'วันที่เบิก',
            'employee_id' => 'พนักงาน',
            // ['label'=>'ผู้ถือกรรมสิทธิ์,'attribute'=>'ownership.name'],
            'edc_id' => 'เครื่อง EDC',
            'status' => 'สถานะการยืมคืน',
            'return_date' => 'วันที่คืน',
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
     * Gets query for [[Edc]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEdc()
    {
        return $this->hasOne(Edc::className(), ['id' => 'edc_id']);
    }

    /**
     * Gets query for [[Employee]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEmployee()
    {
        return $this->hasOne(Employee::className(), ['id' => 'employee_id']);
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
