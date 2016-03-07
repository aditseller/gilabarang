


<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Product */
/* @var $form yii\widgets\ActiveForm */

$this->title = 'Pasang Iklan';
?>

<div class="col-lg-2"></div>
<div class="col-lg-8">


<div class="panel panel-success">
  <div class="panel-heading "><b>Pasang Iklan</b></div>

  <div class="panel-body">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'condition')->dropDownList([ 'new' => 'New', 'second' => 'Second', 'refurbish' => 'Refurbish', ], ['prompt' => '-- Choose Condition --']) ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>
	

    <?= $form->field($model, 'id_seller')->hiddenInput(['maxlength' => true,'value'=>Yii::$app->user->identity->id])->label(false) ?>
    <?= $form->field($model, 'seller')->hiddenInput(['maxlength' => true,'value'=>Yii::$app->user->identity->fullname])->label(false) ?>
    <?= $form->field($model, 'email_seller')->hiddenInput(['maxlength' => true,'value'=>Yii::$app->user->identity->email])->label(false) ?>
    <?= $form->field($model, 'phone_seller')->hiddenInput(['maxlength' => true,'value'=>Yii::$app->user->identity->phone])->label(false) ?>
    <?= $form->field($model, 'location_seller')->hiddenInput(['maxlength' => true,'value'=>Yii::$app->user->identity->location])->label(false) ?>
	
	
	
    <?= $form->field($model, 'start_date')->hiddenInput(['maxlength' => true,'value'=>date('Y-m-d H:i:s')])->label(false) ?>
    <?= $form->field($model, 'end_date')->hiddenInput(['maxlength' => true,'value'=>date('Y-m-d',mktime(0,0,0,date('m'),date('d')+30,date('Y'))).' '.date('H:i:s')])->label(false) ?>
	
	
	
	

	




	
    <?= $form->field($model, 'category')->dropDownList(ArrayHelper::map(\app\models\Category::find()->asArray()->all(), 'category', 'category'), ['prompt' => '-- Choose Category --']) ?>
	<?= $form->field($model,'description')->textArea(['rows'=>8]) ?>
    <?= $form->field($model, 'image')->fileInput(['required' => true]) ?>

    <?= $form->field($model, 'image2')->fileInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'image3')->fileInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success btn-lg']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>
</div>

