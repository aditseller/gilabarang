<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProductSearch */
/* @var $form yii\widgets\ActiveForm */
?>



    <?php $form = ActiveForm::begin([
        'action' => ['search'],
        'method' => 'get',
		
    ]); ?>

   <div class="input-group">
    <?= $form->field($model, 'query')->textInput(['class'=>'form-control input-lg','placeholder'=>'Cari Barang...'])->label(false) ?>
	<span class="input-group-btn">
	<div class="help-block"></div>
    <?= Html::button('<span class="glyphicon glyphicon-search"></span> Cari', ['class' => 'btn btn-default btn-lg','type'=>'submit']) ?>
	
    </span>
</div>
    <?php ActiveForm::end(); ?>

	
	

