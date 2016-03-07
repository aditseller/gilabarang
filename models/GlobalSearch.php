<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Product;

/**
 * GlobalSearch represents the model behind the search form about `app\models\Product`.
 */
class GlobalSearch extends Product
{
	
	public $query;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_product', 'id_seller'], 'integer'],
            [['title','query','condition', 'price', 'seller', 'email_seller', 'phone_seller', 'location_seller', 'category', 'description', 'start_date', 'end_date'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Product::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
			'sort'=> ['defaultOrder' => ['start_date'=>SORT_DESC]]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

 

        $query->orFilterWhere(['like', 'title', $this->query])
            ->orFilterWhere(['like', 'condition', $this->query])
            ->orFilterWhere(['like', 'price', $this->query])
            ->orFilterWhere(['like', 'seller', $this->query])
            ->orFilterWhere(['like', 'email_seller', $this->query])
            ->orFilterWhere(['like', 'phone_seller', $this->query])
            ->orFilterWhere(['like', 'location_seller', $this->query])
            ->orFilterWhere(['like', 'category', $this->query]);

        return $dataProvider;
    }
}
