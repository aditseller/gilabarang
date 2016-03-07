<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;



use app\models\Users;
use app\models\Comment;


/* @var $this yii\web\View */
/* @var $model app\models\Product */

$this->title = $model->title;
//$this->params['breadcrumbs'][] = ['label' => $model->location_seller, 'url' => ['province','location'=>$model->location_seller]];
//$this->params['breadcrumbs'][] = $this->title;
?>

<?php  
//report item flash message success
if(Yii::$app->session->hasFlash('reportitemsuccess')) {
	
	
	echo'<div class="alert alert-success">
        Terima Kasih atas Laporan yang anda berikan.
    </div>';
	
	
	
}

	?>
	
	
	<?php  
//Comment item flash message success
if(Yii::$app->session->hasFlash('commentitemsuccess')) {
	
	
	echo'<div class="alert alert-info">
        Terima Kasih Atas Komentar Yang Anda Berikan.
    </div>';
	
	
	
}

	?>
	
	
	


 <?php 
 // User Seller Data in Product
 $dataUser  = Users::find()->where(['id_user' => $model->id_seller])->all();


		if(!empty($dataUser))
{
  foreach($dataUser as $row)
  {
	  
	  ?>



<div class="col-md-8">
<div class="panel panel-default">
  <div class="panel-body">
  
  




    <h1><?= Html::encode($this->title) ?></h1>
	
	<ol class="breadcrumb">
	<span class="glyphicon glyphicon-calendar"></span> <?= date('j F Y',strtotime($model->start_date)); ?> - <?= date('j F Y',strtotime($model->end_date)); ?>
	<span class="glyphicon glyphicon-bookmark"></span> <?= strtr($model->condition , array("new" => "Baru", "second" => "Bekas")); ?>
		 
	
	
	</ol>
	

	<center>

	<?php 
    echo \metalguardian\fotorama\Fotorama::widget(
        [
            'items' => [
                ['img' => Yii::$app->request->baseUrl.'/public/uploads/product/'.$model->id_product.'1.png', 'id' => 'id-one',],
                ['img' => Yii::$app->request->baseUrl.'/public/uploads/product/'.$model->id_product.'2.png',],
                ['img' => Yii::$app->request->baseUrl.'/public/uploads/product/'.$model->id_product.'3.png',],
              
            ],
            'options' => [
                'nav' => 'thumbs',
				'ratio' => 30/15,
            ]
        ]
    ); 
    ?>
   
	</center>
</br>

<!---Tab--->

<ul id="w1" class="nav nav-tabs"><li class="active"><a href="#w1-tab0" data-toggle="tab" aria-expanded="true"><h4><span class="glyphicon glyphicon-th-list"></span> Deskripsi</h4></a></li>
<li class=""><a href="#w1-tab1" data-toggle="tab" aria-expanded="false"><h4><span class="glyphicon glyphicon-comment"></span> Komentar</h4></a></li></ul>

<!---End Tab--->


<!---Content Tab--->

<div class="tab-content">

<div id="w1-tab0" class="tab-pane active"><br><?= $model->description; ?></div>

<div id="w1-tab1" class="tab-pane">

</br>
<div class="panel">
  <div class="panel-body">
<?php 
//Comment List
$dataComment  = Comment::find()->where(['id_product' => $model->id_product])->all();
	
if(!empty($dataComment))
	{
  foreach($dataComment as $rowComment)
		{		
?>


<?= Html::a('<strong><span class="glyphicon glyphicon-user"></span> '.$rowComment->fullname.'</strong>',['users/profile','id'=>$rowComment->id_user]) ?> <span class="glyphicon glyphicon-option-vertical"></span> <i><?= date('j F Y, H:i',strtotime($rowComment->comment_date)); ?></i>

</br>
 <?= $rowComment->comment; ?>

<hr/>
	  
<?php }} else { ?>	

<?php echo'No Comment Found'; ?>

<?php } ?>

</div>
	  </div>

<?php if (!Yii::$app->user->isGuest) : ?>


 <?php 
 //Comment Form
 $form = ActiveForm::begin(['id'=>'comment-form']); 
 ?>
 <?= $form->field($modelComment,'id_product')->hiddenInput(['value'=>$model->id_product])->label(false) ?>
 <?= $form->field($modelComment,'product_title')->hiddenInput(['value'=>$model->title])->label(false) ?>
 <?= $form->field($modelComment,'id_user')->hiddenInput(['value'=>Yii::$app->user->identity->id])->label(false) ?>
 <?= $form->field($modelComment,'id_seller')->hiddenInput(['value'=>$model->id_seller])->label(false) ?>
 <?= $form->field($modelComment,'fullname')->hiddenInput(['value'=>Yii::$app->user->identity->fullname])->label(false) ?>
 <?= $form->field($modelComment,'comment')->textArea(['rows'=>8,'placeholder'=>'Silahkan Ketik Komentar........'])->label(false) ?>
     <div class="form-group">
        <?= Html::submitButton('Kirim Komentar', ['class' => 'btn btn-info']) ?>
    </div>
     <?php ActiveForm::end(); ?>

	 <?php else: ?>
	 
	 </br>
	 <textarea id="comment-comment" class="form-control" name="Comment[comment]" rows="8" placeholder="Silahkan Login Untuk Berkomentar........" disabled="active"></textarea>
	 
	 
	 <?php endif; ?>
	 
</div>
</div>

<!---End Content Tab--->


</div>

</div>
</div>










<div class="col-md-4">
<div class="panel panel-default">
  <div class="panel-body">
  
  

<p style="font-size:2em; text-align:center;">Rp <?= number_format($model->price,"0",",",".") ?></p>


</br>
  <div class="well">
  <p style="font-size:1.3em"><span class="glyphicon glyphicon-user"></span> <?= Html::a($model->seller,['users/profile','id'=>$model->id_seller]) ?><span style="font-size:0.7em" > <span class="glyphicon glyphicon-ok-circle"></span></span></p>
  <p style="font-size:1.3em"><span class="glyphicon glyphicon-map-marker"></span> <?= $model->location_seller; ?></p>
  <p style="font-size:1.1em"><i> Bergabung Sejak <?= date('j F Y',strtotime($row->joindate)); ?></i></p>

  </div>

 
  

	  <table class="table table-conseded table-striped table-bordered">
  <tbody>
  <tr><th style="font-size:1.3em"><img src="<?= Yii::$app->homeUrl; ?>public/phone.png" width="25" height="25"> <?= $model->phone_seller; ?></th></tr>
   <tr><th style="font-size:1.3em"><img src="<?= Yii::$app->homeUrl; ?>public/bbm.png" width="25" height="25"> <?= $row->chatid; ?></th></tr>
	</tbody>
  </table>


<?php  
//report item flash message success
if(Yii::$app->session->hasFlash('reportitemsuccess')): ?>
	
	
	<div class="alert alert-danger">
        Laporan Terkirim.
    </div>
	
	<?php else: ?>


<?= Html::a('<span class="glyphicon glyphicon-flag"></span> Laporkan Iklan','#',['class'=>'btn btn-danger btn-block btn-lg','data-target'=>'#myModal','data-toggle'=>'modal']) ?>

<?php endif; ?>






<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Apa Alasan Anda Laporkan Iklan Ini ?</h4>
      </div>
      <div class="modal-body">

  
 <?php 
 //Form For Report Item
 $form = ActiveForm::begin(['id'=>'report-form']);
 ?>

      <div class="row">
	  <div class="col-md-7">
	  <?= $form->field($modelReport, 'report')->radioList(
	  array(
			'Penjual tidak bisa di hubungi'=>'Penjual tidak bisa di hubungi',
			'Item Sudah Laku'=>'Item Sudah Laku (Sold Out)',
			'Konten Tidak Layak'=>'Konten Tidak Layak',
			'Terdapat Unsur Penipuan'=>'Terdapat Unsur Penipuan',
			))->label(false); ?>
		</div>
		
      <?= $form->field($modelReport, 'id_product')->hiddenInput(['maxlength' => true,'value'=>$model->id_product])->label(false) ?>

   
	   <div class="col-md-12">
		<hr/>
	   </div>
	   
	   <div class="col-md-12">
	  <?= $form->field($modelReport, 'description')->textarea(array('rows'=>5)) ?>
		</div>
		</div>
		
    <div class="form-group">
        <?= Html::submitButton('Kirim', ['class' => 'btn btn-success btn-lg']) ?>
    </div>

    <?php ActiveForm::end(); ?> 
	

	
	    </div>
      
    </div>
  </div>
</div>
	
	
  
  
  </div>

</div>
</div>

     <?php
  }
  
}
 

 ?>

 