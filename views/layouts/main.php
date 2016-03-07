<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= $this->title ?></title>
    <?php $this->head() ?>
	

	
</head>



<body>

<?php $this->beginBody() ?>


    <div class="wrap">
  
 <?php
            NavBar::begin([
                'brandLabel' => '',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
					
			
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [
                   
                   ['label' => 'Pasang Iklan', 'url' => ['/product/add']],
				 
				  
				  
				   
				   Yii::$app->user->isGuest ?
				   ['label' => 'Login', 'url' => ['/site/login']] :
                   ['label' => Yii::$app->user->identity->fullname, 'url' => ['/users/myprofile'],
						'items' => [
							['label' => 'Profil Saya', 'url' => ['/users/myprofile']],
							['label' => 'Ubah Password', 'url' => ['/users/changepassword']],
							['label' => 'Logout','url' => ['/site/logout'],'linkOptions' => ['data-method' => 'post']],
            ],
				   ],
                    
                        
                       
                ],
            ]);
            NavBar::end();
        ?>
		
        <div class="container">
	
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= $content ?>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <p class="pull-left">&copy; <?= Yii::$app->params['siteName'] ?> <?= date('Y') ?></p>
            <p class="pull-right"></p>
        </div>
    </footer>

<?php $this->endBody() ?>


</body>
</html>
<?php $this->endPage() ?>
