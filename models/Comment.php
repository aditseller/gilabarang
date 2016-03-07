<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comment".
 *
 * @property integer $id_comment
 * @property integer $id_product
 * @property string $product_title
 * @property integer $id_seller
 * @property integer $id_user
 * @property string $fullname
 * @property string $comment
 * @property string $comment_date
 *
 * @property Product $idProduct
 * @property Users $idUser
 * @property Users $fullname0
 * @property Users $idSeller
 * @property Product $productTitle
 */
class Comment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_product', 'product_title', 'id_seller', 'id_user', 'fullname', 'comment'], 'required'],
            [['id_product', 'id_seller', 'id_user'], 'integer'],
            [['comment'], 'string'],
            [['comment_date'], 'safe'],
            [['product_title', 'fullname'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_comment' => 'Id Comment',
            'id_product' => 'Id Product',
            'product_title' => 'Product Title',
            'id_seller' => 'Id Seller',
            'id_user' => 'Id User',
            'fullname' => 'Fullname',
            'comment' => 'Comment',
            'comment_date' => 'Comment Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdProduct()
    {
        return $this->hasOne(Product::className(), ['id_product' => 'id_product']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUser()
    {
        return $this->hasOne(Users::className(), ['id_user' => 'id_user']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFullname0()
    {
        return $this->hasOne(Users::className(), ['fullname' => 'fullname']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdSeller()
    {
        return $this->hasOne(Users::className(), ['id_user' => 'id_seller']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductTitle()
    {
        return $this->hasOne(Product::className(), ['title' => 'product_title']);
    }

    public function beforeSave($insert) 
    {

	$this->comment_date = date('Y-m-d H:i:s');
    	return parent::beforeSave($insert);
     }



}
