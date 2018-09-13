<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "view_detail_visit".
 *
 * @property string $guest_name
 * @property string $code
 * @property string $company_name
 * @property string $dt_visit
 * @property string $long_visit
 * @property string $additional_info
 */
class ViewDetailVisit extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'view_detail_visit';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code', 'company_name', 'dt_visit', 'long_visit', 'additional_info'], 'required'],
            [['dt_visit'], 'safe'],
            [['additional_info'], 'string'],
            [['guest_name', 'code', 'long_visit'], 'string', 'max' => 50],
            [['company_name'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'guest_name' => 'Nama Pengunjung',
            'code' => 'Kode Kunjungan',
            'company_name' => 'Tujuan',
            'dt_visit' => 'Tanggal/Jam Kunjungan',
            'long_visit' => 'Lama Kunjungan',
            'additional_info' => 'Informasi Kunjungan',
        ];
    }
}
