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
            [['name', 'vms_type_id', 'id_number', 'gender', 'phone', 'email', 'photo', 'address', 'visit_code', 'employe_id', 'vms_tenant_id', 'visit_date', 'visit_long', 'additional_info'], 'required'],
            [['dt_visit'], 'safe'],
            ['email', 'email'],
            [['additional_info'], 'string'],
            [['name', 'email', 'visit_long'], 'string', 'max' => 50],
            [['id_number'], 'string', 'max' => 30],
            [['phone'], 'string', 'max' => 12],
            [['address'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Nama Pengunjung',
            'vms_type_id' => 'Tipe Identitas',
            'id_number' => 'Nomor Identitas',
            'gender' => 'Jenis Kelamin',
            'phone' => 'Nomor Telepon',
            'email' => 'Email',
            'photo' => 'Foto',
            'address' => 'Alamat',
            'visit_code' => 'Kode Kunjungan',
            'visit_date' => 'Tanggal & Jam Kunjungan',
            'visit_long' => 'Durasi Kunjungan',
            'employe_id' => 'Bertemu Dengan',
            'additional_info' => 'Informasi Kunjungan',
            'created' => 'Tanggal & Jam Permohonan',
        ];
    }

    public function getTenant()
    {
        return $this->hasOne(VmsTenant::className(), ['id' => 'vms_tenant_id']);
    }

    public function getType()
    {
        return $this->hasOne(VmsType::className(), ['id' => 'vms_type_id']);
    }




}
