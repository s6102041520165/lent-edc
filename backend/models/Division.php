<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "division".
 *
 * @property int $id
 * @property int $name
 *
 * @property Edc[] $edcs
 * @property Employee[] $employees
 */
class Division extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'division';
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
            'name' => 'กอง',
        ];
    }

    /**
     * Gets query for [[Edcs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEdcs()
    {
        return $this->hasMany(Edc::className(), ['division_id' => 'id']);
    }

    /**
     * Gets query for [[Employees]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEmployees()
    {
        return $this->hasMany(Employee::className(), ['division_id' => 'id']);
    }
}