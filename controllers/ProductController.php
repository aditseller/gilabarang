<?php

namespace app\controllers;

use Yii;
use app\models\Product;
use app\models\GlobalSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile;
use yii\imagine\Image;
use app\models\Report;
use app\models\Comment;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
			
			//access_control
			
			'access' => [
					'class' => AccessControl::className(),
					'only' => ['add'],
					'rules' => [
							[
								'allow' => true,
								'actions' => ['add'],
								'roles' => ['@'],
									
							],
							
					
					],
			
			
			],
			
			
        ];
    }

  
  
public function actionSearch()
    {
        $searchModel = new GlobalSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Product model.
     * @param integer $id
     * @return mixed
     */
    public function actionDetail($id)
    {
		//Model for Report Item
		$modelReport = new Report();
		//Model for Comment
		$modelComment = new Comment();
		
		
		
		//Save to db for Report Item 
		if ($modelReport->load(Yii::$app->request->post()) && $modelReport->save()) {
            Yii::$app->session->setFlash('reportitemsuccess');
			return $this->refresh();
        } 
		
		//Save Comment Feedback User
		if ($modelComment->load(Yii::$app->request->post()) && $modelComment->save()) {
			Yii::$app->session->setFlash('commentitemsuccess');
			return $this->refresh();
			
			
		}
		
		else {
        return $this->render('detail', [
            'model' => $this->findModel($id),
            'modelReport' => $modelReport,
            'modelComment' => $modelComment,
        ]);
		
		}
    }
	


    /**
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionAdd()
    {
        $model = new Product();

        if ($model->load(Yii::$app->request->post())) {
			
			
			
			$model->image = UploadedFile::getInstance($model,'image');
			$model->image2 = UploadedFile::getInstance($model,'image2');
			$model->image3 = UploadedFile::getInstance($model,'image3');
			
			
			
			if($model->save()) {
				

		
		
				    $model->image->saveAs('public/uploads/product/'.$model->id_product.'1.png');
					
					//watermark img1
				Image::watermark('public/uploads/product/'.$model->id_product.'1.png','public/watermark.png')
				->save(Yii::getAlias('public/uploads/product/'.$model->id_product.'1.png'));
					
					
				   //create thumbnail and Resizing Image Product
				Image::thumbnail('public/uploads/product/'.$model->id_product.'1.png',150,150)
				->save(Yii::getAlias('public/uploads/product/thumb-'.$model->id_product.'1.png'));
			
					
					
		if(!empty($model->image2)) {
					
					$model->image2->saveAs('public/uploads/product/'.$model->id_product.'2.png');
					
					//watermark img2
				Image::watermark('public/uploads/product/'.$model->id_product.'2.png','public/watermark.png')
				->save(Yii::getAlias('public/uploads/product/'.$model->id_product.'2.png'));
					
		}
		
		if(!empty($model->image3)) {
		
					$model->image3->saveAs('public/uploads/product/'.$model->id_product.'3.png');
					
							//watermark img3
				Image::watermark('public/uploads/product/'.$model->id_product.'3.png','public/watermark.png')
				->save(Yii::getAlias('public/uploads/product/'.$model->id_product.'3.png'));
					
					
					
					
		} 
					
					
			
				
					
					
					
				
					
				}
				
		
				
				return $this->redirect(['/users/myprofile']);
			
	
			

			
        } 
            return $this->render('add', [
                'model' => $model,
            ]);
        
    }

    /**
     * Updates an existing Product model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_product]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Product model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
