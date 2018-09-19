<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "visited".
 *
 * @property int $id
 * @property string $guest_name
 * @property string $id_type
 * @property string $id_number
 * @property string $phone_number
 * @property string $email
 * @property string $photo
 * @property string $address
 * @property string $visit_code
 * @property string $destination
 * @property string $dt_visit
 * @property string $long_visit
 * @property string $additional_info
 * @property string $created
 */
class Visited extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'visited';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['guest_name', 'id_type', 'id_number', 'phone_number', 'email', 'photo', 'address', 'visit_code', 'destination', 'dt_visit', 'long_visit', 'additional_info'], 'required'],
            [['dt_visit'], 'safe'],
            ['email', 'email'],
            [['additional_info'], 'string'],
            [['guest_name', 'email', 'visit_code', 'long_visit'], 'string', 'max' => 50],
            [['id_type'], 'string', 'max' => 25],
            [['id_number'], 'string', 'max' => 30],
            [['phone_number'], 'string', 'max' => 12],
            [['address'], 'string', 'max' => 255],
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
            'visit_code' => 'Kode Kunjungan',
            'destination' => 'Tujuan',
            'dt_visit' => 'Tanggal Kunjungan',
            'long_visit' => 'Lama Kunjungan',
            'additional_info' => 'Informasi Kunjungan',
            'created' => 'Created',
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

    public function getDestination($id)
    {
        $rows = Yii::$app->db->createCommand('SELECT company_name FROM dcl_destination WHERE id=$id')->queryAll();
        return $row;
    }
}
