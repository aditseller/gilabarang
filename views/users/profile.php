


<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\db\Query;
use yii\bootstrap\Modal;
use yii\bootstrap\Button;
use app\models\Product;
use app\models\Comment;




$this->title = $model->fullname;




?>


<div class="row">
  <div class="col-md-2">
  <p class="profilename"><?=  $model->fullname; ?></p>
<p class="thumbnail">
<?php if(file_exists('public/uploads/profilepic/'.$model->id_user.'.png')) { ?>
<img src="<?= Yii::$app->homeUrl; ?>public/uploads/profilepic/<?= $model->id_user; ?>.png">
<?php } else { ?>
<img src="<?= Yii::$app->homeUrl; ?>public/usernopic.png">
<?php } ?>




</p>


<p class="profilejoindate">Tanggal Bergabung : </br><i><?=  date("j F Y",strtotime($model->joindate)); ?></i></p>
<p class="profilejoindate">Tanggal Lahir : </br><i><?=  date("j F Y",strtotime($model->birthyear.$model->birthmonth.$model->birthdate)); ?></i></p>
<p class="profilejoindate"><span class="glyphicon glyphicon-map-marker"></span> <?=  $model->location; ?> </p>

  
  <hr/>
  
  
  <div class="panel panel-warning">
  <div class="panel-heading "><b>Informasi Kontak</b></div>
  <div class="panel-body">
  
  <table class="table table-conseded table-striped">
  <tbody>
  <tr><th><img src="<?= Yii::$app->homeUrl; ?>public/phone.png" width="15" height="15"> <?= $model->phone; ?></th></tr>
   <tr><th><img src="<?= Yii::$app->homeUrl; ?>public/bbm.png" width="15" height="15"> <?= $model->chatid; ?></th></tr>
	</tbody>
  </table>
 
 </div>
 </div>

  


  




  
  </div>
  
     
  
   
   
   
    

   
   
    
 
  
  
  <div class="col-md-10">
  
  
  
  <div class="panel panel-default">
  <div class="panel-heading">
  <div class="pull-right">
  <div class="pull-right btn-group">
  
  

 

  
  
 
</div>
</div>
<ul class="nav nav-pills" role="tablist">
  <li role="presentation" class="active"><a><span class="badge">
  
  <?php echo Product::find()->where(['id_seller' => $model->id_user])->count(); ?>
  
  
  
  </span></a></li>

</ul>

<div class="clearfix"></div>
</div>
<div class="panel-body" id="yw7">
 
 
 

 
        <?php

		$productUserLogin = Product::find()->where(['id_seller' => $model->id_user])->orderBy(['start_date' =>SORT_DESC])->all();
if(!empty($productUserLogin))
{
  foreach($productUserLogin as $row)
  {
	  echo" <div class=col-md-4>".Html::a(
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
  

  
  
  </div>
</div>



  

   
