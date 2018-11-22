<?php

namespace app\models;

use Yii;

class Visited extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'visited';
    }

    public function rules()
    {
        return [
            [['guest_name', 'type_id', 'id_number', 'gender', 'phone_number', 'email', 'photo', 'address', 'visit_code', 'host', 'destination_id', 'dt_visit', 'long_visit', 'additional_info'], 'required'],
            [['dt_visit'], 'safe'],
            ['email', 'email'],
            [['additional_info'], 'string'],
            [['guest_name', 'email', 'long_visit'], 'string', 'max' => 50],
            [['id_number'], 'string', 'max' => 30],
            [['phone_number'], 'string', 'max' => 12],
            [['address'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'guest_name' => 'Nama Pengunjung',
            'type_id' => 'Tipe Identitas',
            'id_number' => 'Nomor Identitas',
            'gender' => 'Jenis Kelamin',
            'phone_number' => 'Nomor Telepon',
            'email' => 'Email',
            'photo' => 'Foto',
            'address' => 'Alamat',
            'visit_code' => 'Kode Kunjungan',
            'destination_id' => 'Tujuan',
            'dt_visit' => 'Tanggal & Jam Kunjungan',
            'long_visit' => 'Durasi Kunjungan',
            'host' => 'Bertemu Dengan',
            'additional_info' => 'Informasi Kunjungan',
            'created' => 'Tanggal & Jam Permohonan',
        ];
    }

    public function getTenant()
    {
        return $this->hasOne(DclDestination::className(), ['id' => 'destination_id']);
    }

    public function getType()
    {
        return $this->hasOne(DclType::className(), ['id' => 'type_id']);
    }




}
