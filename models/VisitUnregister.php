<?php

namespace app\models;
use Yii;
use app\models\DclDestination;
/**
 * This is the model class for table "visit_unregister".
 *
 * @property int $id
 * @property string $guest_name
 * @property string $id_number
 * @property string $phone_number
 * @property string $email
 * @property string $photo
 * @property string $code
 * @property int $destination_id
 * @property string $dt_visit
 * @property string $long_visit
 * @property string $additional_info
 */
class VisitUnregister extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'visit_unregister';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['guest_name', 'id_type', 'id_number', 'phone_number', 'address', 'email', 'photo', 'code', 'destination_id', 'dt_visit', 'long_visit', 'additional_info'], 'required'],
            [['destination_id'], 'integer'],
            [['dt_visit'], 'safe'],
            [['additional_info'], 'string'],
            [['guest_name', 'email', 'code', 'long_visit'], 'string', 'max' => 50],
            ['email', 'email'],
            [['id_number'], 'string', 'max' => 30],
            [['phone_number'], 'string', 'max' => 12],
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
            'code' => 'Kode Kunjungan',
            'destination_id' => 'Tujuan',
            'dt_visit' => 'Tanggal/Jam Kunjungan',
            'long_visit' => 'Lama Kunjungan',
            'additional_info' => 'Informasi Kunjungan',
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            $this->photo->saveAs('user/unregister/photo/' . $this->photo->baseName . '.' . $this->photo->extension);
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
