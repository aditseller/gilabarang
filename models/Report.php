<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "report".
 *
 * @property integer $id_report
 * @property string $report
 * @property integer $id_product
 * @property string $description
 *
 * @property Product $idProduct
 */
class Report extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'report';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['report', 'id_product', 'description'], 'required'],
            [['id_product'], 'integer'],
            [['description'], 'string'],
            [['report'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_report' => 'Id Report',
            'report' => 'Laporan',
            'id_product' => 'Id Product',
            'description' => 'Penjelasan Laporan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdProduct()
    {
        return $this->hasOne(Product::className(), ['id_product' => 'id_product']);
    }
}
