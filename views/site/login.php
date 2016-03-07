<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

$this->title = 'Login';

?>



<div class="col-lg-4"></div>
<div class="col-lg-4">


<div class="panel panel-default">
  <div class="panel-heading "><b>Login</b></div>

  <div class="panel-body">
  

  

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
     
       
    ]); ?>

    <?= $form->field($model, 'email')->textInput()->label('Username or Email') ?>

    <?= $form->field($model, 'password')->passwordInput() ?>

    <?= $form->field($model, 'rememberMe', [
        'template' => "<div class=\"col-lg-offset-1 col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
    ])->checkbox() ?>

    <div class="form-group">
        
            <?= Html::submitButton('Login', ['class' => 'btn btn-primary btn-lg btn-block', 'name' => 'login-button']) ?>

    </div>
	
	<center>
Belum Punya Akun ? Silahkan  <?= Html::a('Daftar Disini ',['users/signup']) ?>
	
	</center>


	
	</div>

    <?php ActiveForm::end(); ?>


</div>
</div>


