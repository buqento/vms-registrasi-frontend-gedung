<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vms_tenant".
 *
 * @property int $id
 * @property string $name
 * @property string $open
 * @property string $close
 * @property int $phone
 * @property string $email
 * @property string $profile
 * @property string $picture
 * @property string $address
 */
class VmsTenant extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vms_tenant';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'open', 'close', 'phone', 'email', 'profile', 'picture', 'address'], 'required'],
            [['open', 'close'], 'safe'],
            [['phone'], 'integer'],
            [['profile', 'picture', 'address'], 'string'],
            [['name'], 'string', 'max' => 100],
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
            'name' => 'Name',
            'open' => 'Open',
            'close' => 'Close',
            'phone' => 'Phone',
            'email' => 'Email',
            'profile' => 'Profile',
            'picture' => 'Picture',
            'address' => 'Address',
        ];
    }
}
