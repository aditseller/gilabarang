<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Users */


?>
<div class="users-update">

  
	
	
	<div class="col-lg-3"></div>
<div class="col-lg-5">

<div class="panel panel-primary">
  <div class="panel-heading "><b>Edit Profile</b></div>
  <div class="panel-body">
 
 

    <?php $form = ActiveForm::begin(); ?>
<div class="col-md-12">
<div class="alert alert-info" role="alert"><span class="glyphicon glyphicon-ok-circle"></span> <?= $model->email; ?>
 <p><i>( Email Utama )</i></p>
</div>
     </div>
	 
	 
	 
	<div class="col-md-12">
	 <?= $form->field($model, 'fullname')->textInput(['maxlength' => true]) ?></div>
	 
	 
	 
	
	 <div class="col-md-12">
	 <?= $form->field($model, 'gender')->dropDownList([ 'male' => 'Male', 'female' => 'Female', ], ['prompt' => '--Select Gender--','required'=>true]) ?></div>
	 
	 
	 
	 <div class="col-md-12"><?= $form->field($model, 'location')->dropDownList(ArrayHelper::map(app\models\Province::find()->all(), 'province', 'province'),['prompt'=> '-- Pilih Lokasi --','required'=>true]) ?></div>
	 
	 
	 

	 

	 
	 
	 	

	 
	 <label class="col-md-12" style="margin-bottom:-16px">Tanggal Lahir</label>
	 <div class="col-md-4">

	 <?= $form->field($model, 'birthdate')->dropDownList([
				'01' => '1',
				'02' => '2',
				'03' => '3',
				'04' => '4',
				'05' => '5',
				'06' => '6',
				'07' => '7',
				'08' => '8',
				'09' => '9',
				'10' => '10',
				'11' => '11',
				'12' => '12',
				'13' => '13',
				'14' => '14',
				'15' => '15',
				'16' => '16',
				'17' => '17',
				'18' => '18',
				'19' => '19',
				'20' => '20',
				'21' => '21',
				'22' => '22',
				'23' => '23',
				'24' => '24',
				'25' => '25',
				'26' => '26',
				'27' => '27',
				'28' => '28',
				'29' => '29',
				'30' => '30',
				'31' => '31',

				], 
				
				['prompt' => '--Date--','required'=>true]) ?>
				</div>
				
				
				
				<div class="col-md-4">
	 <?= $form->field($model, 'birthmonth')->dropDownList([
				'01' => 'January',
				'02' => 'February',
				'03' => 'March',
				'04' => 'April',
				'05' => 'May',
				'06' => 'June',
				'07' => 'July',
				'08' => 'August',
				'09' => 'September',
				'10' => 'October',
				'11' => 'November',
				'12' => 'December',
			

				], 
				
				['prompt' => '--Month--','required'=>true]) ?>
				</div>
				
				<div class="col-md-4">
	 <?= $form->field($model, 'birthyear')->dropDownList([
				'1935' => '1935',
				'1936' => '1936',
				'1937' => '1937',
				'1938' => '1938',
				'1939' => '1939',
				
				'1940' => '1940',
				'1941' => '1941',
				'1942' => '1942',
				'1943' => '1943',
				'1944' => '1944',
				'1945' => '1945',
				'1946' => '1946',
				'1947' => '1947',
				'1948' => '1948',
				'1949' => '1949',
				
				'1950' => '1950',
				'1951' => '1951',
				'1952' => '1952',
				'1953' => '1953',
				'1954' => '1954',
				'1955' => '1955',
				'1956' => '1956',
				'1957' => '1957',
				'1958' => '1958',
				'1959' => '1959',
				
				'1960' => '1960',
				'1961' => '1961',
				'1962' => '1962',
				'1963' => '1963',
				'1964' => '1964',
				'1965' => '1965',
				'1966' => '1966',
				'1967' => '1967',
				'1968' => '1968',
				'1969' => '1969',
				
				'1970' => '1970',
				'1971' => '1971',
				'1972' => '1972',
				'1973' => '1973',
				'1974' => '1974',
				'1975' => '1975',
				'1976' => '1976',
				'1977' => '1977',
				'1978' => '1978',
				'1979' => '1979',
				
				'1980' => '1980',
				'1981' => '1981',
				'1982' => '1982',
				'1983' => '1983',
				'1984' => '1984',
				'1985' => '1985',
				'1986' => '1986',
				'1987' => '1987',
				'1988' => '1988',
				'1989' => '1989',
				
				'1990' => '1990',
				'1991' => '1991',
				'1992' => '1992',
				'1993' => '1993',
				'1994' => '1994',
				'1995' => '1995',
				'1996' => '1996',
				'1997' => '1997',
				'1998' => '1998',
				'1999' => '1999',
				
				'2000' => '2000',
				'2001' => '2001',
				'2002' => '2002',
				
				
			

				], 
				
				['prompt' => '--Year--','required'=>true]) ?>
				</div> 
				
				</br>
				</br>
				</br>
				</br>
				</br>

	

 

    


	
	
	

    

    <div class="form-group col-md-12">
        <?= Html::submitButton('Update', ['class' => 'btn btn-primary btn-block']) ?>
    </div>

    <?php ActiveForm::end(); ?>






 </div>
</div>


</div>



</div>
