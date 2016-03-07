<?php
use yii\helpers\Html;
use app\models\Product;


/* @var $this yii\web\View */
$this->title = 'Gilabarang';
?>





<form method="get"  action="search">

    <div class="input-group">
<input type="text" name="GlobalSearch[query]" class="form-control input-lg" placeholder="Cari Barang...">
  <span class="input-group-btn">
        <button class="btn btn-default btn-lg" type="submit"><span class="glyphicon glyphicon-search"></span> Cari</button>
      </span>
	  </div>

</form>

</br>


<div class="site-index">



    <div class="body-content">

        <div class="row">
            
			
			<?php

		$productUserLogin = Product::find()->orderBy(['start_date' =>SORT_DESC])->all();
if(!empty($productUserLogin))
{
  foreach($productUserLogin as $row)
  {
	  echo" <div class=col-md-3>".Html::a(
	  '<img  src='.Yii::$app->request->baseUrl.'/public/uploads/product/thumb-'.$row->id_product.'1.png >
	  
	  <center style=height:40px><b style=font-size:1.0em;>'.$row->title.'</b></center>
	  <center style=margin-bottom:5px><b style=font-size:0.8em;>'.$row->category.' <span class="glyphicon glyphicon-chevron-right"></span> '.$row->location_seller.' , <span class="glyphicon glyphicon-bookmark"></span> '.strtr($row->condition , array("new" => "Baru", "second" => "Bekas")).'</b></center>
	  <button type="submit" class="btn btn-success btn-block btn-lg">Rp '.number_format($row->price,"0",",",".").'</button>',
	  ['product/detail','id'=>$row->id_product],['class'=>'thumbnail'])."</div>";





  
  }
}

		?>
			
            
        </div>

    </div>
</div>
