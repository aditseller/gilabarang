
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;



/* @var $this yii\web\View */
/* @var $model app\models\Users */


?>

<?php if (Yii::$app->session->hasFlash('signupsuccess')): ?>


  <div class="alert alert-success">
        Terima Kasih Telah Bergabung, Akun Anda akan aktif dalam kurun waktu 1 x 24 jam.
    </div>



<?php else: ?>
	
<div class="col-lg-3"></div>
<div class="col-lg-5">

<div class="panel panel-success">
  <div class="panel-heading "><b>Sign Up</b></div>
  <div class="panel-body">

  
 

    <?php $form = ActiveForm::begin(); ?>
<div class="col-md-12">
    <?= $form->field($model, 'email')->input('email') ?> </div>
	<div class="col-md-12">
	 <?= $form->field($model, 'fullname')->textInput(['maxlength' => true]) ?></div>
	 
	  <div class="col-md-12">
    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?></div>
	 
	
	
	
	<div class="col-md-12">

	<?= $form->field($model, 'agreement')->checkbox(['required'=>true]) ?><p class="hint" style="margin-top:-20px; margin-bottom:30px;"><i>Saya telah membaca dan menyetujui Syarat dan Ketentuan yang berlaku di gilabarang.com
	</i></p></div>

    

    <div class="form-group col-md-12">
        <?= Html::submitButton('Sign Up', ['class' => 'btn btn-success btn-block']) ?>
    </div>

    <?php ActiveForm::end(); ?>






 </div>
</div>


</div>


 
	 <?php endif; ?>
