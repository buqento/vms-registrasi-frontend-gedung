<?php

namespace app\models;
use common\models\User;

use Yii;

class Userapp extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    public static function tableName()
    {
        return 'user_app';
    }

    public function rules()
    {
        return [
            ['name', 'required', 'message' => 'Nama pengunjung tidak boleh kosong.' ],
            ['vms_type_id', 'required', 'message' => 'Tipe identitas tidak boleh kosong.' ],
            ['id_number', 'required', 'message' => 'Nomor identitas tidak boleh kosong.' ],
            ['email', 'required', 'message' => 'Email tidak boleh kosong.' ],
            ['phone', 'required', 'message' => 'Nomor telepon tidak boleh kosong.' ],
            ['address', 'required', 'message' => 'Alamat tidak boleh kosong.' ],
            ['username', 'required', 'message' => 'Nama pengguna tidak boleh kosong.' ],
            ['password', 'required', 'message' => 'Kata sandi tidak boleh kosong.' ],
            ['phone', 'integer', 'message' => 'Nomor telepon tidak sesuai.'],
            ['email', 'email', 'message' => 'Email tidak sesuai.'],
            ['username', 'unique', 'message' => 'Nama pengguna telah terdaftar'],
            ['email', 'unique', 'message' => 'Email telah terdaftar'],
            ['name', 'string', 'max' => 50],
            ['id_number', 'string', 'max' => 30],
            ['phone', 'string', 'max' => 12]
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Nama Pengunjung',
            'vms_type_id' => 'Tipe Identitas',
            'id_number' => 'Nomor Identitas',
            'phone' => 'Nomor Telepon',
            'email' => 'Email',
            'photo' => 'Foto',
            'address' => 'Alamat',
            'username' => 'Nama Pengguna',
            'password' => 'Kata Sandi',
            'authKey' => 'Auth Key',
        ];
    }

    public function signup($username, $password)
    {        
        $user = new Userapp();
        $user->username = $username;
        $user->password = $password;
    }

    public function getAuthKey()
    {
        return $this->authKey;
    }

    public function getId()
    {
        return $this->id;
    }

    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    public static function findIdentity($id)
    {
        return self::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new \yii\base\NotSupportedException();
    }

    public static function findByUsername($username)
    {
        return self::findOne(['username' => $username]);
    }

    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password);
    }

    public function setPassword($password)
    {
        return Yii::$app->security->generatePasswordHash($password);
    }

    public function generateAuthKey()
    {
        return Yii::$app->security->generateRandomString();
    }
    
    public function getType()
    {
        return $this->hasOne(VmsType::className(), ['id' => 'vms_type_id']);
    }
}
