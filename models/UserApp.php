<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_app".
 *
 * @property string $id
 * @property string $guest_name
 * @property string $id_number
 * @property string $phone_number
 * @property string $email
 * @property string $photo
 * @property string $username
 * @property string $password
 * @property string $authKey
 */
class UserApp extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_app';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['guest_name', 'id_type', 'id_number', 'email', 'phone_number', 'address', 'username', 'password'], 'required'],
            [['guest_name', 'email'], 'string', 'max' => 50],
            [['id_number', 'username', 'password'], 'string', 'max' => 30],
            [['phone_number'], 'string', 'max' => 12],
            [['authKey'], 'string', 'max' => 64],
            [['email'], 'email'],
            [['photo'], 
                'file', 
                'skipOnEmpty' => false,
                'extensions' => 'png, jpg',
                'maxSize' => 2097152, //500 kilobytes is 500 * 1024 bytes = 512 000 bytes
                'tooBig' => 'Ukuran maksimal file 2MB'
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'guest_name' => 'Nama Pengunjung',
            'id_type' => 'Tipe Identitas',
            'id_number' => 'Nomor Identitas',
            'phone_number' => 'Nomor Telepon',
            'email' => 'Email',
            'photo' => 'Foto',
            'address' => 'Alamat',
            'username' => 'Nama Pengguna',
            'password' => 'Kata Sandi',
            'authKey' => 'Auth Key',
        ];
    }
    
    public function upload()
    {
        if ($this->validate()) {
            $this->photo->saveAs('user/photo/' . $this->photo->baseName . '.' . $this->photo->extension);
            return true;
        } else {
            return false;
        }
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
        return $this->password === $password;
    }
}
