<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "visit".
 *
 * @property int $id
 * @property string $code
 * @property int $user_id
 * @property int $destination_id
 * @property string $dt_visit
 * @property string $long_visit
 * @property string $additional_info
 */
class Visit extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'visit';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code', 'user_id', 'destination_id', 'dt_visit', 'long_visit', 'additional_info'], 'required'],
            [['user_id', 'destination_id'], 'integer'],
            [['dt_visit'], 'safe'],
            [['additional_info'], 'string'],
            [['code', 'long_visit'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'Id Pengunjung',
            'code' => 'Kode Kunjungan',
            'destination_id' => 'Tujuan',
            'dt_visit' => 'Tanggal/Jam Kunjungan',
            'long_visit' => 'Lama Kunjungan',
            'additional_info' => 'Informasi Kunjungan',
        ];
    }
}
