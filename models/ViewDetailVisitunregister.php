<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "view_detail_visitunregister".
 *
 * @property string $guest_name
 * @property string $company_name
 * @property string $id_number
 * @property string $phone_number
 * @property string $email
 * @property string $code
 * @property string $dt_visit
 * @property string $long_visit
 * @property string $additional_info
 */
class ViewDetailVisitunregister extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'view_detail_visitunregister';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['company_name', 'phone_number', 'email', 'code', 'dt_visit', 'long_visit', 'additional_info'], 'required'],
            [['dt_visit'], 'safe'],
            [['additional_info'], 'string'],
            [['guest_name', 'email', 'code', 'long_visit'], 'string', 'max' => 50],
            [['company_name'], 'string', 'max' => 100],
            [['id_number'], 'string', 'max' => 30],
            [['phone_number'], 'string', 'max' => 12],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'guest_name' => 'Nama Pengunjung',
            'company_name' => 'Tujuan',
            'id_number' => 'Nomor Identitas',
            'phone_number' => 'Nomor Telepon',
            'email' => 'Email',
            'code' => 'Kode Kunjungan',
            'dt_visit' => 'Tanggal/Jam Kunjungan',
            'long_visit' => 'Lama Kunjungan',
            'additional_info' => 'Informasi Kunjungan',
        ];
    }
}
