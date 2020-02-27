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
class LentSave extends \app\models\Lent
{
    
    public function rules()
    {
        return [
            ['edc_id', 'required','message'=>'กรุณากรอกข้อมูล {attribute}'],
            //[['lent_date', 'return_date'], 'safe'],
            [['employee_id', 'edc_id', 'status', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['edc_id'], 'exist', 'skipOnError' => true, 'targetClass' => Edc::className(), 'targetAttribute' => ['edc_id' => 'id']],
            [['employee_id'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::className(), 'targetAttribute' => ['employee_id' => 'id']],
            ['edc_id','validateEdc'],
        ];
    }


    public function validateEdc($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $edc = $this->checkEdc();
            if (isset($edc)) {
                $this->addError($attribute, 'เครื่อง EDC ถูกยืมไปแล้ว');
            }
        }
    }

    public function checkEdc()
    {
        return static::findOne(['edc_id' => $this->edc_id, 'status' => 1]);
    }

    
}
