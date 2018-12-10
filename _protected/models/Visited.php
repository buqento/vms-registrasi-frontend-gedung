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
            
            ['name', 'required', 'message' => 'Nama pengunjung tidak boleh kosong.' ],
            ['id_number', 'required', 'message' => 'Nomor Identitas tidak boleh kosong.' ],
            ['phone', 'required', 'message' => 'Nomor Telepon  tidak boleh kosong.' ],
            ['email', 'required', 'message' => 'Email  tidak boleh kosong.' ],
            ['address', 'required', 'message' => 'Alamat tidak boleh kosong.' ],
            ['visit_date', 'required', 'message' => 'Tanggal & jam kunjungan tidak boleh kosong.' ],
            ['employe_id', 'required', 'message' => 'Bertemu dengan tidak boleh kosong.' ],
            ['additional_info', 'required', 'message' => 'Informasi kunjungan tidak boleh kosong.' ],
            ['dt_visit', 'safe'],
            ['email', 'email', 'message' => 'Email tidak sesuai.'],
            ['additional_info', 'string'],
            [['name', 'email'], 'string', 'max' => 50],
            ['id_number', 'string', 'max' => 30],
            ['phone', 'string', 'max' => 12],
            ['address', 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Nama Pengunjung',
            'vms_type_id' => 'Tipe Identitas',
            'id_number' => 'Nomor Identitas',
            'vms_tenant_id' => 'Tenant',
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

    public function getEmploye()
    {
        return $this->hasOne(Employe::className(), ['id' => 'employe_id']);
    }


}
