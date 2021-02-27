<?php

namespace backend\controllers;

use backend\models\HouseDetails;
use backend\models\TenantDetails;
use Yii;
use backend\models\RentalDetails;
use backend\models\RentalDetailsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RentalDetailsController implements the CRUD actions for RentalDetails model.
 */
class RentalDetailsController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all RentalDetails models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RentalDetailsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single RentalDetails model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new RentalDetails model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new RentalDetails();

  /*
    if ($model->load(Yii::$app->request->post()) && $model->save()) {
           return $this->redirect(['index']);
            //return $this->redirect(['view', 'id' => $model->Rental_id]);
       }
  */

         if ($model->load(Yii::$app->request->post())) {
             //var_dump($model->Tenant_id);
             //var_dump($model->house_id);
            // exit();
           if ($model->validate()) {
                $Tenantlist = TenantDetails::findOne(($model->Tenant_id));
                $houselist = HouseDetails::findOne(($model->house_id));
                // form inputs are valid, do something here
               // echo ('Tenant_id ->'.$model->Tenant_id.'<br>');
               // echo ('EB_startreading ->'.$model->EB_startreading.'<br>');
               // echo ('EB_startreading ->'.$model->EB_Endreading.'<br>');
              //  echo ($model->EB_Endreading-$model->EB_startreading);
                                //var_dump($model->EB_startreading);
                //var_dump($model->EB_Endreading);
               // echo ('Rent amount ->'.$Tenantlist->rent_amount.'<br>');
               // echo ('water amount ->'.$Tenantlist->water_amount.'<br>');
               // echo ('EB rate ->'.$houselist->EB_rate.'<br>');
                $model->Rent_due=($Tenantlist->water_amount+$Tenantlist->rent_amount+$houselist->EB_rate*($model->EB_Endreading-$model->EB_startreading));
                $model->Rent_paid=0;
                //echo ('EB rate ->'.$model->Rent_due.'<br>');
                //echo ('EB amount ->'.$houselist->EB_rate*($model->EB_Endreading-$model->EB_startreading).'<br>');
               //var_dump($model);
                //exit();
                $model->save();
                return $this->redirect(['index']);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing RentalDetails model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        /*
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
            //return $this->redirect(['view', 'id' => $model->Rental_id]);
        } */

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                $Tenantlist = TenantDetails::findOne(($model->Tenant_id));
                $houselist = HouseDetails::findOne(($model->house_id));
                $model->Rent_due=($Tenantlist->water_amount+$Tenantlist->rent_amount+$houselist->EB_rate*($model->EB_Endreading-$model->EB_startreading));
                $model->save();
                return $this->redirect(['index']);
            }
        }
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing RentalDetails model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the RentalDetails model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return RentalDetails the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = RentalDetails::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
