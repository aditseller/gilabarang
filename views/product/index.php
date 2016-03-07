<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Search';

?>

<?php  echo $this->render('_search', ['model' => $searchModel]); ?>

</br>
<div class="product-index">


    



    <?= GridView::widget([
        'dataProvider' => $dataProvider,
		'showHeader' => false,
        'columns' => [
		
			array(
				'format' => 'raw',
				
				'value'=>function ($data) {
					return Html::a(
					
					'<div class="row" ><div class="col-lg-2">'.
					Html::img(Yii::$app->request->baseUrl.'/public/uploads/product/thumb-'.$data->id_product.'1.png',['class'=>'thumbnail'])
					.'</div><div class="col-md-10"><h3>'.$data->title
					.'</h3><span class="glyphicon glyphicon-paperclip"></span> '.$data->category
					.' <span class="glyphicon glyphicon-option-vertical"></span> <span class="glyphicon glyphicon-bookmark"></span> '
					.strtr($data->condition , array("new" => "Baru", "second" => "Bekas"))
					.' <span class="glyphicon glyphicon-option-vertical"></span> <span class="glyphicon glyphicon-map-marker"></span> '.$data->location_seller
					.' <span class="glyphicon glyphicon-option-vertical"></span> <span class="glyphicon glyphicon-calendar"></span> '.date('j F Y',strtotime($data->start_date))
					
					.'<h4>Rp '.number_format($data->price,"0",",",".").'</h4>'
					.'</div>',
					
							['product/detail','id'=>$data->id_product]);
				},
			
			),
            

           
			

            
        ],
    ]); ?>

</div>
