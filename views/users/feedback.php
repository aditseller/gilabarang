<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\grid\GridView;






?>

	<div class="col-lg-2"></div>
<div class="col-lg-7">


<div class="panel panel-info">
  <div class="panel-heading "><b>Feedback</b></div>
  <div class="panel-body">
  
  
 
<?= GridView::widget([
       'dataProvider' => $dataComment,
	   'showHeader' => false,
       'columns' => [
           
           [
               
              'format'=>'raw',
               'value'=>function($data){
                   return
				   
				   Html::a('<strong><span class="glyphicon glyphicon-user"></span> '.$data["fullname"].'</strong>',['users/profile','id'=>$data["id_user"]]).
				   '<i> Commented '.Html::a($data["product_title"],['product/detail','id'=>$data["id_product"]]).'</i> <span class="glyphicon glyphicon-option-vertical"></span> <i>'.date('j F Y, H:i',strtotime($data["comment_date"])).'</i></br>'.$data["comment"];
               }
           ],
         
    
       ],
   ]); ?>



  
  
  
 
  </div>
  </div>
  </div>
  