<?php

namespace app\models;

use Yii;

class DclDestination extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'dcl_destination';
    }

    public function rules()
    {
        return [
            [['company_name', 'open_hour', 'close_hour', 'phone', 'email', 'profile', 'picture', 'address'], 'required'],
            [['open_hour', 'close_hour'], 'safe'],
            [['profile', 'address'], 'string'],
            [['company_name'], 'string', 'max' => 100],
            [['email'], 'string', 'max' => 50],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'company_name' => 'Company Name',
            'open_hour' => 'Open Hour',
            'close_hour' => 'Close Hour',
            'phone' => 'Phone',
            'email' => 'Email',
            'profile' => 'Profile',
            'picture' => 'Picture',
            'address' => 'Address',
        ];
    }
}
