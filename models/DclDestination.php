<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dcl_destination".
 *
 * @property int $id
 * @property string $company_name
 * @property string $open_hour
 * @property string $close_hour
 * @property string $build_name
 * @property int $floor
 * @property int $phone
 * @property string $email
 * @property string $profile
 * @property string $picture
 * @property string $address
 */
class DclDestination extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dcl_destination';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['company_name', 'open_hour', 'close_hour', 'build_name', 'floor', 'phone', 'email', 'profile', 'picture', 'address'], 'required'],
            [['open_hour', 'close_hour'], 'safe'],
            [['floor', 'phone'], 'integer'],
            [['profile', 'address'], 'string'],
            [['company_name', 'build_name'], 'string', 'max' => 100],
            [['email'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'company_name' => 'Company Name',
            'open_hour' => 'Open Hour',
            'close_hour' => 'Close Hour',
            'build_name' => 'Build Name',
            'floor' => 'Floor',
            'phone' => 'Phone',
            'email' => 'Email',
            'profile' => 'Profile',
            'picture' => 'Picture',
            'address' => 'Address',
        ];
    }
}
