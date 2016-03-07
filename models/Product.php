<?php

namespace app\models;

use Yii;
use yii\imagine\Image;

/**
 * This is the model class for table "product".
 *
 * @property integer $id_product
 * @property string $title
 * @property string $condition
 * @property string $price
 * @property string $seller
 * @property string $email_seller
 * @property string $phone_seller
 * @property string $category
 * @property string $image
 * @property string $image2
 * @property string $image3
 *
 * @property Users $seller0
 * @property Category $category0
 * @property Users $emailSeller
 */
class Product extends \yii\db\ActiveRecord
{
	public $image;
	public $image2;
	public $image3;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'condition', 'price', 'category','id_seller','seller','email_seller','location_seller','phone_seller','description','start_date','end_date'], 'required'],
            [['condition'], 'string'],
            [['title'], 'string', 'max' => 65,'min' =>6],
            [['title'], 'unique','message'=>'Silahkan Ketik Judul lain !, Judul Tersebut Sudah Digunakan.'],
            [['price'], 'integer','message'=>'Harga harus berupa Angka !'],
            [['category'], 'string', 'max' => 50],
			[['image','image2','image3'], 'image','extensions'=>'jpg, gif, png','maxSize' => 500000, ],
            
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_product' => 'Id Product',
            'title' => 'Judul',
            'condition' => 'Kondisi',
            'price' => 'Harga',
            'id_seller' => 'Id Penjual',
            'seller' => 'Penjual',
            'email_seller' => 'Email Penjual',
            'phone_seller' => 'No Handphone Penjual',
            'location_seller' => 'Lokasi Penjual',
            'category' => 'Kategori',
            'description' => 'Deskripsi',
            'image' => 'Image',
            'image2' => 'Image2',
            'image3' => 'Image3',
			'start_date' =>'Tanggal Pasang',
			'end_date' => 'Batas Waktu s/d',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSeller0()
    {
        return $this->hasOne(Users::className(), ['fullname' => 'seller']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory0()
    {
        return $this->hasOne(Category::className(), ['category' => 'category']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmailSeller()
    {
        return $this->hasOne(Users::className(), ['email' => 'email_seller']);
    }
	
	
	
	
}
