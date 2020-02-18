<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string|null $password_reset_token
 * @property string $email
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property string|null $verification_token
 */
class UserProfile extends Model
{
    public $username;
    public $new_password;
    public $retry_password;
    public $old_password;

    public function rules()
    {
        return [
            [['username','new_password','retry_password','old_password'],'string'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'username' => 'ชื่อผู้ใช้',
            'old_password'=> 'รหัสผ่านเก่า',
            'retry_password' => 'ยืนยันรหัสผ่าน',
            'new_password' => 'รหัสผ่านใหม่',
        ];
    }
}
