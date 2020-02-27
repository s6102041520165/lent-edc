<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "district".
 *
 * @property int $id
 * @property int $name
 *
 * @property Edc[] $edcs
 * @property Employee[] $employees
 */
class District extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'district';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'รหัสอ้างอิง',
            'name' => 'เขต พกส.',
        ];
    }

    /**
     * Gets query for [[Edcs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEdcs()
    {
        return $this->hasMany(Edc::className(), ['district_id' => 'id']);
    }

    /**
     * Gets query for [[Employees]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEmployees()
    {
        return $this->hasMany(Employee::className(), ['district_id' => 'id']);
    }
}
