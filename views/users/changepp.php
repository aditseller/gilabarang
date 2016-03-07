<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


?>

	<div class="col-lg-3"></div>
<div class="col-lg-5">


<div class="panel panel-primary">
  <div class="panel-heading "><b>Upload Profile Pictures</b></div>
  <div class="panel-body">
  
   <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
  
  <div class="col-md-12">
  <?= $form->field($model,'file')->fileInput(['required'=> true]) ?>
  </div>
  
  
  <div class="form-group col-md-12">
        <?= Html::submitButton('Upload', ['class' => 'btn btn-primary']) ?>
    </div>
      <?php ActiveForm::end(); ?>
  </div>
  </div>
  </div>
  </div>