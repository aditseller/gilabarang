<?php

namespace app\controllers;

use Yii;
use app\models\Users;
use app\models\UsersSearch;
use app\models\Product;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\filters\AccessControl;
use yii\data\SqlDataProvider;


/**
 * UsersController implements the CRUD actions for Users model.
 */
class UsersController extends Controller
{

	
	
    public function behaviors()
    {
        return [
		
				//Verb_filter
			
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                    
                ],
            ],
			
			//access_control
			
			'access' => [
					'class' => AccessControl::className(),
					'only' => ['myprofile','editcontact','editprofile','changepassword','feedback'],
					'rules' => [
							[
								'allow' => true,
								'actions' => ['myprofile','editcontact','editprofile','changepassword','feedback'],
								'roles' => ['@'],
									
							],
							
						
							
					
					],
			
			
			],
        ];
    }

  
	
	

		
		
	
	
	
	
	//edit_contact
	
	public function actionEditcontact() {
	
		$idlogin = Yii::$app->user->identity->id;
		
        $model = $this->findModel($idlogin);
		$model->password = pack("H*",$model->password);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['myprofile']);
        } else {
            return $this->render('editcontact', [
                'model' => $model,
            ]);
        }
	
	}

   
	
	
	//MyProfile Function
	
	public function actionMyprofile() {
	
	$idlogin = Yii::$app->user->identity->id;
	
	return $this->render('myprofile',[
			'model' => $this->findModel($idlogin),
	
		
	
	
	]);
	
	}
	
	
	
		//Notification Function
	
	public function actionFeedback() {
	
	$idlogin = Yii::$app->user->identity->id;
	
	
	//Comment List
	$dataComment = new SqlDataProvider([
    'sql' => 'SELECT * FROM comment WHERE id_seller=:id_user AND id_user!=:id_user',
	'params'=>['id_user'=>$idlogin],
    'pagination' => [
        'pageSize' => 20,
		],
		]);
	
	
	return $this->render('feedback',[
			'model' => $this->findModel($idlogin),
			'dataComment'=>$dataComment,
	
		
	
	
	]);
	
	}

    /**
     * Creates a new Users model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionSignup()
    {
	  if (Yii::$app->user->isGuest) {
		  
		  
		     $model = new Users();
		
		        if ($model->load(Yii::$app->request->post()) && $model->save()) {

					Yii::$app->session->setFlash('signupsuccess');
					
					
            return $this->refresh();
        } else {
            return $this->render('signup', [
                'model' => $model,
            ]);
        }
		  
		  
		  
	  } else {
		  
		  return $this->redirect(['myprofile']);
		  
	  }
		
     
        

		
    }

    /**
     * Updates an existing Users model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionEditprofile()
    {
		$idlogin = Yii::$app->user->identity->id;
		
        $model = $this->findModel($idlogin);
		$model->password = pack("H*",$model->password);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['myprofile']);
        } else {
            return $this->render('editprofile', [
                'model' => $model,
            ]);
        }
    }
	
	
	//Change Password Profile
	public function actionChangepassword()
    {
		$idlogin = Yii::$app->user->identity->id;
		
        $model = $this->findModel($idlogin);
		
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['myprofile']);
        } else {
            return $this->render('changepassword', [
                'model' => $model,
            ]);
        }
    }
	
	
	//function change profile pictures
	
	public function actionChangepp() {
	
	
		$idlogin = Yii::$app->user->identity->id;
		
        $model = $this->findModel($idlogin);

        if (Yii::$app->request->isPost) 
		{
          
			
			$model->file = UploadedFile::getInstance($model,'file');
			$model->file->saveAs('public/uploads/profilepic/'.$model->id_user.'.png');
			
			
			
			
			
			return $this->redirect(['myprofile']);
			
        } else {
            return $this->render('changepp', [
                'model' => $model,
            ]);
        }
			
	
	}

    /**
     * Deletes an existing Users model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
	
	
	//Profile Detail
	public function actionProfile($id)
    {
	
			

        return $this->render('profile', [
            'model' => $this->findModel($id),
        ]);
		
		
    }

    /**
     * Finds the Users model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Users the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Users::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
