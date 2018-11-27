<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "employe".
 *
 * @property int $id
 * @property int $vms_tenant_id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $position
 */
class Employe extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'employe';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['vms_tenant_id', 'name', 'email', 'phone', 'position'], 'required'],
            [['vms_tenant_id'], 'integer'],
            [['name', 'email', 'position'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 16],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'vms_tenant_id' => 'Vms Tenant ID',
            'name' => 'Name',
            'email' => 'Email',
            'phone' => 'Phone',
            'position' => 'Position',
        ];
    }
}
