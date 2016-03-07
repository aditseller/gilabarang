<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


?>
<div class="col-lg-3"></div>
<div class="col-lg-5">


<div class="panel panel-warning">
  <div class="panel-heading "><b>Edit Kontak</b></div>

  <div class="panel-body">
  
  <?php $form = ActiveForm::begin(); ?>
  
  
  <div class="col-md-12"><?= $form->field($model, 'phone')->textInput(['maxlength' => true,'required'=>true]) ?> </div>
  <div class="col-md-12"><?= $form->field($model, 'chatid')->textInput(['maxlength' => true]) ?> </div>
	
	   <div class="form-group col-md-12">
        <?= Html::submitButton('Update', ['class' => 'btn btn-warning btn-block']) ?>
    </div>

    <?php ActiveForm::end(); ?>
  
  </div>
  </div>
  </div>